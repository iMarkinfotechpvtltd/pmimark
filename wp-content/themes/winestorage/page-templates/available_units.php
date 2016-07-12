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
      
	    <div class="avail-iframe">
            <?php echo get_field('available_unit_content'); ?>
            
		<?php
			global $post;
			$type = 'winestorageunits';
			$args=array(
			  'post_type' => $type,
			  'post_status' => 'publish',
			  'posts_per_page' => -1,
			  'caller_get_posts'=> 1,
			  'orderby'=> 'ID',
			  'order' => 'ASC'
			  );
			echo '<table>';

			echo '<tr><th>Locker Type</th><th>Capacity (estimated)</th></tr>';
			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
		  while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<tr>
				<td><?php the_title(); ?></td>
				<td><?php echo get_field('locker_capacity'); ?></td>
			</tr>
			<?php
		  endwhile;
		}
		wp_reset_query(); 
		?>

			 
			</table>
			   
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