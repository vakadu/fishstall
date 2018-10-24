<?php

function redirect($location){
    header("Location: " . $location);
}

function login_user(){
    global $connection;
    if (isset($_POST['login_submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM tbl_user WHERE username = '{$username}'";
        $select_query = mysqli_query($connection, $query);
        if (!$select_query){
            die("Failed " . mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($select_query)){
            $db_id = $row['id'];
            $db_username = $row['username'];
            $db_password = $row['password'];
            $db_user_firstname = $row['first_name'];
            $db_user_lastname = $row['last_name'];
        }

        if ($username !== $db_username && $password !== $db_password){
            redirect("index.php");
        }
        elseif (password_verify($password, $db_password)){
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            redirect("dashboard.php");
        }
        else{
            redirect("index.php");
        }
    }
}
