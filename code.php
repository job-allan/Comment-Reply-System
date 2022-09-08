<?php session_start(); ?>
<?php include "includes/db.php"; ?>


<?php
if(isset($_POST['view_data'])){
  $comment_id = $_POST['comment_id'];
  $reply_query = "SELECT * FROM comment_replies WHERE comment_id = $comment_id";
  $reply_result = mysqli_query($connection, $reply_query);
  $result_array = [];

  if(mysqli_num_rows($reply_result) > 0){
    foreach ($reply_result as $row) {
      $user_id = $row['user_id'];
      $user_query = "SELECT * FROM users WHERE id = $user_id LIMIT 1";
      $result_user = mysqli_query($connection, $user_query);
      $user_result = mysqli_fetch_array($result_user);

      array_push($result_array, ['cmt'=>$row, 'user'=>$user_result]);

    }
    header('Content-Type: application/json');
    echo json_encode($result_array);
  }else {
    echo "give a comment";
  }

}


if(isset($_POST['add_reply'])){
  $comment_id = $_POST['comment_id'];
  $reply_msg = $_POST['reply_msg'];
  $user_id = $_SESSION['auth_user_id'];

  $query = "INSERT INTO comment_replies (user_id, comment_id, reply_msg) ";
  $query .= "VALUES ($user_id, $comment_id, '$reply_msg')";
  $result = mysqli_query($connection, $query);

  if($result){
    echo "replied";
  }else{
    echo "Error sending reply".mysqli_error($connection);
  }



}





if(isset($_POST['comment_load_data'])){
  $comment_query = "SELECT * FROM comments";
  $comment_result = mysqli_query($connection, $comment_query);
  $array_result = [];

  if(mysqli_num_rows($comment_result) > 0){
    foreach ($comment_result as $row) {
      $user_id = $row['user_id'];
      $user_query = "SELECT * FROM users WHERE id = $user_id LIMIT 1";
      $result_user = mysqli_query($connection, $user_query);
      $user_result = mysqli_fetch_array($result_user);

      array_push($array_result, ['cmt'=>$row, 'user'=>$user_result]);

    }
    header('Content-Type: application/json');
    echo json_encode($array_result);
  }else {
    echo "give a comment";
  }



}




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
