<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/login/login.css">
</head><title>PT. KMI</title>

  <form class="login" form action="<?php echo base_url(). 'web/check_login'; ?>" method="POST">
     <h2 class="login-title"><center>Requisition Form Application</center></h2>
     <input type="text" class="login-input" name="email" placeholder="Email Adress" autofocus>
     <input type="password" class="login-input" name="password" placeholder="Password">
     <input type="submit" name="Login" value="Login" class="login-button">
    </form>
</html>