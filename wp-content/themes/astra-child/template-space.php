<?php

/**
 * Template Name: Space Landing Page
 */

if (!defined("ABSPATH")) {
    exit(); // Exit if accessed directly.
} ?>

<!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo("charset"); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (apply_filters("astra_header_profile_gmpg_link", true)) { ?>
	 <link rel="profile" href="https://gmpg.org/xfn/11"> 
	 <?php } ?>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="<?php echo esc_attr(
     astra_default_strings("string-header-skip-link", false)
 ); ?>">
		<?php echo esc_html(astra_default_strings("string-header-skip-link", false)); ?>
</a>

<div
<?php echo astra_attr("site", ["id" => "page", "class" => "hfeed site"]); ?>
>
	

		<script>
		jQuery(document).ready(function($){
$('.enquire-now-button').on('click',function(){
    $('.modal-body').load('https://parasolprojects.com/modal/enquire/',function(){
        $('#enquire-modal').modal({show:true});
    });
});
			});
</script>

		<div id="enquire-modal" class="modal" tabindex="-1"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button class="close" type="button" data-dismiss="modal">×</button> </div>
					<?php if ( have_rows( 'address' ) ) : ?>
	<?php while ( have_rows( 'address' ) ) : the_row(); ?>
			<div class="copy-block">
			<div>
			<p id="space-address"><?php the_sub_field( 'address_1' ); ?>, <?php the_sub_field( 'city' ); ?>, <?php the_sub_field( 'state' ); ?>, <?php the_sub_field( 'zip' ); ?></p>
			</div>
				<div>
<button class="copy-btn" onclick="copyContent()"><i class="fa-solid fa-copy"></i></button>
					</div>
			</div>

<script>
  let text = document.getElementById('space-address').innerHTML;
  const copyContent = async () => {
    try {
      await navigator.clipboard.writeText(text);
      console.log('Content copied to clipboard');
    } catch (err) {
      console.error('Failed to copy: ', err);
    }
  }
</script>
	<?php endwhile; ?>
<?php endif; ?>
			<div class="modal-body">
			</div></div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->
		<script>
		jQuery(document).ready(function($){
$('.newsletter-button').on('click',function(){
    $('.newsletter-modal-body').load('/modal/newsletter/',function(){
        $('#footer-modal').modal({show:true});
    });
});
			});
</script>
<div id="footer-modal" class="modal" tabindex="-1"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button class="close" type="button" data-dismiss="modal">×</button> </div>
<div class="newsletter-modal-body">
			</div>
	</div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->
	<?php
 astra_header_before();
 astra_header();
 astra_header_after();
 astra_content_before();
 ?>
	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>

<?php if (astra_page_layout() == "left-sidebar"): ?>
<div class="space-search collapse" id="collapseSearch"><?php echo do_shortcode(
    '[searchandfilter id="11919" ]'
); ?>
	
<div class="sidebar-block-green">
	<?php if ( have_rows( 'get_in_touch_box' ) ) : ?>
	<?php while ( have_rows( 'get_in_touch_box' ) ) : the_row(); ?>
			<div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-7">
					<p><?php the_sub_field( 'title' ); ?></p>
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button enquire-now-button" href="#enquire-modal" data-toggle="modal"><?php the_sub_field( 'button_text' ); ?></a></div>
</div>
		<?php endwhile; ?>
<?php endif; ?>
		</div>
</div>
<div class="wp-block-button">
<a class="visible-xs search-toggle wp-block-button__link has-text-align-center wp-element-button collapsed" data-toggle="collapse" href="#collapseSearch" role="button" aria-expanded="false" aria-controls="collapseSearch">&nbsp;Search Menu</a>
</div>

<?php endif; ?>

	<div id="primary" class="space-search-container <?php astra_primary_class(); ?>">
		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

			  <div class="wrapper grid-lg" id="wrapper">
				  <?php echo do_shortcode(
    '[searchandfilter id="25182" action="filter_next_query"]'
); ?>
			<?php echo do_shortcode('[custom-layout id="11536"]'); ?>
				  	<div class="spacesmap" ><?php echo do_shortcode( "[put_wpgm id=3]" ); ?>
			</div>
		</div>
		
