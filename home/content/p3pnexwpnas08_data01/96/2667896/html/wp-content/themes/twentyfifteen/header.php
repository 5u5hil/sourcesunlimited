<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

    <head>

        <?php wp_head(); ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Ivy Camp Ventures</title>

        <meta name="description" content="" />
        <meta name="author" content="Infini Systems" />

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="<?= get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

        <!-- **CSS - stylesheets** -->
        <link id="default-css" rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css" type="text/css" media="all" />
        <link id="shortcodes-css" rel="stylesheet" href="<?= get_template_directory_uri(); ?>/shortcodes.css" type="text/css" media="all"/>
        <link id="skin-css" rel="stylesheet" href="<?= get_template_directory_uri(); ?>/skins/green/style.css" type="text/css" media="all"/>
        <link id="layer-slider" rel="stylesheet"  href="<?= get_template_directory_uri(); ?>/css/layerslider.css" media="all" />

        <!-- **Additional - stylesheets** -->
        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/responsive.css" type="text/css" media="all"/>
        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/meanmenu.css" type="text/css" media="all"/>
        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/prettyPhoto.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/animations.css" type="text/css" media="all" />

        <!-- **Font Awesome** -->
        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/font-awesome.min.css" type="text/css" />

        <!-- **Google - Fonts** -->
        <!--  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />  
          <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' /> -->
        <script>

            add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
            function special_nav_class($classes, $item) {
                // alert('dsgsdgsdg');
                if (in_array('current-menu-item', $classes)) {
                    $classes[] = 'active ';
                }
                return $classes;
            }
        </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52669715-20', 'auto');
  ga('send', 'pageview');

</script>



    </head>

    <body>
        <div class="loader-wrapper">
            <div id="loader-image"></div>
        </div>
        <!-- **Wrapper** -->
        <div class="wrapper"> 
            <div class="inner-wrapper">


                <div class="top-bar">
                    <!-- **container - Starts** -->
                    <div class="container">
                        <!-- **top-menu - Starts** -->	

                        <!-- **top-right - Starts** -->
                        <div class="top-right">

