<?php

session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        header("location: index.php"); // Redirecting to login
    } else {
        // Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        //$mysqli = New MySQLi('localhost', 'root', 'root', 'bdp');
        $mysqli = New MySQLi('localhost', 'root', '', 'bdp');
    
        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        
        // Selecting Database
        $db = mysql_select_db("dbp", $connection);
        
        // SQL query to fetch information of registerd users and finds user match.
        $sql = "SELECT * "
                . "FROM user as u "
                . "LEFT JOIN admin as a ON a.id = u.id "
                . "LEFT JOIN player as p ON p.id = u.id "
                . "WHERE u.id='$username' "
                . "AND u.password='$password'";
        
        // Get user
        $query = $mysqli->query($sql);
        if ($query) {

            /* fetch object array */
            if ($row = $query->fetch_row()) {
                $_SESSION['login_user'] = $row[1]; 
                $_SESSION['role']       = $row[8];
                
                header("location: dashboard.php"); // Redirecting to dashboard
            } else {
                $error = "Username or Password is invalid";
                header("location: index.php"); // Redirecting to login
            }

            /* free result set */
            $query->close();
        }
        
        /* close connection */
        $mysqli->close();
    }
}
?>