<?php

get_header();
?>
<div class="parallax full-width-bg lr_widget">
    <div class="container">
        <div class="main-title">
            <div class="column dt-sc-three-fifth first">
                <h1>Set your password</h1>
            </div>

        </div>
    </div>
</div>



<div class="full-width-section parallax full-section-bg" style="background-position: 50% 45px;">
    <div class="container">
        <div class="dt-sc-clear"></div>                            
        <div class="form-wrapper login" style="width:55%;">
            <form name="frmLogin" class="sky-form" method="post" action="/set-new-password/">
				
                                <input type="hidden" name="user_login" value="<?= $_GET['id'] ?>" />
								
					<p>
                    <input placeholder="New Password"  type="password" id="new_pass" name="new_pass" />
                </p>
					
					<p>
                    <input placeholder="Confirm Password"  type="password" id="conf_pass" name="conf_pass" />
                </p>
					
				
				<footer>
					<div class="fright">
                                            <input type="submit" class="button" value="Submit" id="submit">
                    </div>
                                    <div id="password_mismatch"></div>		
				</footer>
			</form>			
		</div>


    </div>

</div><!-- end content area -->


<?php get_footer(); ?>
<script>

    $ = jQuery;

    $(document).ready(function () {
         $('#submit').click(function () {
             var new_pass = $('#new_pass').val();
             var conf_pass = $('#conf_pass').val();
             
             //var flag =0;
             
             if(new_pass == conf_pass)
             {
                 return true;
             }
             else
             {
                 $('#password_mismatch').html('Password fields mismatch');
                 return false;
             }
         });
    });
    </script>
