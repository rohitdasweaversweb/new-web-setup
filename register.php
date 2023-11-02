<?php
/*
Template name:register

*/
get_header();
?>
<div class="container-fluid">
    <form id="custom-registration-form" action="" method="post">
        <p><label for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </p>

        <p> <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </p>

        <p> <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </p>

        <p> <input type="submit" value="submit" class="btn btn-success"></p>
    </form>
</div>





<?php get_footer(); ?>