<!--                    <span class="cursor_pointer"> <a href="/student-think-tank/" style="font-weight:bold;">Student Think Tank </a> </span> | -->

                            <?php
                            if (is_user_logged_in()) {
                                $current_user = wp_get_current_user();
                                $args = array('offset' => 0, 'post_type' => get_user_meta($current_user->ID, "entity", true), 'author' => $current_user->ID);

                                $the_query = new WP_Query($args);

                                $post = $the_query->post;
//var_dump($post); 
                                $post_status = $post->post_status;  // die;

                                $current_user->entity;

                                if ($post_status == 'publish') {
                                    ?>
                                    <a class="" href="/<?php echo $current_user->entity . '-dashboard'; ?>"/> Hi,&nbsp; <?= wp_get_current_user()->user_firstname ?> </a>

                                    <span class="cursor_pointer"> <a href="/logout/">Logout</a> </span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="cursor_pointer"> <a href="/login/"><strong>Login</strong></a> </span> |
                                    <span class="cursor_pointer"> <a href="/common-registration/"><strong>Register</strong></a> </span> |
                                <?php
                                }
                            } else {
                                ?>
                                <span class="cursor_pointer"> <a href="/login/"><strong>Login</strong></a> </span> |
                                <span class="cursor_pointer"> <a href="/common-registration/"><strong>Register</strong></a> </span> |

                                <?php
                            }
                            ?> <span class="cursor_pointer"> <a href="/about-us/"><strong>About</strong></a> </span>

                            <ul class="dt-sc-social-icons">
                                <li> <a href="https://www.facebook.com/IvyCampChallenge" target="_blank" title="facebook"> <i class="fa fa-facebook"></i>  </a> </li>
                                <li> <a href="https://twitter.com/IvyCampOfficial" target="_blank"  title="twitter"> <i class="fa fa-twitter"></i>  </a> </li>
                               <!-- <li> <a href="http://www.linkedin.com/groups?home=&gid=669066" target="_blank"  title="Linkedin"> <i class="fa fa-linkedin"></i>  </a> </li>-->
                                <li> <a href="https://www.linkedin.com/grp/home?gid=6690662&sort=POPULAR" target="_blank"  title="Linkedin"> <i class="fa fa-linkedin"></i>  </a> </li>
                                <li> <a href="https://www.youtube.com/channel/UCMhm7lGIygsJ6RAWwrLgeuA/feed" target="_blank"  title="youtube"> <i class="fa fa-youtube"></i>  </a> </li>
                            </ul>
                        </div> <!-- **top-right - End** -->

                    </div> <!-- **container - End** -->
                </div> <!-- **Top Bar - End** -->

                <div id="header-wrapper">
                    <!-- **Header** -->
                    <header class="header header2">
                        <div class="container">

                            <!-- **Logo - End** -->
                            <div id="logo">
                                <a href="http://ivycamp.in" title="Priority"> <img src="<?= get_template_directory_uri(); ?>/images/logo.png" alt="image"/> </a>
                            </div><!-- **Logo - End** -->

                            <div id="menu-container">
                                <!-- **Nav - Starts**-->
                                <nav id="main-menu">
                                    <div id="dt-menu-toggle" class="dt-menu-toggle">
                                        Menu
                                        <span class="dt-menu-toggle-icon"></span>
                                    </div>
                                    <?php
                                    if ($_SERVER["REQUEST_URI"] == '/incubator-dashboard/' ||$_SERVER["REQUEST_URI"] == '/startup-dashboard/' || $_SERVER["REQUEST_URI"] == '/innovator-dashboard/' || $_SERVER["REQUEST_URI"] == '/investor-dashboard/' || $_SERVER["REQUEST_URI"] == '/mentor-dashboard/' || $_SERVER["REQUEST_URI"] == '/corporate-dashboard/' || $_SERVER["REQUEST_URI"] == '/institute-dashboard/' ||
                                          $_SERVER["REQUEST_URI"] == '/incubator-listing/' ||  $_SERVER["REQUEST_URI"] == '/startup-listing/' || $_SERVER["REQUEST_URI"] == '/innovator-listing/' || $_SERVER["REQUEST_URI"] == '/investor-listing/' || $_SERVER["REQUEST_URI"] == '/mentor-listing/' || $_SERVER["REQUEST_URI"] == '/corporate-listing/' || $_SERVER["REQUEST_URI"] == '/institute-listing/' || $_GET["id"] == 'post_details' || $_SERVER["REQUEST_URI"] == '/edit-profile/' || $_SERVER["REQUEST_URI"] == '/edit-innovator/' || $_SERVER["REQUEST_URI"] == '/edit-investor/' || $_SERVER["REQUEST_URI"] == '/edit-mentor/' || $_SERVER["REQUEST_URI"] == '/edit-incubator/' || $_SERVER["REQUEST_URI"] == '/questions-asked/') {
                                        ?>
<?php } else { ?>
                                        <ul class="menu">
                                               <!--   <li class="menu-item-simple-parent <?php echo ($_SERVER["REQUEST_URI"] == '/') ? 'current_page_item' : '' ?>"><a href="../"><i class="fa fa-home"></i>Home</a> </li> -->
                                            <li class="menu-item-simple-parent startactive <?php echo ($_SERVER["REQUEST_URI"] == '/startup/' || $_SERVER["REQUEST_URI"] == '/startup-signup/' ) ? 'current_page_item' : '' ?>"><a href="/startup/"><i class="fa fa-rocket"></i>Startups</a> </li>
                                            <li class="menu-item-simple-parent startactive <?php echo ($_SERVER["REQUEST_URI"] == '/innovators/' || $_SERVER["REQUEST_URI"] == '/innovators-signup/') ? 'current_page_item' : '' ?>"><a href="/innovators/"><i class="fa fa-institution"></i>Innovators</a> </li>
                                            <li class="menu-item-simple-parent <?php echo ($_SERVER["REQUEST_URI"] == '/incubator/') ? 'current_page_item' : '' ?>"><a href="/incubator/"><i class="fa fa-cloud"></i>Incubators</a> </li>
                                            <li class="menu-item-simple-parent <?php echo ($_SERVER["REQUEST_URI"] == '/investors/' || $_SERVER["REQUEST_URI"] == '/investor-signup/') ? 'current_page_item' : '' ?>"><a href="/investors/"><i class="fa fa-user"></i>Investors</a> </li>
                                            <li class="menu-item-simple-parent <?php echo ($_SERVER["REQUEST_URI"] == '/mentors/' || $_SERVER["REQUEST_URI"] == '/mentor-signup/') ? 'current_page_item' : '' ?>"><a href="/mentors/"><i class="fa fa-users"></i>Mentors</a> </li>
                                            <li class="menu-item-simple-parent <?php echo ($_SERVER["REQUEST_URI"] == '/corporates/' || $_SERVER["REQUEST_URI"] == '/corporate-signup/') ? 'current_page_item' : '' ?>"><a href="/corporates/"><i class="fa fa-briefcase"></i>Corporates</a> </li>
                                            <li class="menu-item-simple-parent <?php echo ($_SERVER["REQUEST_URI"] == '/institutes/' || $_SERVER["REQUEST_URI"] == '/institute-signup/' || $_SERVER["REQUEST_URI"] == '/institute-save/') ? 'current_page_item' : '' ?>"><a href="/institutes/"><i class="fa fa-institution"></i>Institutes</a> </li>

                                        </ul>
<?php } ?>
                                </nav>
                                <!-- **Nav - End**-->
                            </div>

                        </div>
                    </header><!-- **Header - End** -->
                </div>



                <!-- **Main - Starts** --> 
                <div id="main">