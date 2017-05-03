<?php

//--- HELPER FUNCTIONS --------------------------------------------------------------------------

// Function used to set a message.
function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }else{
        $msg = "";
    }
}

// Function used to display a message.
function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

// Function used to redirect the user to a different page.
function redirect($location){

    header("Location: $location");
}

// Function to query the database.
function query($sql){

    global $connection;
    return mysqli_query($connection, $sql);
}

// Function to confirm the connection to the database when making a query.
function confirm($result){

    global $connection;
    if(!$result){
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

// Function to escape strings to protect the database.
function escape_string($string){

    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

// Function to get information from a record in the database.
function fetch_array($result){

    return mysqli_fetch_array($result);
}

//--- FRONT END FUNCTIONS --------------------------------------------------------------------------

// Function that registers a user into the website
function register_user(){
    if(isset($_POST['register'])){
        $email = escape_string($_POST['inputEmail']);
        $fname = escape_string($_POST['inputFirstName']);
        $lname = escape_string($_POST['inputLastName']);
        $username = escape_string($_POST['inputUsername']);
        $password = escape_string($_POST['inputPassword']);
        $confirmPassword = escape_string($_POST['inputConfirmPassword']);
    
            
        if($password !== $confirmPassword){
            set_message("Passwords do not match");
            redirect("register.php");
        }else{
            $password = md5($password);
            $insertQuery = query("INSERT INTO users(username, email, password, fname, lname, user_role) VALUES('{$username}', '{$email}', '{$password}', '{$fname}', '{$lname}', 'standard')");
            confirm($insertQuery);
            redirect("register.php");
        }
    
    }
}

// Function that logs a user into the website.
function login_user(){
session_destroy();
session_start();
  if(isset($_POST['submit'])){

    $username = escape_string($_POST['inputUsername']);
    $password = escape_string($_POST['inputPassword']);
    $password = md5($password);

    $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
    confirm($query);

    while($row = fetch_array($query)){
            $c_user_id = $row['user_id'];
            $c_username = $row['username'];
            $c_email = $row['email'];
            $c_password = $row['password'];
            $c_fname = $row['fname'];
            $c_lname = $row['lname'];
            $c_user_role = $row['user_role'];
            
        
    }


        // If username and password are wrong, user is redirected to the same page.
        // If correct they are redirected to the admin home-page.
        if($username !== $c_username && $password !== $c_password){
            set_message("Username or Password is incorrect");
            redirect("index.php");

        }else if($username == $c_username && $password == $c_password){
//                session_destroy();
                session_start();

            // sets the current session user information to the information of
            // the user that is logged in.
            $_SESSION['username'] = $c_username;
            $_SESSION['fname'] = $c_fname;
            $_SESSION['lname'] = $c_lname;
            $_SESSION['email'] = $c_email;
            $_SESSION['user_id'] = $c_user_id;
            $_SESSION['user_role'] = $c_user_role;

            // Redirects to the home page with user logged in.
            redirect("bridge.php");

        }else{
            // Redirects to the home page with user not logged in.
            set_message("Username or Password is incorrect");
            redirect("index.php");
        }
    }
}

function check_for_register(){
    if(isset($_POST['register'])){
        if($_SESSION['user_role'] == 'administrator'){
            redirect("register.php");
        }else{
            set_message("Must be admin to register user");
            redirect("bridge.php");
        }
    }
}

function check_captcha(){
    if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']){
        $skey = "6LezHB4UAAAAAHiKUCpjE0yRBcgWtCsx-W0iRgJQ";
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$skey&response=$captcha&remoteip=$ip");
//        var_dump($rsp);
        $arr = json_decode($rsp,TRUE);
        if(!$arr['success']){
            set_message("Could not verify. Please try again.");
            redirect("captcha.php");
        }else{
            redirect("emailValidation.php");
        }
        
    }
}

function validate_email(){
    
    if(isset($_POST['validate'])){
        if($_POST['inputEmail'] != $_SESSION['email']){
            set_message("Email is incorrect");
            redirect("emailValidation.php");
        }else{


            $email = escape_string($_POST['inputEmail']);

            $randCode = rand(pow(10, 4), pow(10, 5)-1);
            $_SESSION['emailCode'] = $randCode;

    //        require"/Applications/XAMPP/xamppfiles/htdocs/cybereye/public/PHPMailerAUtoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'cybereyeauth';          // SMTP username
            $mail->Password = 'cybereye123'; // SMTP password
            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                          // TCP port to connect to

            $mail->setFrom('Cybereyeauth@gmail.com', 'CyberEye');
            $mail->addReplyTo('Cybereyeauth@gmail.com', 'CyberEye');
            $mail->addAddress($email);   // Add a recipient
    //        $mail->addCC('cc@example.com');
    //        $mail->addBCC('bcc@example.com');

            $mail->isHTML(true);  // Set email format to HTML

            $bodyContent = "<h1>Your CyberEye verification code: {$_SESSION['emailCode']}</h1>";

            $mail->Subject = 'Your CyberEye Verification Code';
            $mail->Body    = $bodyContent;

            if(!$mail->send()) {
                set_message("Email could not be sent");
                redirect("emailValidation.php");
            } else {
                redirect("emailValidationConfirm.php");
            }
        }
    }
}

function check_code(){
    if(isset($_POST['confirmCode'])){
        $inputCode = escape_string($_POST['inputCode']);
        
        if($inputCode == $_SESSION['emailCode']){
            redirect("userValidated.php");
        }else{
            set_message("Invalid Code");
            redirect("emailValidationConfirm.php");
        }
    }
}

function use_network(){
    if(isset($_POST['confirmCode'])){
        header("Location: http://www.google.com");
        die();
    }
   
}

?>
