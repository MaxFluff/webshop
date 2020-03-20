<?php
session_start();
if(isset($_SESSION['uname'])){
    session_destroy();
    echo "<script>location.href='login.php'</script>";
}
else{
        echo "<script>location.href='login.php'</script>";
    //header("Location: index.php"); //login formulier pagina
}

?>