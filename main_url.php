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

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Normal user - Main URL</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: index.php"); // Redirect to the login page if not logged in
    exit();
}

// Access user data from the session
$user_id = $_SESSION['id'];
$username = $_SESSION['username'];


// Display or use the user data as needed
echo "User ID: $user_id<br>";
echo "Username: $username<br>";

if(isset($_POST['logout'])){
    // Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired location
header("Location: login.php");
exit();
}






?>

    <form action="" method="POST">
        <input type="submit" value="Log out" name="logout">
    </form>

    <h3 class='text-center'>All Posts From Admin</h3>

    <?php
    //get data from database
                $sql = "SELECT * FROM posts WHERE granted='approved'";
                $result = $conn->query($sql);
                
                while ($row = $result->fetch_assoc()) {
            ?>
        <div class="container">
            <div class="all-posts card" style="margin: 30px 0px; padding: 20px 10px; ">
                <h4 class='card- fw-bold'><?php echo $row['post_title']?></h4>
                <p><?php echo $row['post_description']?></p>
            </div>
        </div>
  
    <?php
    }
    ?>
    
    <script src='js/bootstrap.bundle.min.js'></script>
</body>
</html>