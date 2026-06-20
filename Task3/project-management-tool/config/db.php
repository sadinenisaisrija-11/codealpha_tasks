<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "project_management"
);

if(!$conn){
    die("Database Connection Failed");
}
?>