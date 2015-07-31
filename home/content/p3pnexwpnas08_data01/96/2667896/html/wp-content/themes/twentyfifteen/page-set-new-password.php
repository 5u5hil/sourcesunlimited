<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
echo $user = username_exists(base64_decode($_POST['user_login']));

if ($user) {
    wp_set_password($_POST["new_pass"], $user);
    header("Location:/login/");
} else {
    $error = "Sorry this Email is not registered with us!";
}




get_header();
?>


<div class="page_title2">
    <div class="container">

        <div class="title"><h1>Set New Password  </h1></div>

        

    </div>
</div><!-- end page title --> 

<div class="clearfix"></div>

<div class="container">

    <div class="content_fullwidth lessmar">

        <div class="login_form">		
            <p><?= $error ?></p>	
        </div>


    </div>

</div><!-- end content area -->


<div class="clearfix margin_top3"></div>

<?php get_footer(); ?>
