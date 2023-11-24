
<?php
//db connection
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
//edit post
if(isset($_GET['edit_post'])){
    if($_GET['edit_post']='edit'){
        $edit_id = $_GET['id'];
        
        $sql = "SELECT * FROM posts WHERE id='$edit_id' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
       
    }
}
//update post
if(isset($_POST['update'])){
    $update_post_title = $_POST['up_post_title'];
    $update_post_description = $_POST['up_post_desc'];
    $update_post_id = $_POST['up_post_id'];
    $sql = "UPDATE posts SET post_title='$update_post_title', post_description='$update_post_description' WHERE id='$update_post_id'";
    if($conn->query($sql)){
        header("Location: dashboard.php");
        $msg = "post updated success";
       
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit your post</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class='bg-secondary rounded py-3 text-center text-light' >Update your post here</h1>
        <form action="" method='POST'>
            <div class="form-group">
                <input type="text" class='form-control my-2' name="up_post_title" placeholder="Post Title" value="<?php echo $row['post_title']; ?>">
            </div>
            <input type="hidden" name="up_post_id" value="<?php echo $row['id']; ?>">
           <div class="form-group">
                <input type="text"  class='form-control my-2' name="up_post_desc" placeholder="Post Description" value="<?php echo $row['post_description']; ?>">   
           </div>
            <input class='btn btn-primary' type="submit" name="update" value="Update">
        </form>  
    </div>  


    <script src='js/bootstrap.bundle.min.js'></script>
</body>
</html>