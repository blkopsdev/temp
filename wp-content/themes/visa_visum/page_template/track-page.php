<?php
/**
 * Template Name: Track Page
 * The template for displaying pages
 *
 * @package Total WordPress Theme
 * @subpackage Templates
 * @version 4.3
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>
<div id="content-wrap" class="container clr">
	<div id="primary" class="content-area clr">
		<div id="content" class="site-content clr">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php wpex_get_template_part( 'page_single_blocks' ); ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
<script type="text/javascript">
	jQuery( document ).ready(function($) {
	    $('.matlasTrack .msubmit').on("click", function(event){
	    	event.preventDefault();
	    	let trackid = $('.matlasTrack .tracknumber').val();
	    	if(trackid != ''){
			  	jQuery.ajax({
					url: myAjax.ajax_url,
					//dataType : "json",
					data : {
						action : 'matlastrack',
						trackid : trackid,
					},
					success: function(result){
						if(result){
							$('.matlasTrack .message').html(result); 
						}					
					}
				});
			}else{
				alert('.');
			}
		}); 
	});
</script>