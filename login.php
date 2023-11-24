<?php
//db connect
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "tech_task";

    $conn = new mysqli($server, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Database connection failed". $conn->connect_error);
    }

    // login user
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        $row = $result->fetch_assoc();
            // Do something with the value
            //echo "Column Value: " . $columnValue;
            if($row['role']=="admin" || $row['role']=="superadmin"){
                // Store user data in the session
                session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
                header("location:dashboard.php");
            }else{
            // Store user data in the session
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
                header("location:main_url.php");
            }
        } else {
            echo "No results found";
        }

    }





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to access the main page or dashboard.</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <h1 class='fs-4 bg-success text-center text-light rounded p-2'>Log in to access the main page or dashboard</h1>
    <h3 class='fs-4 alert alert-success'>
        <?php 
            session_start();
            if(isset($_SESSION['register_msg'])){
                echo $_SESSION['register_msg'];

            }
        ?>
    </h3>
        <div class="container mt-3 py-2 px-3">
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" class='form-control mb-2' placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class=' form-control mb-2' placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <input class='btn btn-primary my-2' type="submit" name="submit">
                </div>
            </form>
        </div>

    <h5 class='text-center'>Don't have an account on this website? <a href="index.php">Click here</a> for Register.</h5>

    <script src='js/bootstrap.bundle.min.js'></script>
    
</body>
</html>