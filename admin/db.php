<?php 
    $connection = new mysqli("localhost","root",'','nikua');
    if(!$connection){
        die("Not Connected ");
    }else{
        echo "We are connected";
    }
?>