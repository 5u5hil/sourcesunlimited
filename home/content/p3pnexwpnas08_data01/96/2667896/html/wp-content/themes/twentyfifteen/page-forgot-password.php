<?php
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
<div class="full-width-section parallax full-section-bg" style="background-position: 50% 45px;">
    <div class="container">
        <div class="dt-sc-clear"></div>                            
        <div class="form-wrapper login" style="width:55%;">
            <form name="frmLogin">
                <p>
                    <input placeholder="Email" type="email" id="email" name="email" />
                </p>
                <p class="res"></p>
                <label><a href="/login/"> Back to log-In </a></label>
                <input class="button" value="Submit"  id="submit" type="submit">     
            </form>   
        </div>
    </div>
</div>




<div class="dt-sc-hr-invisible"></div>		 <!-- **container - Ends** --> 
<?php get_footer(); ?>

<script>
    $ = jQuery;
    $(document).ready(function () {
       // alert("hgdkfhgdkfjg");
        $("#submit").click(function (e) {
          //  alert('gdfgdgdgdgdg');
            e.preventDefault();

            if (validateEmail($("#email").val())) {
                $.ajax({
                    url: "/check-email/",
                    type: "post",
                    data: {email: $("#email").val()},
                    success: function (data) {
                        $("p.res").html(data);
                    }
                });

            } else {
                $("p.res").html("<span class='error'>Please Enter a Valid Email</span>");
            }

        });
    });

    function validateEmail(sEmail) {
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if (filter.test(sEmail)) {
            return true;
        }
        else {
            return false;
        }
    }
</script>