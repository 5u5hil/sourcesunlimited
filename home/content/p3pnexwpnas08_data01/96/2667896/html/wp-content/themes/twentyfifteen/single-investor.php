<?php
chkLogin();
get_header();
?>

<div class="parallax full-width-bg lr_widget">

    <div class="container">

        <div class="main-title">

            <div class="column dt-sc-three-fifth first">

                <h1>Investor Details</h1>

            </div>



        </div>

    </div>

</div>

<div class="dt-sc-margin30"></div>

<div class="container">

    <!-- Primary Starts -->

    <section id="primary" class="content-full-width invt_det">

        <?php
        while (have_posts()) : the_post();
             $timezone = +5.50;
  $date = gmdate("F d, Y H:i:s", time() + 3600*($timezone+date("I")));
            setPostViews(get_the_ID(),$date);
           // setPostLikes(get_the_ID());
            ?>    

            <div class="column dt-sc-one-fourth first" >
                <div class="id_logo">
                   <!-- <img src="http://ivycamp.cruxservers.in/wp-content/themes/twentyfifteen/images/investor_logo.png">-->
                     <div class="portfolio-thumb">

                            <?php
                            if (has_post_thumbnail()) {

                                the_post_thumbnail();
                            } else {

                                $img = wp_get_attachment_image_src(414);

                                echo "<img src='" . $img[0] . "' />";
                            }
                            ?>

                        </div>
                </div>
              <?php  $current_user = wp_get_current_user();
                if(get_user_meta($current_user->ID, "entity", true)=='innovator') { ?>
              
 <div class="btn-detail"> <a href="#meh" class="dt-sc-button btn">Ask Question</a> </div>
                <?php } else {?>
 <div class="btn-detail"> <a href="#meh" class="dt-sc-button btn">Ask Question</a> 
                </div>
                <?php }?>
            </div>
            <div class="column dt-sc-three-fourth">

               <h3 class="mb10"> <?php if(get_post_meta(get_the_ID(), 'Organization Name', true)) { echo get_post_meta(get_the_ID(), 'Organization Name', true); } else { echo "Not Avail.";} ?>  </h3>
               <h4 class="id_title"><?= the_title(); ?></h4>
                <div class="column dt-sc-one-half first">
                    <p class="detail_info"> <i class="fa fa-rupee"></i> Level of Investment (In Lacs):  <span class="fblock"><?php if(get_post_meta(get_the_ID(), 'Funding Amount', true)) { echo get_post_meta(get_the_ID(), 'Funding Amount', true); } else { echo "Not Avail.";} ?>  </span></p>
                    
                </div>
                <div class="column dt-sc-one-half ">
                    <p class="detail_info"> <i class="fa fa-envelope"></i> Sector: <?php if (get_post_meta(get_the_ID(), 'Sector', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Sector', true)) as $sector) { ?>
                                   <span class="fblock"> <?= get_the_category_by_ID($sector); ?> , </span>
                                <?php } } else { echo "Not Avail.";} ?></q>  </p>
                   
                </div>

			
            <div class="clearfix clear"></div>
            <div class="full-width dt-sc-margin80">
                <h4>Member of Organizations:   <?php if((get_post_meta(get_the_ID(), 'Member', true))) echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'Member', true)); else echo "Not Avail."; ?></h4>
				<blockquote class="type2"> 

                    <q>Alumni of Institution: <?php if(get_post_meta(get_the_ID(), 'Alumni', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Alumni', true)) as $idd) { ?>
                                    <p><?= get_the_category_by_ID($idd); ?></p>
                    <?php } } else { echo "Not Avail.";}   ?></q> 

                </blockquote>
                <div class="dt-sc-margin20"></div>
                
                <div class="id_contact " id="askque">

                    <p class="ptb3"><span class="fa fa-map-marker">  </span>  City of Location: <?php if(get_post_meta(get_the_ID(), 'City Of location', true)) { get_the_category_by_ID(get_post_meta(get_the_ID(), 'City Of location', true)); } else { echo "Not Avail."; } ?> </p>
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
                    <p> <input type="button" value="Submit" name="submit"  id="question" class="button"> </p>
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

