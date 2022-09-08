<?php session_start(); ?>
<?php  include "includes/db.php";?>


<?php
if(isset($_POST['login_btn'])){

  $email = $_POST['email'];
  $password = $_POST['password'];

  $email = mysqli_real_escape_string($connection,$email);
  $password = mysqli_real_escape_string($connection,$password);

  $query = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}' LIMIT 1";
  $result = mysqli_query($connection, $query);
  if(!$result){
    echo "QUERY FAILED";
  }

  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    $user_name = $row['fullname'];

    $_SESSION['auth_user_id'] = $user_id;
    $_SESSION['auth_username'] = $user_name;
    $_SESSION['status'] = "Login successful";
    header("Location: index.php");
    exit();

  }else{
    $_SESSION['status'] = "Invalid email or password";
    header("Location: index.php");
    exit();
  }

}

 ?>
