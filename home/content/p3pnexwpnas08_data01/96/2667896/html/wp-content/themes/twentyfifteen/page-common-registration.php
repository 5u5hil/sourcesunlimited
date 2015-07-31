<?php
if ($_POST['role']) {
    
    $extraInfo = "";
    $secrole = "";
    if ($_POST['investor_type']) {

      // if ($_POST['investor_type'] == 'Individual') {
            $extraInfo = '?subtype='.$_POST['investor_type'];
            $secrole = "";
            if ($_POST['secrole']) {
                $secrole = '&secrole=' . $_POST['secrole'];
                header("location:/" . $_POST['role'] . "-signup/" . $extraInfo . "" . $secrole);
            } else {
                header("location:/" . $_POST['role'] . "-signup/$extraInfo");
            }
     
        
        
        
    } else {
        $xyz=1;
    // echo '<script>document.getElementById("error").innerHTML = "Please select investor type";</script>';
	 $abc='Please select investor type';
	 
    }
    
//   if ($_POST['secrole']) {
//                $secrole = '?secrole=' . $_POST['secrole'];
//                header("location:/" . $_POST['role'] . "-signup/" . $secrole);
//            } else {
//
//                header("location:/" . $_POST['role'] . "-signup");
//            }
}
 else {
     // $xyz=1;
  $abc='Please select role type';
      // echo '<script>document.getElementById("error").innerHTML = "Please select investor type";</script>';
}




get_header();
?>

<div class="parallax full-width-bg lr_widget">

    <div class="container">

        <div class="main-title">

            <div class="column dt-sc-three-fifth first">

                <h1>Register</h1>

            </div>



        </div>

    </div>

</div>

<!-- Container starts-->

<div class="full-width-section parallax full-section-bg" style="background-position: 50% 45px;">

    <div class="container">

        <div class="dt-sc-clear"></div>                            

        <div class="form-wrapper login" style="width:55%;">

            <form method="post" id="loginform" action="/common-registration/" name="frmLogin">

               
				
                                <h4 align="left" class="prelative">Primary Role  <div id='error' class="err"><?php if($xyz ==1) {echo $abc;} ?></div></h4>
				
                <div class="form-row form-row-wide validate-required" style="text-align:left;">
					
					<ul class="col3 hlist">
						<li><input type="checkbox" class="treecheck" name="role" value="startup">Startups </li>
						<li><input type="checkbox" class="treecheck" name="role" value="innovator">Innovators </li>
					
					</ul>
                   
				   <ul class="col3 hlist">
				   	<li> <input type="checkbox" class="treecheck" name="role" value="investor">Investors </li>
					   <li><input type="checkbox" class="treecheck" name="role" value="mentor">Mentors  </li>
					
					</ul>
				   
					<ul class="col3 hlist">
							<li><input type="checkbox" class="treecheck" name="role" value="corporate">Corporates</li>
						<li><input type="checkbox" class="treecheck" name="role" value="institute">Institutes</li>
					</ul>
                                <ul class="col3 hlist">
                                    <li> <input type="checkbox" class="treecheck" name="role" value="incubator">Incubators </li>
                                </ul>
                   
                  </div>
				  <div class="clr"></div>
				   <div id="investor_list" style="display:none; text-align:left; margin-top:10px;">
				   <div style="font-weight: bold; margin-bottom: 10px;">What type of an Investor are you?</div>
					<ul class="col3 hlist">
					<li><input type="checkbox" class="investor_type" name="investor_type" value="Angel Network">Angel Network</li>
					<li><input type="checkbox" class="investor_type" name="investor_type" value="Collective Pool">Collective Pool</li>
					</ul>
					<ul class="col3 hlist">
