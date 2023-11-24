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

    //register a new user as user
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')";

        $conn->query($sql);
        $conn->close();
        session_start();
        $_SESSION['register_msg'] = "Regsitered successful, now please login.";
        header("location: login.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page.</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <h1 class='fs-4 bg-success text-center text-light rounded p-2'>Please Register for being a member of this website.</h1>
    <div class="container mt-3 py-2 px-3">
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" class='form-control mb-2' placeholder="Username" name="username">
            </div>
            <div class="form-group">
                <input type="email"class='form-control mb-2' placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
                <input type="password" class='form-control mb-2' placeholder="Password" name="password">
            </div>
            <input class='btn btn-info my-2' type="submit" name="submit">
        </form>
    </div>

    <h5 class='text-center'>Already Registered? <a href="login.php">Click here</a> for Login.</h5>



    <script src='js/bootstrap.bundle.min.js'></script>
</body>
</html>