<?php

// Include WordPress core
require_once('../../../wp-load.php');

// Get form data
$username = sanitize_text_field($_POST['username']);
$email = sanitize_email($_POST['email']);
$password = $_POST['password'];

// Validation and registration logic here
// You can use WordPress functions like `wp_insert_user` for user registration

// Example:
$user_id = wp_insert_user(array(
    'user_login' => $username,
    'user_email' => $email,
    'user_pass' => $password,
));

if (is_wp_error($user_id)) {
    echo 'Error: ' . $user_id->get_error_message();
} else {
    echo 'Registration successful!'; // Return a success message
}

wp_die(); // Terminate script execution


?>