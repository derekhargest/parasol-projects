<?php

/**
 * Template Name: Pop-up
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>
		<?php astra_primary_content_top(); ?>
		<div class="entry-content clear" ast-blocks-layout="true" itemprop="text">	
<div class="wp-block-cover alignfull">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
	
	<?php if ( get_field( 'background_image' ) ) : ?>
	<img loading="lazy" src="<?php echo get_field( 'background_image' ); ?>" class="wp-block-cover__image-background wp-post-image" alt="" decoding="async" data-object-fit="cover">
	<?php endif ?>
	<div class="wp-block-cover__inner-container">
		<?php if ( get_field( 'logo' ) ) : 
		$img = get_field("logo");
		$image_thumbnail_url = $img['sizes']['medium'];?>
			<div class="logo-box has-text-align-center "><img class="pop-up-logo" src="<?php echo $image_thumbnail_url;  ?>" alt="<?php echo get_the_title($post->ID) ?>"/></div>
		<?php else: ?> 
		<p class="has-text-align-center has-large-font-size"><?php echo get_the_title(); ?></p>
<?php endif ?>
		<div class="has-text-align-center pop-details">
		<?php $location = get_field( 'location' ); ?>
<?php if ( $location ) : ?>
	<?php foreach ( $location as $post ) : ?> 
		<?php setup_postdata ( $post ); ?>
		<?php $neighborhood = get_field( 'neighborhood' ); ?>
<?php if ( $neighborhood ) : ?><span>
	<a href="/spaces/?_sft_neighborhood=<?php echo esc_html( $neighborhood->slug ); ?>"><?php echo esc_html( $neighborhood->name ); ?></a></span><br><?php endif; ?>	<?php endforeach; ?> 
					<?php wp_reset_postdata(); ?>
<?php endif; ?>
		<?php 	 if ( get_field( 'start_date' ) ) :
 $startdate = get_field('start_date');
$startdate2 = date("m/d/Y", strtotime($startdate));
 $enddate = get_field('end_date');
$enddate2 = date("m/d/Y", strtotime($enddate));
			echo '<span>'. $startdate2 . ' - </span>
			<span>'. $enddate2 .'</span><br>';
			 endif;  ?>
<div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-1">
<div class="wp-block-button is-style-outline">
	
			<?php
											$start_date = strtoupper( date('F j, Y', strtotime(get_field('start_date'))) );
											$end_date = strtoupper( date('F j, Y', strtotime(get_field('end_date'))) );
											$start_date_gcal = strtoupper( date('Y-m-d', strtotime(get_field('start_date'))) );
											$end_date_gcal = strtoupper( date('Y-m-d', strtotime(get_field('end_date'))) );
											$title = get_the_title( get_the_ID() );
											$description = get_the_excerpt();
											$location = get_field('location');
	 if ( $location ) : 
	 foreach ( $location as $post ) : 
	 setup_postdata ( $post ); 
	
	if( have_rows('address') ):
    while( have_rows('address') ) : the_row();
        $address = get_sub_field('address_1');
	 	$city = get_sub_field( 'city' );
		$state = get_sub_field( 'state' );
		$zip = get_sub_field( 'zip' );
    endwhile;
endif;
	wp_reset_postdata();
	endforeach;
	endif;
	
											$calendar = get_feed_link('calendar');
											$postid = get_the_ID();

  echo do_shortcode( '[add-to-calendar-button name="'. $title .'" options="&#39;Apple&#39;,&#39;Google&#39;" styleLight="--btn-background: transparent; --btn-text: #fff; --font: &#39;Inter&#39; font-weight: 500; border-radius: 50px;" styleDark="border: 0px;  border-radius: 50px;" startDate="'. $start_date_gcal .'" endDate="'. $end_date_gcal .'" "eventAttendanceMode": "https://schema.org/MixedEventAttendanceMode", "eventStatus": "https://schema.org/EventScheduled", location="'. $address .', '. $city .', '. $state .', '. $zip .'" hideIconButton="true" lightMode="bodyScheme" description="'. $description .'"]' );
									?>
	</div>
	
</div></div>
</div></div>
<div class="pop-up-content">
	<div class="pop-up-left">
		<h4>About the Pop Up</h4>
		<?php echo get_field( 'pop_up_about' ); ?>
		</div>
		<div class="pop-up-right">
			<div class="inherit-container-width wp-block-group info-box is-layout-constrained">
<h4 class="wp-block-heading"><?php echo get_the_title(); ?></h4>
					<?php if ( get_field( 'primary_brand_name' ) ) : ?>
				<h4 class="wp-block-heading">
					<?php echo get_field( 'primary_brand_name' ); ?>
				</h4>
				<?php endif; ?>
				<a class="pop-up-url" rel="noopener nofollow" target="_blank" href="<?php echo get_field( 'website_url' ); ?>" ><?php echo get_field( 'website_url' ); ?></a>

	<?php if ( have_rows( 'social_media_links' ) ) : ?>
	<?php while ( have_rows( 'social_media_links' ) ) : the_row(); ?>

<ul class="wp-block-social-links has-visible-labels has-icon-color is-style-logos-only is-vertical is-nowrap is-layout-flex wp-container-5">
	<?php if ( get_sub_field( 'instagram') ) : ?>
	<li style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-instagram wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="https://www.instagram.com/<?php the_sub_field( 'instagram' ); ?>" class="wp-block-social-link-anchor"><i class="fa fa-instagram"></i><span class="wp-block-social-link-label">@<?php the_sub_field( 'instagram' ); ?></span></a></li>
	<?php endif; ?>
	<?php if ( get_sub_field( 'tiktok') ) : ?>
	<li style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-tiktok wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="https://www.tiktok.com/@<?php the_sub_field( 'tiktok' ); ?>" class="wp-block-social-link-anchor"><i class="fa-brands fa-tiktok"></i><span class="wp-block-social-link-label">@<?php the_sub_field( 'tiktok' ); ?></span></a></li>
	<?php endif; ?>
	<?php if ( get_sub_field( 'facebook') ) : ?>
<li style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-facebook wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="https://www.facebook.com/<?php the_sub_field( 'facebook' ); ?>" class="wp-block-social-link-anchor"><i class="fa fa-facebook"></i><span class="wp-block-social-link-label">@<?php the_sub_field( 'facebook' ); ?></span></a></li>
				<?php endif; ?>
				</ul>

	<?php endwhile; ?>
<?php endif; ?>
				
				<?php if ( have_rows( 'social_media_links_group' ) ) : ?>
	<?php while ( have_rows( 'social_media_links_group' ) ) : the_row(); ?>
		<?php if ( have_rows( 'brand_social_media_links' ) ) : ?>
			<?php while ( have_rows( 'brand_social_media_links' ) ) : the_row(); ?>
				<h4 class="wp-block-heading"><?php echo get_sub_field('company_name'); ?></h4>
					<a class="pop-up-url" rel="noopener nofollow" target="_blank" href="<?php the_sub_field( 'website_url' ); ?>" ><?php the_sub_field( 'website_url' ); ?></a>
				<ul class="wp-block-social-links has-visible-labels has-icon-color is-style-logos-only is-vertical is-nowrap is-layout-flex wp-container-5">
	<?php if ( get_sub_field( 'instagram') ) : ?>
	<li style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-instagram wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="https://www.instagram.com/<?php the_sub_field( 'instagram' ); ?>" class="wp-block-social-link-anchor"><i class="fa fa-instagram"></i><span class="wp-block-social-link-label">@<?php the_sub_field( 'instagram' ); ?></span></a></li>
	<?php endif; ?>
	<?php if ( get_sub_field( 'tiktok') ) : ?>
	<li style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-tiktok wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="https://www.tiktok.com/@<?php the_sub_field( 'tiktok' ); ?>" class="wp-block-social-link-anchor"><i class="fa-brands fa-tiktok"></i><span class="wp-block-social-link-label">@<?php the_sub_field( 'tiktok' ); ?></span></a></li>
	<?php endif; ?>
	<?php if ( get_sub_field( 'facebook') ) : ?>
<li style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-facebook wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="https://www.facebook.com/<?php the_sub_field( 'facebook' ); ?>" class="wp-block-social-link-anchor"><i class="fa fa-facebook"></i><span class="wp-block-social-link-label">@<?php the_sub_field( 'facebook' ); ?></span></a></li>
				<?php endif; ?>
				</ul>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // No rows found ?>
<?php endif; ?>
				
				

<h3><?php $location = get_field( 'location' ); ?>
<?php if ( $location ) : ?>
	<?php foreach ( $location as $post ) : ?>
		<?php setup_postdata ( $post ); ?>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php endforeach; ?>
	</h3>
				<span><?php $neighborhood = get_field( 'neighborhood' ); ?>
<?php if ( $neighborhood ) : ?>
	<a href="/spaces/?_sft_neighborhood=<?php echo esc_html( $neighborhood->slug ); ?>"><?php echo esc_html( $neighborhood->name ); ?></a><?php endif; ?>,</span>
		<span>
	<?php echo get_field( 'square_footage' ); ?>
	<?php wp_reset_postdata(); ?>
 SQFT</span><br><?php endif; ?>
				<div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-7">
					<?php $location = get_field( 'location' ); ?>
<?php if ( $location ) : ?>
	<?php foreach ( $location as $post ) : ?>
		<?php setup_postdata ( $post ); ?>
						<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button" href="<?php the_permalink(); ?>">See Pop Up space</a></div>
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button" href="#map-modal" data-toggle="modal">View on map</a></div>
	<div id="map-modal" class="modal" tabindex="-1"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button class="close" type="button" data-dismiss="modal">×</button> </div> <div class="pop-up-map"> <?php if ( have_rows( 'address' ) ) : ?>
	<?php while ( have_rows( 'address' ) ) : the_row(); ?>
		<?php $latitude = get_field( 'latitude' );
			$longitude = get_field( 'longitude' ); 
		?>
		<?php if ( $latitude ) : ?>
		 <?php echo do_shortcode('[display_map width="448" height="500" zoom="16" language="en" map_type="ROADMAP" map_draggable="true" marker1="'. $latitude .' | '. $longitude .' | '. get_the_title() .' | '. get_the_title() .' | space"]'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
		</div></div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->
		<?php wp_reset_postdata(); ?>
			<?php endforeach; ?>
<?php endif; ?>
						
						</div>
</div>	
		</div>
	</div>
			<div class="pop-up-content-box">
		<?php echo do_shortcode('[acf_views name="Pop Up Gallery" view-id="651f010334c66"]'); ?>
				<?php the_content(); ?>
				 </div>
			<div class="space-container whats-pop">
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
		
				
		<div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-7">
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button" href="/pop-ups/">See all Pop Ups</a></div>
</div>
</div>
			</div>
	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