<?php if (astra_page_layout() == "right-sidebar"): ?>

	<?php get_sidebar(); ?>

<?php endif; ?>
</div>

<div class="space-container">
		<div class="wp-block-columns is-layout-flex wp-container-8">
<div class="wp-block-column is-layout-flow popping-up">
<h3 class="wp-block-heading has-text-align-center">What’s Popping Up</h3>
<p class="has-text-align-center">Check out our latest Pop Ups in NYC</p>
</div>
</div>
		
		<?php
    $today = date('Ymd');
    $args = array(
        'post_type'     => 'pop-up',
		'posts_per_page' => 3,
		'numberposts'   => 3,
		'order'   => 'DESC',
		'orderby' => 'end_date',
        'meta_key'      => 'end_date',
        'meta_query'    => array( array(
            'key' => 'end_date',
            'type' => 'DATE'
        ))
    );
    $upcoming_events = new WP_Query( $args );
    if ( $upcoming_events->have_posts() ) :
?>
	<div class="wp-block-uagb-post-grid uagb-post-grid uagb-post__image-position-background uagb-post__image-enabled uagb-block-b3089bf4 uagb-post__items uagb-post__columns-3 is-grid uagb-post__columns-tablet-2 uagb-post__columns-mobile-1 uagb-post__equal-height">


<?php while ( $upcoming_events->have_posts() ) : $upcoming_events->the_post(); ?>

	<?php 	$neighborhood = get_field( 'neighborhood' ); ?>
	
<?php echo '<div class="pop-up-card"><a href="' . get_permalink($post->ID) . '"><article class="uagb-post__inner-wrap feature-pop-up" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(' . get_field("background_image") . ' ); ">';


 if ( get_field( 'logo' ) ) :
		$img = get_field("logo");
		$image_thumbnail_url = $img['sizes']['medium'];
		echo '	<div class="logo-box has-text-align-center "><img class="pop-up-logo" src="' . $image_thumbnail_url . '" alt="' . get_the_title($post->ID) . '"/></div>';
		 else: 
		echo '<h3 class="has-text-align-center pop-up-name">'. get_the_title() .'</h3>';
 endif;
		
	   
	   $current_date = date('Ymd');
$start = get_field('start_date');
$end = get_field('end_date');                

if ($current_date >= $start && $current_date <= $end){
  echo '  
					<h3>Now Open</h3>
				';
} 	
elseif ($current_date < $start ){
  echo '  
					<h3>Upcoming</h3>
				';
} 
	else {
  echo ' 
					<h3>Past Pop Up</h3>
				';
}

 if ( get_field( 'start_date' ) ) :
 $startdate = get_field('start_date');
$startdate2 = date("m/d/Y", strtotime($startdate));
 $enddate = get_field('end_date');
$enddate2 = date("m/d/Y", strtotime($enddate));
			echo '<span>'. $startdate2 . ' - </span>
			<span>'. $enddate2 .'</span><br>';
			 endif;
			 
		 $location = get_field( 'location' ); 
 if ( $location ) : 
	 foreach ( $location as $post ) :
	 setup_postdata( $post ); 
	 $neighborhood = get_field( 'neighborhood' ); 
	  if ( have_rows( 'address' ) ) : 
	while ( have_rows( 'address' ) ) : the_row(); 
		 $city = get_sub_field( 'city' ); 
	 endwhile; 
	 endif; 

	echo ' <span><a href="/spaces/?_sft_neighborhood='. esc_html( $neighborhood->slug ) .'">'. esc_html( $neighborhood->name ) .', '.$city.'</a></span><br>';

		endforeach;
		 endif; 
			wp_reset_postdata(); 
			
			
			echo '</article></a></div>
		'; ?>

<?php endwhile; wp_reset_postdata(); ?>


<?php endif; ?>
		</div>
		
</div>

<?php get_footer(); ?>