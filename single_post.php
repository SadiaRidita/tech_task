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

<?php

//view a single

if(isset($_GET['view_post'])){
    if($_GET['view_post']='view'){
        $view_id = $_GET['id'];
        
        $sql = "SELECT * FROM posts WHERE id='$view_id' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
       
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Single Post</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h2 class='bg-primary rounded py-3 text-center text-light' >Here is your single post and id is = <?php echo $row['id']?></h2>
        <div class="single-post card py-3 px-4 mt-2">
            <h2 class='card-title fw-bold'><?php echo $row['post_title']?></h2>
            <p><?php echo $row['post_description']?></p>
        </div>
    </div>


    
    <script src='js/bootstrap.bundle.min.js'></script>
</body>
</html>



