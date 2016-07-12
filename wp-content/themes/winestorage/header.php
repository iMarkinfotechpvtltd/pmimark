<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css">

    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300|Open+Sans:400italic,400,600,700">
    
    
	<script>
              /*  jQuery(document).ready(function(fadeLoop) {
                 
                 var fad = jQuery('.fader');
                 var counter = 0;
                 var divs = jQuery('.fader').hide(); // Selecting fader divs instead of each by name.
                 var dur = 1000;
                 
                 fad.children().filter('.fader').each(function(fad) {
                   
                   function animator(currentItem) {
                     
                     animator(fad.children(":first"));
                     
                     fad.mouseenter(function(){
                      jQuery(".fader").stop(); 
                     });
                     fad.mouseleave(function(){
                       animator(fad.children(":first"));
                     });
                   };
                   
                 });
                 
                 function showDiv() {
                   divs.fadeOut(dur) // hide all divs
                   .filter(function(index) {
                     return index == counter % divs.length;
                   }) // figure out correct div to show
                   .delay(dur) // delay until fadeout is finished
                   .fadeIn(dur); // and show it
                   counter++;
                 }; // function to loop through divs and show correct div
                 
                 showDiv(); // show first div    
                 
                 return setInterval(function() {  // return interval so we can stop the loop
                   showDiv(); // show next div
                 }, 30 * 2000); // do this every 5 seconds    
               }); */
            </script>
<link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">	
</head>

<body <?php body_class(); ?>>
<header class="inner-header wineBanner">
<?php $image = get_field('banner_image'); ?>
  <?php if($image!='') 
	  {
		  $image = $image;
	  }else{
		if ( function_exists( 'ot_get_option' ) ) {
			$image = ot_get_option( 'banner_image' );
		}	 
	}	
	?>
  <img class="wine-img" src="<?php echo $image; ?>" alt="" />
  <div class="inner-head1">
    <div class="blackBar">
      <div class="container">
        <div class="row">
		<?php
		if ( function_exists( 'ot_get_option' ) ) {
			$logo = ot_get_option( 'website_logo' );
			$phoneNumber = ot_get_option( 'phone_number' );
		}
		?>
          <div class="col-sm-12 col-md-3"> 
            <!--Logo-->
            <div class="logo"><a href="<?php echo get_option('home'); ?>"><img src="<?php echo $logo; ?>" alt="" /></a></div>
          </div>
          <div class="col-sm-12 col-md-9"> 
            <!--Contact-->
            <div class="contact1 pull-right">
              <p><img src="<?php echo get_template_directory_uri(); ?>/images/call.png" alt="" /><a href="tel:<?php echo $phoneNumber; ?>" class="h-tel"><?php echo $phoneNumber; ?></a></p>
              <a href="http://griffincentre.imarkclients.com/contact-us" target="_blank" class="orangeBtn">CONTACT US</a> <a target="_blank" href="https://www.smdservers.net/SLWebSiteTemplate_V2/login.aspx?sCorpCode=dtMmhruqRDorfYZYRbWXNw==&sLocationCode=F3e81MY3f4IcaovtqM7F3w==&1=1" class="defaultBtn">LOGIN</a> </div>
            <!--Navigation-->
            <div class="inner-nav" id='cssmenu'>
             <?php
			$defaults = array(
				'theme_location'  => '',
				'menu'            => 'Main Menu',
				'container'       => 'div',
				'container_class' => 'inner-nav',
				'container_id'    => 'cssmenu',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			);

			wp_nav_menu( $defaults );
			
			?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container header-btn"> 
    <h1>The Right Way to Age Wine</h1>
    <a href="javascript:;" class="defaultBtn vid" data-toggle="modal" data-target="#videoModal"><i class="fa fa-play"></i> WATCH VIDEO</a><br />
    <a href="https://www.smdservers.net/SLWebSiteTemplate_V2/ReserveOnly.aspx?sCorpCode=dtMmhruqRDorfYZYRbWXNw==&sLocationCode=F3e81MY3f4IcaovtqM7F3w==&1=1" target="_blank" class="redBtn">RESERVE NOW</a> </div>
  </div>
  <!-- Video Modal -->
  
<div id="videoModal" class="modal fade video-model" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close-video" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Video</h4>
      </div>
 		
		<div class="modal-body">
		<?php  
		 $uploaded_video = get_field('upload_video'); 
		 $youtube_video_url = get_field('youtube_video_url');
		 if($youtube_video_url!='')
		 {
			 $video_url = $youtube_video_url;
		 }else{
			 
			  $video_url = $uploaded_video['url'];
			 
		 }	 
		if($video_url != '') { ?>
		<iframe width="640" height="360" src="<?php echo $video_url  ?>" frameborder="0" allowfullscreen></iframe>
		 <?php }else{ ?>
		 <div style="height:300px;text-align:center;padding-top:60px">
			<h2>Coming Soon</h2>
		</div>	
		<?php } ?>	
		</div>
		  
    </div>
  </div>
</div>
 
</header>
