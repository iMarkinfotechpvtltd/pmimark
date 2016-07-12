<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<!--Footer-->
<footer>
<!-- Pop for Map -->
			   <div id="myModal" class="modal fade map_pop" role="dialog">
			  <div class="modal-dialog">
				
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Location</h4>
				  </div>
				  <div class="modal-body">
				    <?php
					/* if ( function_exists( 'ot_get_option' ) ) {
						$mapUrl = ot_get_option( 'google_map_location_url' );
						
					} */
				   ?>
				   <div id="map-canvas"></div>			
				  </div>
				
				</div>

			  </div>
			</div>
    <!-- End Popup For map -->
	<!-- Illustrated Map -->
			   <div id="illusModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
				
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Map</h4>
				  </div>
				  <div class="modal-body">
				    <?php
					if ( function_exists( 'ot_get_option' ) ) {
						$mapUrl = ot_get_option( 'illustrated_map_image' );
					}
				   ?>
				  <img src="<?php echo $mapUrl ?>" />
				  </div>
				
				</div>

			  </div>
			</div>
    <!-- End Popup For map -->
  <div class="footerTop">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 menu1">
          <h2>Contact Us</h2>
          <hr class="line_yellow" />
           <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		   <?php endif; ?>
          <div class="map_drc"><a class="space" href="javascript:;" data-toggle="modal" data-target="#myModal">Map / Directions</a> <a class="pull-right direction-img" href="javascript:;" data-toggle="modal" data-target="#myModal"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-01.png" alt="" class="pull-right" /></a></div>
          <div class="illustrated_map"><a class="space" href="javascript:;" data-toggle="modal" data-target="#illusModal">Illustrated Map</a> <a class="pull-right illustration-img" href="javascript:;" data-toggle="modal" data-target="#illusModal"><img src="<?php echo get_template_directory_uri(); ?>/images/map.png" alt="" class="pull-right" /></a></div>
           <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		   <?php endif; ?> 
        </div>
        <div class="col-sm-4 menu2">
          <h2>What We Offer</h2>
          <hr class="line_yellow" />
          <ul>
            <?php
			$defaults2 = array(
			'theme_location'  => '',
			'menu'            => 'What We Offer',
			'container'       => '',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '%3$s',
			'depth'           => 0,
			'walker'          => ''
			);

			wp_nav_menu( $defaults2 );
			?>  
          </ul>
        </div>
        <div class="col-sm-4 menu3">
          <h2>About Griffin Business Centre</h2>
          <hr class="line_yellow" />
          <ul>
            <?php
			$defaults2 = array(
			'theme_location'  => '',
			'menu'            => 'About Griffin Centre',
			'container'       => '',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '%3$s',
			'depth'           => 0,
			'walker'          => ''
			);

			wp_nav_menu( $defaults2 );
			?>  
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footerBottom">
    <p>Griffin  business Centre</p>
    <div class="f-social">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footersocial') ) : ?>
		<?php endif; ?>
    </div>
	
  </div>
  
  
 <!-- Free Pdf Modal -->
<div id="freeModal" class="modal fade tips-winestorage" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close-quote" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">The 10 things you need to know to age wine correctly  </h4>
      </div> 
 		<form class="form-horizontal" id="pdf_form"  method="post">
		<div class="modal-body">
			    <div class="form-group">
					<label for="input_name" class="control-label col-md-3">Name</label>
					<div class="col-md-9">
						<input type="text" class="form-control" id="username" name="username" placeholder="Name:*">
					</div>
				</div>
				<div class="form-group">
					<label for="input_email" class="control-label col-md-3">Email</label>
					<div class="col-md-9">
						<input type="email" class="form-control" id="uemail" name="uemail" placeholder="Email:*">
					</div>
				</div>
				
				<div class="form-group">
					<label for="input_email" class="control-label col-md-3">Number</label>
					<div class="col-md-9">
						<input type="text" class="form-control" id="unumber" name="unumber" placeholder="Number:">
					</div>
				</div>
				<input type="hidden" name="formType" value="pdf" />
				<span>*Required</span>
			</div>
		  <div class="modal-footer">
		      <span id="processMsg" class="processMsg" style="display:none"><img src="<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif"></span>
			 <input class="btn btn-success" type="submit" value="Send" id="submit">
		</div>
		  <div id="thanksmsg" class="thankpdf"></div>
	
	   </form>

    </div>

  </div>
</div>

