<?php

function setFormData(){
    //valideren van formulier data
    //formulier in database zetten
    //checken of de date is opgeslagen
    global $con; // dit is een database connectie

    $_POST;

    if(isset($_POST['field_firstname']) && trim($_POST['field_firstname']) !=''){
        $firstName = $_POST['field_firstname'];

    }else{
        echo "Voornaam is verplicht";
    }
    if(isset($_POST['field_password']) && trim($_POST['field_password']) !=''){
        $password = $_POST['field_password'];
        $password2 = password_hash($password, PASSWORD_DEFAULT);
    }else{
        echo "wachtwoord is verplicht";
    }

$query1 = $con->prepare('INSERT INTO admin (username,user_password) VALUES (?,?);');
if ($query1 === false) {
    echo mysqli_error($con)." - ";
    exit(__LINE__);
}
$query1->bind_param('ss', $firstName, $password2);
if ($query1->execute() === false) {
    echo mysqli_error($con)." - ";
    exit(__LINE__);
} else {
    // echo "Gebruiker toegevoegd";
    header('location: ../index.php');
    $query1->close();
}
}

?>