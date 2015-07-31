<?php
chkLogin();
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
 
                      $user_like = get_post_meta(get_the_ID(), 'User Likes', true);
                     // echo $user_like;
                      $user = json_decode($user_like, true);
                      //print_r($user); die;
                      
                                          
                      $userId = array();


foreach ($user as $value) {


    array_push($userId, $value['id']);
}
                     get_header();
?>

<div class="parallax full-width-bg lr_widget">

    <div class="container">

        <div class="main-title">

            <div class="column dt-sc-three-fifth first">

                <h1>Corporate Details</h1>

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
		<div class="column dt-sc-one-fourth first">
                    <?php
                            if (has_post_thumbnail()) {

                                the_post_thumbnail();
                            } else {

                                $img = wp_get_attachment_image_src(412);

                                echo "<img src='" . $img[0] . "' />";
                            }
                           ?>
                  
 <div class="btn-detail"> 
	<a href="#askque" class="dt-sc-button btn">Ask Question</a>  </div>
	  
	 <?php      if(in_array($user_id, $userId)) { ?>
	 <div class="btn-detail"><a href="javascript:void(0);" class="dt-sc-button btn disablebtn" >Value Added</a></div>
             <?php } else {?>
         <div class="btn-detail"> <a href="javascript:void(0);" class="dt-sc-button btn" onclick="setLikes('<?= get_the_ID() ?>')">Value Added</a></div>
                     <?php }?>
	

          </div>  
                
        
                

           
<div class="column dt-sc-three-fourth" >
<!--                <h3 class="mb10"> Corporate Name       </h3>-->
                <h4 class="id_title"><?php  the_title(); ?></h4>
                <div class="column dt-sc-one-fourth first">
                <p class="detail_info"> <i class="fa fa-rupee"></i> Sectors:  <span class="fblock"><?php if(get_post_meta(get_the_ID(), 'InnovatorsSectors', true)) { echo get_the_category_by_ID(get_post_meta(get_the_ID(), 'InnovatorsSectors', true));  } else { echo "Not Avail."; }?></span> </p>
                   
                </div>
                <div class="column dt-sc-one-half first">
                    <p class="detail_info"> <i class="fa fa-envelope"></i> Sectors to invest in :  <?php if(get_post_meta(get_the_ID(), 'Sector of interest', true)) { foreach (explode(",", get_post_meta(get_the_ID(), 'Sector of interest', true)) as $sector) { ?>
                                    <span class="fblock"><?php echo  get_the_category_by_ID($sector); ?></span>
                    <?php  } } else { echo "Not Avail."; } ?> </p>
                                    
                                   
                   
                </div>

				
				
			
            <div class="clearfix clear"></div>
            <div class="full-width dt-sc-margin80">
               
				   <blockquote class="type2"> 

                   <q>Alumni of Institution:
<?php  if(get_post_meta(get_the_ID(), 'Institute name', true)) {foreach (explode(",", get_post_meta(get_the_ID(), 'Institute name', true)) as $institute) { ?>
                       <p> <?php echo get_the_category_by_ID($institute); ?></p>
<?php  } } else { echo  "Not Avail."; } ?> </q>
                </blockquote>
                <div class="dt-sc-margin20"></div>
<!--                <h4 class="id_title"> Contact Details </h4>

                <div class="id_contact mb0">

                    <p><span class="fa fa-phone"> </span> Mobile: <?=get_post_meta(get_the_ID(), 'Mobile', true); ?></p>
                    <p><span class="fa fa-globe"> </span> Website: <?=get_post_meta(get_the_ID(), 'Website', true); ?></p>

                </div>-->
<div class="id_contact " id="askque">

                    <p class="ptb3"><span class="fa fa-map-marker">  </span>  City of Location: <?=  get_the_category_by_ID(get_post_meta(get_the_ID(), 'City Of location', true)); ?> </p>
                </div>
				<br/>
                <ul class="dt-sc-social-icons">
                    <li><a class="dt-sc-tooltip-top" href="#" target="_blank"> <i class="fa fa-facebook"></i> </a></li>
                    <li><a class="dt-sc-tooltip-top" href="#" target="_blank"> <i class="fa fa-twitter"></i> </a></li>

                </ul>
            </div>	
				
				

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
                    <p> <input type="button" value="Submit" name="submit"  onclick="<?php setPostQuestions(get_the_ID()) ?>"  id="question" class="button"> </p>
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
    
    function setLikes(id) {
                        $.ajax({
                            url: "/insert-like/",
                            type: 'POST',
                            data: {id: id},
                            success: function (msg) {
                              //  alert("Liked");
location.reload();
                            }
                        });
                    }
</script>