<!--Get Quote Model-->
<!-- Modal -->
<div id="quoteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close close-pdf" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Get a Quote</h4>
      </div>
     
		<form class="form-horizontal" id="quote_form"  method="post">
	   
		<div class="modal-body">
			
			
			    <div class="form-group">
					<label for="input_name" class="control-label col-md-3">Name</label>
					<div class="col-md-9">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name">
					</div>
				</div>
			
				<div class="form-group">
					<label for="input_email" class="control-label col-md-3">Your Email</label>
					<div class="col-md-9">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="input_email" class="control-label col-md-3">Phone</label>
					<div class="col-md-9">
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
					</div>
				</div>
				<div class="form-group">
					<label for="input_message" class="control-label col-md-3">Additional Information</label>
					<div class="col-md-9">
						<textarea name="message" class="input-xlarge form-control"></textarea>
					</div>
				</div>
				<input type="hidden" name="formType" value="quote" />
			</div>
			
		
		  <div class="modal-footer">
		      <span id="processMsg" class="processMsg" style="display:none"><img src="<?php echo get_template_directory_uri() ?>/images/ajax-loader.gif"></span>
			 <input class="btn btn-success" type="submit" value="Send" id="submit">
			 
		  </div>
		  <div id="thanks" class="thankquote"></div>
	
	</form>
    
    
    </div>

  </div>
</div> 
  
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=true"></script>
<!-- Latest compiled and minified JavaScript --> 
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script> 
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/allfunctions.js"></script>
<script>
jQuery(window).load(function()
{
	if(jQuery('.avail_units')[0])
	{
	 jQuery('html, body').animate({
			scrollTop: jQuery(".avail_units").offset().top
		}, 1000);
	}	
});
jQuery(document).ready(function () { 
    /* jQuery("input#submit").click(function(){ 
        jQuery.ajax({
            type: "POST",
            url: "<?php site_url() ?>/get_quote.php", //process to mail
            data: jQuery('form.contact').serialize(),
            success: function(msg){
                jQuery("#thanks").html(msg) //hide button and show thank you
                jQuery("#form-content").modal('hide'); //hide popup  
            },
            error: function(){
                alert("failure");
            }
        });
    });  */
	jQuery('.textwidget').attr('class', '');
	jQuery('.close-video').click(function(){     
       
		 jQuery('.video-model iframe').attr('src', jQuery('iframe').attr('src'));
    });
	
	 jQuery("#quote_form").validate({
        rules: {
            email: {
                required: true,
				               
            },
			phone: {
                required: true,
				number: true,
				 minlength: 10
				               
            },
            name: "required"
        },
        messages: {
            email: {
                required: "Please provide your email",
               
            },
			phone: {
                required: "Please provide your phone number",
               
            },
            name: "Please provide your name"
        },
		submitHandler: function(form) {
		jQuery(".processMsg").show();		
		var strURL= "<?php echo site_url() ?>/get_quote.php";			
		jQuery.ajax({
			 data: jQuery("#quote_form").serialize(),
			 type: 'post',
			 url: strURL,
			 success: function(msg){ 
				jQuery(".processMsg").hide();
				jQuery(".thankquote").html(msg).fadeIn('slow');
                jQuery(".thankquote").html(msg).delay(4000).fadeOut(); //hide button and show thank you
                jQuery("#form-content").modal('hide'); //hide popup  
				jQuery('#quote_form')[0].reset();
				
				},
				error: function(){
					alert("failure");
				}
		});
		}
    });
	
	/* Free Pdf Form */
	
	 jQuery("#pdf_form").validate({
        rules: {
            uemail: {
                required: true,
				               
            },
			unumber: {
               	number: true,
				minlength : 9,
				maxlength : 15, 
				               
            },
			username: "required"
        },
        messages: {
            uemail: {
                required: "Please provide your email",
               
            },
			unumber: {
                required: "Please provide your phone number",
				               
            },
		    username: "Please provide your name"
        },
		submitHandler: function(form) {
		jQuery(".processMsg").show();		
		var strURL= "<?php echo site_url() ?>/get_quote.php";			
		jQuery.ajax({
			 data: jQuery("#pdf_form").serialize(),
			 type: 'post',
			 url: strURL,
			 success: function(msg){ 
			    jQuery(".processMsg").hide();
				jQuery(".thankpdf").html(msg).fadeIn('slow');
                jQuery(".thankpdf").html(msg).delay(4000).fadeOut(); //hide button and show thank you
                jQuery("#form-content").modal('hide'); //hide popup  
				jQuery('#pdf_form')[0].reset();
				},
				error: function(){
					alert("failure");
				}
		});
		}
    });
	
	/* Close Quote and PDF Form */
	jQuery(".close-quote").click(function()
	{ 
		jQuery('label.error').hide();
		jQuery('#quote_form').trigger('reset');
	
	});
	
	jQuery(".close-pdf").click(function()
	{ 
		jQuery('label.error').hide();
		jQuery('#pdf_form').trigger('reset');
	
	});
	
	// Testimonial Slider
	jQuery('.carousel').carousel({
	  interval: 30000,
	  pause: false
	})
	
	
	
});
</script>

<?php wp_footer(); ?>

</body>
</html>
