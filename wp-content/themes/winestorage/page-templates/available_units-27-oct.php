<?php
/**
 * Template Name: Available Units
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?> 
<?php get_header(); ?>
<!--Block One-->
<section class="avail_units wine_storage">
  <div class="container">
    <div class="wine_icons">
		<?php echo do_shortcode('[mainmenu-short]'); ?> 
    </div>
      
      
     <h1 class="title"><?php the_title(); ?></h1>
	  <hr class="line" />
      <div class="clear"></div>
	   <div class="avail-iframe"><iframe width="1000" height="700" src="https://www.smdservers.net/SLWebSiteTemplate_V2/ShowUnitsTypeStdTable.aspx?sCorpCode=dtMmhruqRDorfYZYRbWXNw==&sLocationCode=F3e81MY3f4IcaovtqM7F3w==&Type=3"></iframe>
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