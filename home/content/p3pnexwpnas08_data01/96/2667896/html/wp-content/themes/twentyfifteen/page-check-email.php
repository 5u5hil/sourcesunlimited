<?php

if (username_exists($_POST['email'])) {
    $email = base64_encode($_POST['email']);
    $email_to = $_POST['email'];

    $subject = "IvyCamp.in Password Reset Link";
    $link = "<a href='http://ivycamp.in/update-password?id=$email'>here</a>";
    $content = "Please click $link to reset your password!<br/>";



    $headers[] = 'From: IvyCamp <no-reply@ivycamp.in>';
    $headers[] = 'Content-type:  text/html'; // note you can just use a simple email address

  
    $status = wp_mail($email_to, $subject, $content, $headers);

    if ($status == 1) {
        echo "<span class='success'>A Password reset link has been sent to your email Id!</span>";
    } else {
        echo "<span class='error'>Oops! Something went wrong! Please try again after some time!</span>";
    }
} else {
    echo "<span class='error'>This Email Address is not registered with us!</span>";
}
