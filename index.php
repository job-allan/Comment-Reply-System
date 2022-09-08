<?php session_start();?>
<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>


<?php
if(isset($_SESSION['status'])){
  ?>

<div class="alert"><?php echo $_SESSION['status']; ?></div>";
<?php
unset($_SESSION['status']);
}
 ?>
<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">

          
          <div class="card-header">
            <h4>This is a blog heading.</h4>
          </div>
          <div class="card-body">
            lorem ipsum lorem ipsum lorem ipsumlorem ipsumlorem lorem ipsumloremlorem ipsum
            lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
            lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem
            lorem ipsumlorem ipsumlorem ipsumlorem ipsum lorem ipsumlorem ipsumlorem ipsum

            <hr>
            <div id="error_status">

            </div>


            <div class="main-comment">
              <textarea  class="form-control comment_textbox mb-1" rows="3"></textarea>
              <button type="submit" class="btn btn-primary add_comment_button">Comment</button>

            </div>
            <hr>

            <div class="comment-container">


            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>






<?php include "includes/footer.php"; ?>
