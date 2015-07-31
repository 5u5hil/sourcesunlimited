<?php
chkLogin();
get_header();
?>

<div class="parallax full-width-bg lr_widget">

    <div class="container">

        <div class="main-title">

            <div class="column dt-sc-three-fifth first">

                <h1>Institute Details</h1>

            </div>



        </div>

    </div>

</div>

<div class="dt-sc-margin30"></div>

<div class="container">

    <!-- Primary Starts -->

    <section id="primary" class="content-full-width invt_det">

        <?php while (have_posts()) : the_post();
       $timezone = +5.50;
  $date = gmdate("F d, Y H:i:s", time() + 3600*($timezone+date("I")));
            setPostViews(get_the_ID(),$date);
        ?>    

            <div class="column dt-sc-one-fourth first" >
                <div class="id_logo">
                   <!-- <img src="http://ivycamp.cruxservers.in/wp-content/themes/twentyfifteen/images/investor_logo.png">-->
                    <img src="http://ivycamp.cruxservers.in/wp-content/uploads/2015/04/institute-127x150.jpg">
                </div>
<!--                <div class="column dt-sc-one-half first"> <a href="javascript:void(0);" onclick="<?php setPostInterests(get_the_ID());?>" class="dt-sc-button btn"> <i class="fa fa-check"></i>Show Interest</a> </div>-->
               <div class="btn-detail"> <a href="#askque" class="dt-sc-button btn">Ask Question</a> </div>
            <!--   <div class="column dt-sc-one-half"><a href="javascript:void(0);" onclick="<?php setPostLikes(get_the_ID());?>" class="dt-sc-button btn"> <i class="fa fa-question-circle"></i>Value Added</a> </div>-->
            </div>
            <div class="column dt-sc-three-fourth">


                <h4 class="id_title"><?php if(get_post_meta(get_the_ID(), 'Alumni of Institute', true)) { echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Alumni of Institute', true)); } else { echo "Not Avail."; }  ?></h4>
                <div class="column dt-sc-one-half first">
<!--                    <p class="detail_info"> <i class="fa fa-rupee"></i> Person Position at Institute: <span class="fblock"><?php // echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Position', true)); ?> </span></p>-->
               <p class="detail_info"><span class="fa fa-map-marker">  </span>  City of Location: <?php if(get_post_meta(get_the_ID(), 'City Of location', true)) { echo  get_the_category_by_ID(get_post_meta(get_the_ID(), 'City Of location', true)); } else { echo 'Not Avail.'; } ?> </p>
                </div>
                <div class="column dt-sc-one-half ">
                    <p class="detail_info"> 
                        <i class="fa fa-envelope"></i>  Director Name: <span class="fblock"><?php if(get_post_meta(get_the_ID(), 'Director', true)) { echo get_post_meta(get_the_ID(), 'Director', true); } else { echo "not Avail."; } ?> </span></p>

                </div>
 
 
		
            <div class="clearfix clear"></div>
            <div class="full-width dt-sc-margin80">
                
                <div class="dt-sc-margin20"></div>
           
                <div class="id_contact " id="askque" >

                    
                </div>
<br/>
                <ul class="dt-sc-social-icons">
                    <li><a class="dt-sc-tooltip-top" href="#" target="_blank"> <i class="fa fa-facebook"></i> </a></li>
                    <li><a class="dt-sc-tooltip-top" href="#" target="_blank"> <i class="fa fa-twitter"></i> </a></li>

                </ul>
            </div>
 
      <div class="clearfix clear"></div>
 
      <div class="full-width" >
                <h4 class="id_title"> Ask a Question </h4>   
                <form id="meh">
                    <!--div class="column dt-sc-one-half first">
                    <p> <span> <input type="text" placeholder="Name*" name="your-name" value="" required=""> </span> </p>
                </div>
                <div class="column dt-sc-one-half">
                    <p> <span> <input type="email" placeholder="Email*" name="email" value="" required=""> </span> </p>
                </div-->
                    <?php $current_user = wp_get_current_user(); ?>

                    <input  type="hidden" name="authorId" id="authorId" value="<?= $current_user->id ?>" />
                    <input  type="hidden" name="fromName" id="fromName" value="<?= $current_user->user_firstname ?>" />
                    <input  type="hidden" name="fromEntity" id="fromEntity" value="<?= get_user_meta($current_user->id, "entity", true); ?>" />
 <input type="hidden" name="corporate_id" id="corporate_id" value="<?= get_the_ID() ?>">

                    <input  type="hidden" name="toName" id="toName" value="<?= get_the_author() ?>" />
                    <input  type="hidden" name="toEntity" id="toEntity" value="<?= get_the_author_meta("entity"); ?>" />

                    <p> <textarea placeholder="Message" id="message" name="your_meassage" required=""></textarea> </p>
                    <div class="dt-sc-margin10"></div>
                    <div id="success"></div>
                    <p> <input type="button" value="Submit" name="submit" onclick="<?php setPostQuestions(get_the_ID()) ?>"  id="question" class="button"> </p>
                </form>
            </div>
            <?php
        endwhile;
        ?>
 
 
 
 
 
 
            </div>
 
    </section>



</div>

<div class="dt-sc-hr-invisible"></div>		 <!-- **container - Ends** --> 

<?php get_footer(); ?>

<script>
    $ = jQuery;
    $(document).ready(function () {
        $('#question').click(function () {


            $.ajax({
                url: "/insert-question/",
                type: 'POST',
                data: $('#meh').serialize(),
                success: function (msg) {
                    $('#success').html(msg)

                }
            });
        });
    });
</script>