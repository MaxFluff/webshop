<?php
session_start();

if(isset($_POST['submit'])){

if(isset($_POST['field_username']) && $_POST['field_username'] != ''){
    $email = $_POST['field_username'];
}else{
    echo "e-mail is niet ingevuld";
}

if(isset($_POST['field_password']) && $_POST['field_password'] != ''){
    $pass = $_POST['field_password'];
}else{
    echo "password is niet ingevuld";
}

$email = $con->real_escape_string($_POST['field_username']);
$pass = $con->real_escape_string($_POST['field_password']);

    $qry = $con->query('SELECT username,user_password FROM admin WHERE username ="'.$email.'";');
    if(mysqli_num_rows($qry)==1){
        while ($admin = $qry->fetch_assoc()){
            if (password_verify($pass, $admin['user_password'])) {     
                $_SESSION['field_username']=$email;
                header('Location: view/welcome.php');
        } else {     
                // Invalid credentials 
            }
        }
    }
}

?>