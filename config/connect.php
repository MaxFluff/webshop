<?php
    include("_variables.php");
    $con = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);

    if(!$con or mysqli_connect_error()){
        echo mysqli_error($con);
    }else{
        $con->set_charset("utf8");
        $con->query("SET lc_time_name = 'nl_NL';");
    }
    function dd($expression){
        echo"<pre>";
        var_dump($expression);
        echo"</pre>";
        die();
    }
    function dbp($post){
        global $con;
        return mysqli_escape_string($con,$_POST ['field_firstname']);
    }
?>
