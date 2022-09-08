<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form class="" action="logincode.php" method="post">



      <div class="modal-body">
       <div class="form-group">
         <input type="email" name="email" class="form-control mb-3" placeholder="Enter email id">
       </div>
       <div class="form-group">
         <input type="password" name="password" class="form-control mb-3" placeholder="Enter password">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <?php
          if(!isset($_SESSION['auth_user_id'])){

            echo "<a class='nav-link' href='logincode.php' data-bs-toggle='modal' data-bs-target='#LoginModal'>Login</a>";

          }else {


            echo "<a class='nav-link' href='logout.php'>Logout</a>";

          }
          ?>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php if(isset($_SESSION['auth_username'])){ echo $_SESSION['auth_username'];} ?></a>
        </li>


      </ul>

    </div>
  </div>
</nav>
