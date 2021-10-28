<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['food']) && isset($_POST['address']) && isset($_POST['description']) && isset($_POST['username'])) {
    if ($db->dbConnect()) {
        if ($db->createPost("users", $_POST['food'], $_POST['address'], $_POST['description'], $_POST['username'])) {
            echo "Post Success";
        } else echo "Post Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
