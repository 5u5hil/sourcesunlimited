<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header(); 




?>
<style>
.bantxt1{
	top:185px;left:15px;font-weight:normal; z-index:5;padding-left:0px;font-family:'Lato', 'Open Sans', sans-serif;font-size:60px;line-height:46px;color:#101017;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100;durationin:2000;delayin:2500;transformoriginin:left 50% 0;offsetxout:0;rotateyout:-90;transformoriginout:left 50% 0;
}
.bantxt2{top:250px;left:20px;font-weight:300;font-family:'Lato';font-size:30px;color:#101017;white-space: nowrap;" data-ls="delayin:4500;}
.banimg{top:70px;left:500px;white-space: nowrap;}
.btm{float:left; margin-left:15px;}

.inline-display{ display: inline-block; vertical-align: top; }
.inline-display img{ height: 69px; width:69px; border:1px solid #c1c1c1 !important;}
.img-slider1{ margin-right:40px;}
.ivy-partner1 { margin-right:20px;}
.ivy-alumni1 {margin-right:20px; }
.invisible_custum{margin:13px 0px !important;}
</style>



	<!-- **banner - Starts** -->
            <div class="banner">
                <!-- **Slider Section** -->
                <div id="layerslider_9" class="ls-wp-container" style="width:100%;height:400px;max-width:1920px;margin:0 auto;margin-bottom: 0px;">
                    
                    <div class="ls-slide" data-ls="slidedelay:10000;transition2d:4;">						
                        <img src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" data-src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" class="ls-bg" alt="bg1" />
						
                        <div class="ls-l" style="top:110px;left:15px;font-weight:bold; z-index:5;padding-left:0px;font-family:'Lato', 'Open Sans', sans-serif;font-size:35px;line-height:46px;color:#006b3b;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100;durationin:2000;delayin:2500;transformoriginin:left 50% 0;offsetxout:0;rotateyout:-90;transformoriginout:left 50% 0;">CONNECTING 1000’S ALUMNI <br />GLOBALLY</div>
                         <div class="ls-l" style="top:210px;left:20px;font-weight:300;font-family:'Lato';font-size:20px;color:#101017;white-space: nowrap;" data-ls="delayin:4500;">To engage with and support innovators and <br />  entrepreneurs<br></br>
                             
						 </div>
						 <img class="ls-l" style="top:110px;left:600px;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100;delayin:500;" src="<?= get_template_directory_uri() ?>/images/sliders/blank.gif" data-src="<?= get_template_directory_uri() ?>/images/ivyman.png" alt="image" />
                      
                       
                    </div>
					<!-- 1St Slider End -->
					<div class="ls-slide" data-ls="slidedelay:10000;transition2d:4;">
                        <img src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" data-src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" class="ls-bg" alt="bg3" />

                        <div class="ls-l" style="top:110px;left:15px;font-weight:bold; z-index:5;padding-left:0px;font-family:'Lato', 'Open Sans', sans-serif;font-size:35px;line-height:46px;color:#006b3b;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100;durationin:2000;delayin:2500;transformoriginin:left 50% 0;offsetxout:0;rotateyout:-90;transformoriginout:left 50% 0;"> UNIFIED PLATFORM FOR <br /> ENTREPRENEURSHIP </div>
                         <div class="ls-l" style="top:210px;left:20px;font-weight:300;font-family:'Lato';font-size:20px;color:#101017;white-space: nowrap;" data-ls="delayin:4500;">Bringing together  Educational Institutes<br /> across the country  </div>
						
                       <img class="ls-l" style="top:80px;left:530px;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100; delayin:500;" src="<?= get_template_directory_uri() ?>/images/sliders/blank.gif" data-src="<?= get_template_directory_uri() ?>/images/man2.png" alt="image" />
                     </div>
					 			<!-- 2nd Slider End -->
					
					<div class="ls-slide" data-ls="slidedelay:10000;transition2d:4;">
                        <img src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" data-src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" class="ls-bg" alt="bg2" />
						
                        <div class="ls-l" style="top:110px;left:15px;font-weight:bold; z-index:5;padding-left:0px;font-family:'Lato', 'Open Sans', sans-serif;font-size:35px;line-height:46px;color:#006b3b;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100;durationin:2000;delayin:2500;transformoriginin:left 50% 0;offsetxout:0;rotateyout:-90;transformoriginout:left 50% 0;"> INNOVATION AND ENTREPRENEURSHIP <br /> MARKETPLACE </div>
                         <div class="ls-l" style="top:210px;left:20px;font-weight:300;font-family:'Lato';font-size:20px;color:#101017;white-space: nowrap;" data-ls="delayin:4500;">Providing connections and support to transform <br /> innovation to practice
</div>
                       
                        
                        <img class="ls-l" style="top:60px;left:636px; white-space: nowrap;" data-ls="offsetxin:0;offsetyin:500;durationin:1800;" src="<?= get_template_directory_uri() ?>/images/sliders/blank.gif" data-src="<?= get_template_directory_uri() ?>/images/lady.png" alt="image" />
						
                        
                    </div>
                        
                      			<!-- 3rd Slider End -->
								
							<div class="ls-slide" data-ls="slidedelay:10000;transition2d:4;">
                        <img src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" data-src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" class="ls-bg" alt="bg3" />

                        <div class="ls-l" style="top:110px;left:15px;font-weight:bold; z-index:5;padding-left:0px;font-family:'Lato', 'Open Sans', sans-serif;font-size:35px;line-height:46px;color:#006b3b;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100;durationin:2000;delayin:2500;transformoriginin:left 50% 0;offsetxout:0;rotateyout:-90;transformoriginout:left 50% 0;">An Engagement Program for <br /> Innovators and Entrepreneurs </div>
                         <div class="ls-l" style="top:210px;left:20px;font-weight:300;font-family:'Lato';font-size:20px;color:#101017;white-space: nowrap;" data-ls="delayin:4500;">Designed to create intellectual capital, innovation <br />  and value
</div>
						
                       <img class="ls-l" style="top:80px;left:530px;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100; delayin:500;" src="<?= get_template_directory_uri() ?>/images/sliders/blank.gif" data-src="<?= get_template_directory_uri() ?>/images/man2.png" alt="image" />
                     </div>
					<!-- 4 Slider End -->
					
						 <div class="ls-slide" data-ls="slidedelay:10000;transition2d:4;">
                        <img src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" data-src="<?= get_template_directory_uri() ?>/images/sliders/bg1.jpg" class="ls-bg" alt="bg1" />
						
                        <div class="ls-l" style="top:40px;left:15px;font-weight:bold; z-index:5;padding-left:0px;font-family:'Lato', 'Open Sans', sans-serif;font-size:35px;line-height:46px;color:#006b3b;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100;durationin:2000;delayin:2500;transformoriginin:left 50% 0;offsetxout:0;rotateyout:-90;transformoriginout:left 50% 0;">IVYCAMP INNOVATION & <br>ENTREPRENEURSHIP CONCLAVE</div>
						
                         <div class="ls-l" style="top:140px;left:20px;font-weight:300;font-family:'Lato';font-size:20px;color:#101017;white-space: nowrap;" data-ls="delayin:4500;">An Innovation and Entrepreneurship Platform<br>Leveraging the Power of the Global IIT and IIM Alumni Network <br></br>
                             <div class="img-slider1 inline-display">
                                 <span class="name-media-partner">Media Partners</span><br />
                                 <span class="img-media-partner partner-one"><img src="<?= get_template_directory_uri() ?>/images/ivy-media-partner.jpg" class="ivy-partner1" alt="Media Partner"></span>
                                 <span class="img-media-partner partner-two"><img src="<?= get_template_directory_uri() ?>/images/ivy-media-cnbctv.jpg" class="ivy-partner2" alt="Media Partner"></span>
                                 
                             </div>
                             
                              <div class="img-slider inline-display">
                                 <span class="name-media-partner">Alumni Entrepreneurs from</span><br />
                                 <span class="img-media-partner partner-one"><img src="<?= get_template_directory_uri() ?>/images/ivy-alumni-snap.jpg" class="ivy-alumni1" alt="Alumni Entrepreneurs"></span>
                                 <span class="img-media-partner partner-two"><img src="<?= get_template_directory_uri() ?>/images/ivy-alumni-fabfurnish.jpg" alt="Alumni Entrepreneurs"></span>
                                 
                             </div>
                             
                             <br/><br /> <span style="color:#006b3b;">Event was on Feb 13, 2015, Mumbai. Organized by IvyCamp </span> <br/>
							 <a href="http://ivycamp.cruxservers.in/event" style="font-weight:bold; font-size:16px;">Click here to know more</a>
						 </div>
						 <img class="ls-l" style="top:110px;left:600px;white-space: nowrap;" data-ls="offsetxin:0;offsetyin:-100;delayin:500;" src="<?= get_template_directory_uri() ?>/images/sliders/blank.gif" data-src="<?= get_template_directory_uri() ?>/images/ivyman.png" alt="image" />
						
                       

                    </div>
					<!-- 5 Slider End -->
					
               </div>
            </div><!-- **banner - Ends** -->
            
        	
        	<div class="dt-sc-margin65"></div>  
			<!-- **Full-width-section - Starts** -->       
			<div class="full-width-section">
				<div class="container">
				    <h2 class="aligncenter">IvyCamp Differentiators</h2>
				    <!--p class="middle-align">We focus on Entrepreneurs with professional backgrounds from leading institutions of the country.  We believe the success of any company is determined primarily by the quality of its promoters. Research shows companies started and run by promoters from leading institutions of the country have been 5-7 times more successful than otherwise </p-->
                                    <p class="middle-align">IvyCamp, an initiative by IvyCap Ventures, is India’s first online marketplace for innovation and entrepreneurship, leveraging the power of the Global Alumni Network.</p>	
				    <div class="dt-sc-hr-invisible-small"></div>
				    <div class="column dt-sc-one-fourth animate first" data-animation="fadeInDown" data-delay="100">
				        <div class="dt-sc-ico-content type1">
				            <div class="icon">
				                <img src="<?= get_template_directory_uri() ?>/images/newsetting.png" alt="setting" style="height:50px;"/>
				            </div>
				            <h4> <a href="#"> Global Alumni Connect  </a> </h4>
				            <p>Find mentors across the alumni networks that will evaluate and guide you: Getting a patent, validating your idea, testing the market, guiding growth strategy, funding and more. </p>
				        </div>
				    </div>
				    <div class="column dt-sc-one-fourth animate" data-animation="fadeInDown" data-delay="200">
				        <div class="dt-sc-ico-content type1">
				            <div class="icon">
				                <img src="<?= get_template_directory_uri() ?>/images/investors.png" alt="trophy" style="width:50px;"/>
				            </div>
				            <h4> <a href="#"> Innovation Platform across Campuses    </a> </h4>
				            <p>  Find the top innovations and startups from across the campuses and alumni to mentor and invest in. </p>
				        </div>
				    </div>
				    <div class="column dt-sc-one-fourth animate" data-animation="fadeInDown" data-delay="300">
				        <div class="dt-sc-ico-content type1">
				            <div class="icon">
				                <img src="<?= get_template_directory_uri() ?>/images/mentor.png" alt="plane" style="width:50px;"/>
				            </div>
				            <h4> <a href="#"> A Unique Innovation & Entrepreneurship Ecosystem</a> </h4>
				            <p>Search for patents in your area of innovation, similar business ventures in the market, like-minded talent to partner with, technical expertise and more.</p>
				        </div>
				    </div>
				    <div class="column dt-sc-one-fourth animate" data-animation="fadeInDown" data-delay="400">
				        <div class="dt-sc-ico-content type1">
				            <div class="icon">
				               <img src="<?= get_template_directory_uri() ?>/images/marketplace.png" alt="plane" style="width:43px;" />
				            </div>
				            <h4> <a href="#">A Marketplace of Resources</a> </h4>
				            <p>Leverage resources across the institutions alumni networks , partners, with the connects of a Venture Capital Fund

.</p>
				        </div>
				    </div>
				</div>
			</div> <!-- **Full-width-section - Ends** --> 
			<div class="dt-sc-hr-invisible"></div>
            
			<div class="full-width-section grey">
            	<div class="dt-sc-hr-invisible invisible_custum" ></div>
				<div class="container">
				<h2 class="aligncenter" style="color:#006b3b;">What People Say</h2>
                	<!-- **dt-sc-partner-carousel-wrapper - Starts** -->
					<div class="dt-sc-partner-carousel-wrapper">
                <ul class="dt-sc-partner-carousel">
                        	<li><a href="https://www.youtube.com/embed/2RoGNKwi7q0" target="_blank"><iframe width="212" src="https://www.youtube.com/embed/2RoGNKwi7q0" frameborder="0" allowfullscreen></iframe></a></li>
                           <li><a href="https://www.youtube.com/embed/qb6HEbCYEjU" target="_blank"><iframe width="212" src="https://www.youtube.com/embed/qb6HEbCYEjU" frameborder="0" allowfullscreen></iframe></a></li>
                           <li><a href="https://www.youtube.com/embed/qbEudOaLIN4" target="_blank"><iframe width="212" src="https://www.youtube.com/embed/qbEudOaLIN4" frameborder="0" allowfullscreen></iframe></a></li>
						     <li><a href="https://www.youtube.com/embed/AzTHquK01Lc" target="_blank"><iframe width="212" src="https://www.youtube.com/embed/AzTHquK01Lc" autoplay="false" frameborder="0" allowfullscreen></iframe></a></li>
						   
                         <!-- <li><a href="http://ivycamp.in/bp_upload/one-word.mp4" target="_blank"><iframe width="212" src="http://ivycamp.in/bp_upload/one-word.mp4" autoplay="false" frameborder="0" allowfullscreen></iframe></a></li>-->
						  
						  
						 
						  
						  
						  
						  
						  
                          <!--  <li><a href="https://www.youtube.com/embed/arUt4khitoY" target="_blank"><iframe width="212" src="https://www.youtube.com/embed/arUt4khitoY" frameborder="0" allowfullscreen></iframe></a></li> -->
                        </ul>
                    </div><!-- **dt-sc-partner-carousel-wrapper - Starts** -->
				</div>
                <div class="dt-sc-hr-invisible-small"></div>
			</div><!-- **Full-width-section - Ends** -->
			
	  
       		
            
            <!-- **Full-width-section - Starts** --> 
			<!--<div class="full-width-section grey1">
            <div class="dt-sc-margin100"></div> 
				<div class="container">
                    <div class="column dt-sc-one-third first fadeInUp" data-animation="fadeInUp" data-delay="100">
				        <div class="dt-sc-ico-content type8">
				            <div class="icon">
                                <i class="fa fa-3x fa-institution" style="color:#fff"></i>
				            </div>
				            <h4 class="f30"> <a href="#"> XXX</a> </h4>
				            <p> </p><h5> <a href="#"> No. of Institutes </a> </h5><p></p>
                            
				        </div>
				    </div>
                    
				    <div class="column dt-sc-one-third fadeInDown" data-animation="fadeInDown" data-delay="100">
				        <div class="dt-sc-ico-content type8">
				            <div class="icon">
                               <i class="fa fa-3x fa-rocket" style="color:#fff"></i>
				            </div>
				           
				            <h4 class="f30"> <a href="#"> XXX</a> </h4>
				            <p> </p><h5> <a href="#"> Startup </a> </h5><p></p>
				        </div>
				    </div>
                    
				    <div class="column dt-sc-one-third fadeInUp" data-animation="fadeInUp" data-delay="100">
				        <div class="dt-sc-ico-content type8">
				            <div class="icon">
                               <i class="fa fa-3x fa-graduation-cap" style="color:#fff"></i>
				            </div>
				           
				            <h4 class="f30">  <a href="#"> XXX</a> </h4>
				            <p> </p><h5> <a href="#"> Alumni </a> </h5><p></p>
				        </div>
				    </div>
				    
                    
                </div>
            	<div class="dt-sc-hr-invisible"></div>
            </div>-->
			
                        <!-- **Full-width-section - Ends** -->
           
			<!-- **Full-width-section - Starts** -->
			<!-- **Full-width-section - Ends** -->
            <div class="dt-sc-hr-invisible-small"></div>  
            
            <!-- **Full-width-section - Starts** -->
       		<div class="full-width-section">
            
            	<div class="container">
                	
                    <div class="column dt-sc-one-fourth first">
                        <div class="dt-sc-team-wrapper">
                            <h2>Meet Our Team</h2>
                            <p>The team collectively brings with them an experienced investment background, strong ties to the alumni community, experience working across educational institutions in India and the US, and a passion for growing our innovation and startup ecosystem.</p>
                        </div><!-- **dt-sc-team-carousel - Ends** -->
                    </div>
                    <div class="column dt-sc-three-fourth">
                        <!-- **dt-sc-team-carousel-wrapper - Starts** -->
                        <div class="dt-sc-team-carousel-wrapper">
                            <div class="dt-sc-team-carousel">
							
							<div class="column dt-sc-one-fourth">
                                    <!-- **dt-sc-team - Starts** -->
                                    <div class="dt-sc-team">
                                        <div class="image"><img src="<?= get_template_directory_uri() ?>/images/anju.jpg" alt="iamge"/></div>
                                        <!-- **team-details - Starts** -->
                                        <div class="team-details">
                                            <h6><a href="/anju-gupta/">Dr. Anju Gupta, Ph.D</a></h6>
                                            <p>IIT Delhi,  M.S & PhD California</p>
                                        </div> <!-- **team-details - Ends** -->
                                        <!-- **dt-sc-social-icons - Starts** -->																				<div style="clear:both; "></div>
                                        <ul class="dt-sc-social-icons">											
										<li> <a href="http://www.twitter.com/anju_ivycamp" target="_blank" title="twitter"> <span class="fa fa-twitter"></span>  </a> </li>
											<li> <a href="https://www.linkedin.com/profile/view?id=4968164&authType=NAME_SEARCH&authToken=X6HO&locale=en_US&srchid=49681641430066393168&srchindex=1&srchtotal=255&trk=vsrp_people_res_name&trkInfo=VSRPsearchId%3A49681641430066393168%2CVSRPtargetId%3A4968164%2CVSRPcmpt%3Aprimary%2CVSRPnm%3Aanju" target="_blank" title="linkedin"> <span class="fa fa-linkedin"></span>  </a> </li>
										
                                        </ul> <!-- **dt-sc-social-icons - Ends** -->
                                    </div><!-- **dt-sc-team - Ends** -->
                                </div>
							
							
							
                                <div class="column dt-sc-one-fourth">
                                    <!-- **dt-sc-team - Starts** -->
                                    <div class="dt-sc-team">
                                        <div class="image"><img src="<?= get_template_directory_uri() ?>/images/vikram.jpg" alt="iamge"/></div>
                                        <!-- **team-details - Starts** -->
                                        <div class="team-details">
                                            <h6><a href="/vikram-gupta">Mr. Vikram Gupta</a></h6>
                                            <p>IIT Delhi </p>
                                        </div> <!-- **team-details - Ends** -->
                                        <!-- **dt-sc-social-icons - Starts** -->
                                       <div style="clear:both; "></div>                                        <ul class="dt-sc-social-icons">											 <li> <a href="https://www.linkedin.com/profile/view?id=7130714&authType=NAME_SEARCH&authToken=Ee4Q&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2Cidx%3A1-1-1%2CtarId%3A1430066427528%2Ctas%3Avikram" target="_blank" title="linkedin"> <span class="fa fa-linkedin"></span>  </a> </li>                                           </ul> <!-- **dt-sc-social-icons - Ends** -->
                                    </div><!-- **dt-sc-team - Ends** -->
                                </div>
                                
                                <div class="column dt-sc-one-fourth">
                                    <!-- **dt-sc-team - Starts** -->
                                    <div class="dt-sc-team">
                                        <div class="image"><img src="<?= get_template_directory_uri() ?>/images/shirish.jpg" alt="iamge"/></div>
                                        <!-- **team-details - Starts** -->
                                        <div class="team-details">
                                            <h6><a href="/shirish-potnis/">Mr. Shirish Potnis</a></h6>
                                            <p>IIT Bombay, IIM Calcutta </p>
                                        </div> <!-- **team-details - Ends** -->
                                        <!-- **dt-sc-social-icons - Starts** -->
                                      <div style="clear:both; "></div>                                     
                                    </div><!-- **dt-sc-team - Ends** -->
                                </div>
                                
                                 
                                
                                 <div class="column dt-sc-one-fourth">
                                    <!-- **dt-sc-team - Starts** -->
                                    <div class="dt-sc-team">
                                        <div class="image"><img src="<?= get_template_directory_uri() ?>/images/norbert.jpg" alt="iamge"/></div>
                                        <!-- **team-details - Starts** -->
                                        <div class="team-details">
                                            <h6><a href="/norbert-fernandes/">Norbert Fernandes</a></h6>
                                            <p> IIT Kanpur, IIM Calcutta</p>
                                        </div> <!-- **team-details - Ends** -->
                                        <!-- **dt-sc-social-icons - Starts** -->
                                       <div style="clear:both; "></div>                                        <ul class="dt-sc-social-icons">											<li> <a href="https://www.linkedin.com/profile/view?id=4383269&authType=NAME_SEARCH&authToken=aX3b&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2Cidx%3A1-1-1%2CtarId%3A1430066463983%2Ctas%3Anorbert" target="_blank" title="linkedin"> <span class="fa fa-linkedin"></span>  </a> </li>                                        </ul> <!-- **dt-sc-social-icons - Ends** -->
                                    </div><!-- **dt-sc-team - Ends** -->
                                </div>
                                
                                <div class="column dt-sc-one-fourth">
                                    <!-- **dt-sc-team - Starts** -->
                                    <div class="dt-sc-team">
                                        <div class="image"><img src="<?= get_template_directory_uri() ?>/images/ashish.jpg" alt="iamge"/></div>
                                        <!-- **team-details - Starts** -->
                                        <div class="team-details">
                                            <h6><a href="/ashish-wadhwani/">Ashish Wadhwani</a></h6>
                                            <p>IIT Delhi, IIM Ahmedabad</p>
                                        </div> <!-- **team-details - Ends** -->
                                        <!-- **dt-sc-social-icons - Starts** -->
                                       <div style="clear:both; "></div>                                       
                                    </div><!-- **dt-sc-team - Ends** -->
                                </div>
                                
                                
                                <div class="column dt-sc-one-fourth">
                                    <!-- **dt-sc-team - Starts** -->
                                    <div class="dt-sc-team">
                                        <div class="image"><img src="<?= get_template_directory_uri() ?>/images/prayag.jpg" alt="iamge"/></div>
                                        <!-- **team-details - Starts** -->
                                        <div class="team-details">
                                            <h6><a href="/prayag-mohanty/">Prayag Mohanty</a></h6>
                                            <p>PGDM XIM</p>
                                        </div> <!-- **team-details - Ends** -->
                                        <!-- **dt-sc-social-icons - Starts** -->
                                      <div style="clear:both; "></div>                                        <ul class="dt-sc-social-icons">											<li> <a href="https://www.linkedin.com/profile/view?id=55856791&authType=NAME_SEARCH&authToken=tLod&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2Cidx%3A1-1-1%2CtarId%3A1430066502575%2Ctas%3Aprayag" target="_blank" title="linkedin"> <span class="fa fa-linkedin"></span>  </a> </li>                                               </ul> <!-- **dt-sc-social-icons - Ends** -->
                                    </div><!-- **dt-sc-team - Ends** -->
                                </div>
                                
                               
                                
                                <div class="column dt-sc-one-fourth">
                                    <!-- **dt-sc-team - Starts** -->
                                    <div class="dt-sc-team">
                                        <div class="image"><img src="<?= get_template_directory_uri() ?>/images/sonias.jpg" alt="iamge"/></div>
                                        <!-- **team-details - Starts** -->
                                        <div class="team-details">
                                            <h6><a href="/sonia-sharma/">Sonia Sharma</a></h6>
                                            <p>IMT Ghaziabad</p>
                                        </div> <!-- **team-details - Ends** -->
                                        <!-- **dt-sc-social-icons - Starts** -->
                                        <div style="clear:both; "></div>                                       
                                    </div><!-- **dt-sc-team - Ends** -->
                                </div> 
									
								
                        
                            </div>
                                    
                            <div class="carousel-arrows">
                                <a class="prev" href="#"><span class="fa fa-angle-left"></span> </a>
                                <a class="next" href="#"><span class="fa fa-angle-right"></span> </a>
                            </div>
                        
                        </div><!-- **dt-sc-team-carousel-wrapper - Ends** -->
                    </div>
                	<div class="dt-sc-margin45"></div>
                </div>
            </div><!-- **Full-width-section - Ends** -->
        </span>						
<?php get_footer(); ?>