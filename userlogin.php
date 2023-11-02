<?php
/*
Template name:login

*/
get_header();
?>
<div class="container-fluid">
<form id="custom-login-form" action="" method="post">
<p> <label for="login-username">Username:</label>
    <input type="text" class="form-control" name="login-username" id="login-username" required> </p>
    <br>

    <p><label for="login-password">Password:</label>
    <input type="password" class="form-control" name="login-password" id="login-password" required> </p>
    <br>

    <input type="submit" value="Login" class="btn btn-success">
</form>
</div>




<?php get_footer(); ?>