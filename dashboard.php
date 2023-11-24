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
    <title>Admin and super admin dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Access user data from the session
$user_id = $_SESSION['id'];
$username = $_SESSION['username'];
$user_role = $_SESSION['role'];

// Display or use the user data as needed
echo "User ID: $user_id<br>";
echo "Username: $username<br>";
echo "role: $user_role<br>";

if(isset($_POST['logout'])){
    // Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired location
header("Location: login.php");
$_SESSION['register_msg'] = "Log out Success";
exit();
}


//create a post
if(isset($_POST['create'])){
    $post_title = $_POST['post_title'];
    $post_desc = $_POST['post_desc'];

    $sql = "INSERT INTO posts (post_title, post_description, granted) VALUES ('$post_title', '$post_desc', 'pending')";

   if($conn->query($sql)){
    $msg = "Post Upload success";
   }

}

//delete post
if(isset($_GET['delete_post'])){
    if($_GET['delete_post']='delete'){
        $delete_id = $_GET['id'];
        $sql = "DELETE FROM posts WHERE id='$delete_id' ";
        if($conn->query($sql)){
            $msg = "Post Deleted success";
        }
       
    }
}


//delete a post from superadmin
if(isset($_GET['status'])){
    if($_GET['status']='delete'){
        $delete_id = $_GET['id'];
        $sql = "DELETE FROM posts WHERE id='$delete_id'";
        if($conn->query($sql)){
           
            $msg = "Post Decline success";
        }
       
    }
}


//approved a post from superadmin.
if(isset($_GET['approved_status'])){
    if($_GET['approved_status']='approved'){
        $approved_id = $_GET['id'];
        $sql = "UPDATE posts SET granted='approved' WHERE id='$approved_id' ";
        if($conn->query($sql)){
            $msg = "Post Approved success";
        }
       
    }
}





?>

<?php
    if($user_role=="admin"){
?>

    <form action="" method="POST">
        <input type="submit" value="Log out" name="logout">
    </form>



    <h4>
        <?php
      
            if(isset($msg)){
                echo $msg;
            }
        
        ?>
    </h4>

    <div class="container">
    <h2 class='fs-3 bg-warning py-2 text-center rounded'>Create a post</h2>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" class='form-control my-2' name="post_title" placeholder="Post Title">
            </div>
            <div class="form-group">
                <input type="text" class='form-control my-2' name="post_desc" placeholder="Post Description">
            </div>
            <input class='btn btn-primary my-2' type="submit" name="create" value="Create">
        </form>
        <table class="table table-striped table-hover table-borderd">
        <thead>
            <tr>
                <th>post id</th>
                <th>post title</th>
                <th>post description</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //get data rom database
                $sql = "SELECT * FROM posts WHERE granted='approved'";
                $result = $conn->query($sql);
                
                while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['post_title']?></td>
                <td><?php echo $row['post_description']?></td>
                <td>
                    <a class='btn btn-warning btn-sm' href="single_post.php?view_post=view&&id=<?php echo $row['id']?>">view</a>
                    <a class='btn btn-secondary btn-sm' href="edit_single_post.php?edit_post=edit&&id=<?php echo $row['id']?>">edit</a>
                    <a class='btn btn-danger btn-sm' href="?delete_post=delete&&id=<?php echo $row['id']?>">delete</a>
                </td>
            </tr>
            <?php
                }
                if($result->num_rows == 0){
                    $app_msg = "No approved post found";
                }
            ?>
        </tbody>
    </table>
    </div>

  
    <?php
        if(isset($app_msg)){
            echo $app_msg;
        }
    ?>

<?php
 }

 //super admin dashboard
 if($user_role == "superadmin"){

?>
    <form action="" method="POST">
        <input type="submit" value="Log out" name="logout">
    </form>


<h1 class='text-center fs-3 fw-bold'>This is super admin dashboard</h1>
    <?php
        if(isset($msg)){
            echo $msg;
        }
    
    ?>
            
    <div class="container my-2 py-3">
            <?php
                $sql = "SELECT * FROM posts WHERE granted='pending'";
                $result = $conn->query($sql);
                
                while ($row = $result->fetch_assoc()) {
            ?>
        <div class="pending-post card p-3" style="margin: 20px; padding: 10px;">
            <h1 class='card-title'><?php echo $row['post_title']?></h1>
            <p><?php echo $row['post_description']?></p>
            <a class='btn btn-success' href="?approved_status=approved&&id=<?php echo $row['id']?>">Approved</a>
        <a class='btn btn-danger' href="?status=delete&&id=<?php echo $row['id']?>">Decline</a>
        </div>
        <?php
        }
        ?>
        

    </div>


<?php
 }
?>




<script src='js/bootstrap.bundle.min.js'></script>
</body>
</html>