<?php
    session_start();
    if (isset($_POST['LoginNow'])) {

    include('includes/db_config.php');

		$Email = $_POST['login-email'];
		$Password = $_POST['login-password'];
    
		if(!empty($Email) && !empty($Password))
		{ 
			$query = "SELECT * FROM `tbl_prism_users` WHERE `Email` = '$Email'";
			$result = mysqli_query($conn, $query);
			if(mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);
				if($user_data['Password'] == $Password)
				{
					$_SESSION['user_id'] = $user_data['Id'];
					header("Location: admin/dashboard");
					die;
				} else {
          $_SESSION['status'] = "The password you entered is incorrect.";
        }
			} else {
        $_SESSION['status'] = "The email you entered is incorrect.";
      }
		}else
		{
      $_SESSION['status'] = "Email OR Password Missing.";
		}
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title>Prism Labs</title>
  <link rel="icon" type="image/x-icon" href="assets/img/avatars/logo.jpeg">
</head>
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #00003E;
   color: white;
   text-align: center;
}
.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        border-radius: 25px;
}
</style>
<body style="background-color: #30B890;">

  <!-- NAVBAR -->
  <nav class="z-depth-0" style="background-color: #00003E;">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo">
        <img src="assets/img/avatars/logo-1.png" style="width: 175px; margin-top: 2px; border-radius: 5px;">
      </a>
    </div>
  </nav>

  <div class="card center"  style="background-color: #f7f7f7; border: 10px solid #00003e; width: 35rem; height: 30rem; margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body">
      <div class="m-sm-4">
        <div class="text-center">
          <img src="assets/img/avatars/logo.jpeg" style="margin-top: 50px;" alt="Prism Labs" width="100" height="100" />
        </div>
        <form action="index" method="post" style="margin-top: 25px;">
          <div class="input-field" style="margin-left: 90px; margin-right: 90px;">
            <input type="email" id="login-email" name="login-email" required/>
            <label for="login-email">Email address</label>
          </div>
          <div class="input-field" style="margin-left: 90px; margin-right: 90px;">
            <input type="password" id="login-password" name="login-password" required/>
            <label for="login-password">Your password</label>
          </div>
          <button class="btn btn-large" name="LoginNow" id="signin">Login</button>
          <p class="error red-text center-align">
          <?php 
              if (isset($_SESSION['status'])) {
                  $message = $_SESSION['status'];
                  echo "$message";
                  unset($_SESSION['status']);
              }
          ?>
          </p>
        </form>
      </div>
    </div>
  </div>

  <div class="footer">
    <div class="footer-copyright">
      <div class="container center">
      © 2022 Copyright
      <a href="https://prismlabs.in/">Prism Laboratories</a>
      </div>
    </div>
  </div>

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>