<!--					<li> <input type="checkbox" class="investor_type" name="investor_type" value="Incubator">Incubator </li>-->
					<li><input type="checkbox" class="investor_type" name="investor_type"  value="Individual" checked>Individual </li>
                                        <li><input type="checkbox" class="investor_type" name="investor_type" value="Venture Capital Fund">Venture Capital Fund </li>
					</ul>
					
					<ul class="col3 hlist">
						
					</ul>
                </div>

				  
				  
				  
				  
				  <div class="clr"></div>
				  <hr style="margin:20px 0;"/>
				  <h4 align="left">Secondary Role </h4>
				  
					<div id="secondary_startup" style="display:none;">
						<ul class="col3 hlist">
							<li><input type="checkbox"  name="secrole" value="innovator">Innovators  </li>
						</ul>
					</div>
							
               
               
                <div id="secondary_innovator" style="display:none">
					<ul class="col3 hlist">
						<li><input type="checkbox"  name="secrole" value="startup">Startups </li>
					</ul>
                </div>
                <div id="secondary_investor" style="display:none">
					<ul class="col3 hlist">
						<li> <input type="checkbox"  name="secrole" value="mentor">Mentors</li>
					</ul>
                </div>
                <div id="secondary_mentor" style="display:none">
					<ul class="col3 hlist">
						<li><input type="checkbox"  name="secrole" value="investor">Investors</li>
					</ul>
                </div>

                                  <input class="button fullbutton" value="Continue Registration" type="submit" id="commom_reg" onclick="return validateform();" >     

            </form>   

        </div>

    </div>

</div>









<div class="dt-sc-hr-invisible"></div>		 <!-- **container - Ends** --> 

<?php get_footer(); ?>

<script>
    $ = jQuery;
    $(document).ready(function () {
        $('.treecheck').on('change', function () {
            $('.treecheck').not(this).prop('checked', false);
            var checked = $(".treecheck:checked").length;
            // alert(checked);
            var investor_checked = $(".investor_type:checked").length;
            // alert(investor_checked);
            if (checked == '1')
            {
                if ($('.treecheck').is(":checked")) {
                    //alert('sdfsdfsdf');
                    if ($(this).val() == 'startup')
                    {
                        $('#secondary_startup').show();
                        $('#secondary_innovator').hide();
                        $('#secondary_mentor').hide();
                        $('#secondary_investor').hide();
                        $('#investor_list').hide();

                    }
                    if ($(this).val() == 'innovator')
                    {
                        $('#secondary_innovator').show();
                        $('#secondary_mentor').hide();
                        $('#secondary_investor').hide();
                        $('#secondary_startup').hide();
                        $('#investor_list').hide();
                    }
                    if ($(this).val() == 'mentor')
                    {
                        $('#secondary_mentor').show();
                        $('#secondary_startup').hide();
                        $('#secondary_innovator').hide();
                        $('#secondary_investor').hide();
                        $('#investor_list').hide();

                    }
                    if ($(this).val() == 'investor')
                    {


                        $('#investor_list').show();
                        $('#secondary_investor').show();
                        $('#secondary_startup').hide();
                        $('#secondary_innovator').hide();
                        $('#secondary_mentor').hide();

                       // $('.investor_type').not(this).prop('checked', false);
                        
                        var investor_checked = $(".investor_type:checked").length;
                         // alert(investor_checked);
                        if (investor_checked == 0)
                        {
                          return false;
                            $('#error').html('Please select investor type');
                        } else
                        {
                           // alert("@#$%%");
                            $('#error').html('');
                        }

                    }
					
					
                    if (($(this).val() == 'institute') || ($(this).val() == 'corporate') || ($(this).val() == 'incubator'))
                    {
                        $('#secondary_investor').hide();
                        $('#secondary_startup').hide();
                        $('#secondary_innovator').hide();
                        $('#secondary_mentor').hide();
                        $('#investor_list').hide();

                    }

                }

                $('#error').html('');
            }
            else
            {
                 return false;
                $('#error').html('Please select primary role');
                $('#investor_list').hide();


            }


            $('.investor_type').on('change', function () {
            $('.investor_type').not(this).prop('checked', false);
            var checked = $(".investor_type:checked").length;
            // alert(checked);
            var investor_checked = $(".investor_type:checked").length;
            if (investor_checked == '0')
            {
                return false;
                $('#error').html('Please select investor type');
            } else
            {
                $('#error').html('');
            }



        });

        });

        
    });
	
	function validateform(){
		var treechecked = $(".treecheck:checked").length;
		
			if (treechecked == '0'){
			$('#error').html('Please select Primary role')
			return false;
			}
		
		
		}
	
</script>