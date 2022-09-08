<?php session_start(); ?>
<?php include "includes/db.php"; ?>


<?php
if(isset($_POST['add_comment'])){

  $message = mysqli_real_escape_string($connection, $_POST['msg']);

  if(isset($_SESSION['auth_user_id'])){
     $u_id = $_SESSION['auth_user_id'];
  }


  $query = "INSERT INTO comments (user_id,msg) VALUES ($u_id,'$message') ";
  $result = mysqli_query($connection, $query);

  if($result){
    echo "Comment added successfuly";
  }else{
    echo "Comment was not added";
  }
}

 ?>
