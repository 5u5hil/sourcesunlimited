
<?php
if ($_POST['email']) {
    // echo get_user_id_from_string($_POST['email']);
    $current_user = get_user_by('email', $_POST['email']);
    $args = array('offset' => 0, 'post_type' => get_user_meta($current_user->ID, "entity", true), 'author' => $current_user->ID);

    $the_query = new WP_Query($args);

    $post = $the_query->post;
//var_dump($post); 
    $post_status = $post->post_status;  // die;

    if ($post_status == 'publish') {
        $creds = array();
        $creds['user_login'] = $_POST['email'];
        $creds['user_password'] = $_POST['password'];
        $user = wp_signon($creds, false);

        if ($post->post_type == 'mentor') {
             if (is_wp_error($user)) {
                  header("location:/login?status=failed"); 
            } else {
            header("location:/edit-mentor/");
            }
        } else {
            if (is_wp_error($user)) {
                  header("location:/login?status=failed"); 
            } else {
                header("location:/" . get_user_meta($current_user->ID, "entity", true) . "-dashboard");
            }
        }
    } else {
        $msg = "Oops! You are not yet verified. We will contact you soon for verification. Thank You.";
    }
}
get_header();
?>
<div class="parallax full-width-bg lr_widget">
    <div class="container">
        <div class="main-title">
            <div class="column dt-sc-three-fifth first">
                <h1>Login</h1>
            </div>

        </div>
    </div>
</div>
<!-- Container starts-->

<?php
if ($user) {
    if (is_wp_error($user)) {
        ?>
        <div class="dt-sc-margin10"></div><h3> Please check email id and Password.</h3>
        <div class="dt-sc-margin10"></div>
        <?php
    }
}
?>

<div class="full-width-section parallax full-section-bg" style="background-position: 50% 45px;">
 <div class="container"><div style="text-align:center; color:red; font-size:16px;"><?php echo $msg; ?><br><br></div>
  <div class="container"><div style="text-align:center; color:red; font-size:16px;"><?php if($_GET['status']=='failed') { echo "Invalid Username or Password!"; }?><br><br></div>
        <div class="dt-sc-clear"></div>                            
        <div class="form-wrapper login" style="width:55%;">
            <form method="post" id="loginform" action="/login/"  name="frmResetPass">

                <p>
                    <input placeholder="Email" id="user_name" name="email" autocomplete="off" type="text">
                </p>

                <p>
                    <input placeholder="Password" id="user_pwd" name="password" type="password">
                </p>
                <label><a href="/forgot-password/"> Forgot your password? </a></label>
                <input class="button" value="Log-In" type="submit" id="submit_login">     
            </form>  


        </div>
    </div>
</div>


<script>
    $ = jQuery;

    jQuery(document).ready(function ($) {

        $('#submit_login').click(function () {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var email = $('#user_name').val();
            var password = $('#user_pwd').val();
            var flag = 0;
            if (email == null || email == "" || !emailPattern.test(email))
            {

                $('#user_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {

                $('#user_name').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (password == '' || password == null)
            {
                $('#user_pwd').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});

                flag++;
            }
            else
            {
                $('#user_pwd').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (flag == 0)
            {
                return true;
            }
            else
            {
                //  $('#error').html('<span style="color:red;">* Marked fields are mandatory. Kindly fill those fields to proceed ahead. </span>');
                return false;
            }
        });
    });
</script>


<div class="dt-sc-hr-invisible"></div>		 <!-- **container - Ends** --> 
<?php get_footer(); ?>