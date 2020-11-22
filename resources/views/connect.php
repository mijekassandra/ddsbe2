<?php
    $connection = new mysqli("localhost", "root", "", "ddsbe");

    if(isset($_POST['submit'])){

        $username = $connection->real_escape_string($_POST['username']);
        $password = $connection->real_escape_string($_POST['password']);

        $data = $connection->query("SELECT username from tbluser WHERE username='$username' AND password='$password'");

        if($data->num_rows > 0 ){
            echo "SUCCESSFULLY LOGIN!";
        }
        else{
            echo "Invalid Username/Password.";
        }
    }