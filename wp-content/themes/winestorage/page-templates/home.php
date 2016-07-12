<?php
/**
 * Template Name: home
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php get_header(); ?>
<!--Block One-->
<section class="wine_storage">
  <div class="container">
    <div class="row">
  	<div class="wine_icons">
   <?php echo do_shortcode('[mainmenu-short]'); ?> 
    </div>
  
    <h1 class="title"><?php echo $wine_storage_title = get_field('wine_storage_title'); ?></h1>
    <hr class="line" /> 
    <div class="clear"></div>
    <div class="col-sm-7">
    <p><?php echo $wine_storage_content = get_field('wine_storage_content'); ?> </p>
    <h2><?php echo $climate_control_title = get_field('climate_control_title'); ?> </h2>
    <?php echo $climate_control_content = get_field('climate_control_content'); ?>
    <h2><?php echo $amenities_title = get_field('amenities_title'); ?></h2>
    <?php echo $amenities_content = get_field('amenities_content'); ?>
    </div>
    <div class="col-sm-5 pull-right home-right">
        <a class="cta" data-toggle="modal" data-target="#freeModal"><img src="http://winestorag.imarkclients.com/wp-content/themes/winestorage/images/wine-cta.jpg" alt="" /></a>
        <br>
        <br><br>
        <img alt="" src="<?php echo $image_right_side = get_field('image_right_side'); ?>">
        
        </div>
        
    </div>
  </div>
</section>

<!--Testimonials-->
<?php
if ( function_exists( 'ot_get_option' ) ) {
	$testimonial_Title = ot_get_option( 'testimonial_title' );
}
?>
<section class="h-testimonials">
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="header"><?php echo $testimonial_Title; ?></div>
		<div class="bxslider"> 
        <?php echo do_shortcode('[testimonial-short]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>  