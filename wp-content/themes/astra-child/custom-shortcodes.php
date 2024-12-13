<?php
function space_block_gallery() {
 // get the array of all gallery images from the current post
$images = get_field( 'preview_images' );
	$post_id = get_field('url', false, false);

// example markup: create an unordered list of images
echo '<div id="home-carousel--nested" class="owl-carousel owl-theme home-carousel--nested">';

// loop through the images to get the URL
foreach( $images as $image ) {

  // the url for the full image
  $image_url = $image['url'];

  // the url for a specific image size - in this case: thumbnail
  $image_thumbnail_url = $image['sizes']['medium_large'];

  // render your markup inside this loop, example: an unordered list of images
  echo '  <div class="item">';
	echo '<a href="' . get_the_permalink($post_id) . '">';
  echo '<img class="owl-lazy" alt="' . get_the_title($post->ID) . '" data-src="' . $image_thumbnail_url . '">';
  echo ' </a></div>';
}

echo '</div>';

}

add_shortcode('space-gallery', 'space_block_gallery');

function quick_view_gallery() {
    // get the array of all gallery images from the current post
    $images = get_field('gallery');
    $post_id = get_field('url', false, false);

    // example markup: create an unordered list of images
    echo '<div id="home-carousel--nested" class="owl-carousel owl-theme home-carousel--nested pop-up-preview pop-owl">';

    // Check if the gallery is empty
    if (empty($images)) {
        // If gallery is empty, use the featured image
        if (has_post_thumbnail()) {
            $featured_image_url = get_the_post_thumbnail_url($post_id, 'medium_large');
            echo '<div class="item">';
            echo '<a href="' . get_the_permalink($post_id) . '">';
            echo '<img class="owl-lazy" alt="' . get_the_title($post_id) . '" data-src="' . $featured_image_url . '">';
            echo '</a></div>';
        }
    } else {
        // loop through the images to get the URL
        foreach (array_slice($images, 0, 4) as $image) {
            // the url for a specific image size - in this case: thumbnail
            $image_thumbnail_url = $image['sizes']['medium_large'];

            // render your markup inside this loop, example: an unordered list of images
            echo '<div class="item">';
            echo '<a href="' . get_the_permalink($post_id) . '">';
            echo '<img class="owl-lazy" alt="' . get_the_title($post_id) . '" data-src="' . $image_thumbnail_url . '">';
            echo '</a></div>';
        }
    }

    echo '</div>';
}

add_shortcode('quickview-gallery', 'quick_view_gallery');


function space_parasol_premium() {
	
	 if ( get_field( 'parasol_premium' ) == 1 ) :
	
		 echo '  <a href="#parasol_premium_modal" data-toggle="modal"><div class="parasol_premium space-listing-pp"><span>Parasol Premium</span></div></a>
						<div id="parasol_premium_modal" class="modal parasol_premium_modal" tabindex="-1"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button class="close" type="button" data-dismiss="modal">×</button> </div>';
						
						if ( have_rows( 'parasol_premium_pop_up', 'option' ) ) :
	 while ( have_rows( 'parasol_premium_pop_up', 'option' ) ) : the_row(); 
		 echo '<p class="modal-headline">'; 
			 the_sub_field( 'headline' );
		echo ' </p>'; 
			  the_sub_field( 'text' );
	endwhile; 
endif; 	
						echo '  </div> </div> </div>';
 else : 
 endif;
}

add_shortcode('parasol-premium', 'space_parasol_premium');


function pop_up_quickview() { 
	
$post_id = get_field('url', false, false);
	
		 echo '  <a class="quickview-link" href="#myModal-'. get_the_ID() .'" data-toggle="modal"><div class="quickview"><span>Quickview</span></div></a>
	
		<div id="myModal-'. get_the_ID() .'" class="modal myModal" tabindex="-1"> <div class="modal-dialog pop-up-modal"> <div class="modal-content"> <div class="modal-header"> 
		<div class="status">'. get_field( 'status' ) .'</div> <button class="close" type="button" data-dismiss="modal">×</button> </div>
		<h2 class="pop-up-title">'. get_the_title($post->ID) .'</h2>
			<div class="preview-slider">
				
				<div class="pop-up-modal-slider" >';
				
				echo do_shortcode( '[quickview-gallery]' ); 
	
			echo '  </div></div>
			<div class="modal-body">
				<div class="preview-top">';
				
				 $type_of_event_values = get_field( 'type_of_event' ); 
 if ( $type_of_event_values ) : 
	foreach ( $type_of_event_values as $type_of_event_value ) : 
	
echo '<a class="pop-up-type-link" href="/pop-ups/?_sfm_type_of_event='. esc_html( $type_of_event_value ) .'">
				<span class="pop-up-type">'. esc_html( $type_of_event_value ) .'</span></a>';

	endforeach; 
 endif; 
				
		echo '<div class="dates-preview"><div class="start-date">';
		
$date_variable = get_field( 'start_date' );
$date_format_in = 'Ymd';
$date_format_out = 'm/d/Y';
$date = DateTime::createFromFormat( $date_format_in, $date_variable );

echo $date->format( $date_format_out );
		
	echo '</div><div class="end-date">';
	
$date_variable = get_field( 'end_date' );
$date_format_in = 'Ymd';
$date_format_out = 'm/d/Y';
$date = DateTime::createFromFormat( $date_format_in, $date_variable );

echo $date->format( $date_format_out );
		
				echo '	</div>
						</div>
					</div>
					<div class="pop-up-location-box pop-up-location"><span >';

					 $location = get_field( 'location' ); 
if ( $location ) : 
 foreach ( $location as $post ) : 
setup_postdata ( $post ); 

	echo '<span> '. 	get_the_title($post->ID)  .'</span>';
 endforeach; 
 endif; 
	$excerpt = wp_trim_words( get_the_excerpt($page_item->ID), $num_words = 25, $more = '...' );
	echo ' 

				</span>	</div>
<p class="paragraph">'. $excerpt  .'</p>


				
				<div class="wp-block-buttons is-layout-flex wp-container-core-buttons-is-layout-1 wp-block-buttons-is-layout-flex">
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button" href="'. get_permalink($page_item->ID) .'">Read More</a></div>
</div>
				
			</div>';
			
			$next_post = get_adjacent_post(false,'',false);
 $previous_post = get_adjacent_post(false,'',true);
	
	echo ' <div class="modal-navigation">
<div class="modal-nav-button nav-left">';
     if($next_post->ID != ''): 
	
    echo '     <a href="#myModal-'. $next_post->ID .'" data-toggle="modal" >
            <button type="button" class="btn btn-default m-t-30">&larr;</button>
        </a>';
     endif;
echo ' </div>
<div class="modal-nav-button nav-right">';
    if($previous_post->ID != ''): 
      echo '   <a href="#myModal-'. $previous_post->ID .'" data-toggle="modal" >
            <button type="button" class="btn btn-default m-t-30">&rarr;</button>
        </a>';
     endif; 
echo ' </div>';
			
		echo ' </div></div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->';
	 
}

add_shortcode('quickview', 'pop_up_quickview');

function service_page_icon() {

 $service_icon = get_field('service_icon');
	
	
 if ( $service_icon ) : 
	echo '<div class="icon-wrapper">';
	echo 	'<img src="'. esc_url( $service_icon['url'] ).'" alt="'. esc_attr( $service_icon['alt'] ) .'" />';
	
	echo '</div>';
	

 endif;
}

add_shortcode('service_icon', 'service_page_icon');


function space_booked_often() {

	
	if ( get_field( 'booked_often' ) == 1 ) :
	
	echo '  <div class="booked_often">Booked Often</div>';
else : 
endif;
}

add_shortcode('booked-often', 'space_booked_often');

function space_enquire_button() {
	
 echo '  <div class="wp-block-buttons is-content-justification-right is-layout-flex wp-container-7 space-enquire-btn">
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button enquire-now-button" href="#enquire-modal" data-toggle="modal">Enquire</a></div>
</div>';

}

add_shortcode('enquire-button', 'space_enquire_button');

function header_enquire_button() {
	
 echo '<div class="ast-header-button-1 enquire-now-button" data-section="section-hb-button-1"><div class="ast-builder-button-wrap ast-builder-button-size-md"><a class="ast-custom-button-link" href="#enquire-modal" data-toggle="modal"><div class="ast-custom-button">Enquire now</div></a></div></div>';

}

add_shortcode('header-enquire-button', 'header_enquire_button');

function pop_up_status_tag() {

$current_date = date('Ymd');
$start = get_field('start_date');
$end = get_field('end_date');                

if ($current_date >= $start && $current_date <= $end){
  echo '  
					<span class="badge active-badge">Active</span>
				';
} 
	elseif ($current_date < $start ){
  echo '  
					<span class="badge upcoming-badge">Upcoming</span>
				';
} 
	else {
  echo ' 
					<span class="badge past-badge">Past</span>
				';
}

	
}

add_shortcode('pop-up-tag', 'pop_up_status_tag');

function space_info_line() {
	$posts = get_field('location');
 if ( $posts ) : 
	foreach( $posts as $post):
	 setup_postdata( $post ); 
 get_the_title($post );
	echo '<div class="pop-up-location-box"><a class="pop-up-location" href="'. get_permalink( $post->ID ) .'">';
	echo '<span>'. get_the_title($post->ID) .'</span></a></div>';
	endforeach;
	 wp_reset_postdata();
endif; 
}

add_shortcode('space-info', 'space_info_line');

function pop_up_cat_line() {
	
	 $type_of_event_values = get_field( 'type_of_event' );
if ( $type_of_event_values ) : 
	 foreach ( $type_of_event_values as $type_of_event_value ) : 
	echo '<a class="pop-up-type-link" href="/pop-ups/?_sfm_type_of_event=';
	 	 echo esc_html( $type_of_event_value ); 
	echo '">';
	echo '<span class="pop-up-type">';
	 echo esc_html( $type_of_event_value ); 
	echo '</span>';
	echo '</a>';
	 endforeach; 
 endif; 
	
	
}

add_shortcode('pop-up-cat', 'pop_up_cat_line');

function space_rates_info() {
	
echo '<div class="space-rates">';
				if ( have_rows( 'pricing' ) ) :
	 while ( have_rows( 'pricing' ) ) : the_row(); 
			 if( get_sub_field('weekly_price_low') ): 
		echo '<span class="weekly-rate-result">$';
			the_sub_field( 'weekly_price_low' ); 
		echo ' - $';
				the_sub_field( 'weekly_price_max' );
		echo ' </span><span class="per-word">per week</span><br>';
				elseif ( get_sub_field('daily_price_low') ): 	
		echo '<span class="daily-rate">$';
			the_sub_field( 'daily_price_low' ); 
		echo ' - $';
				the_sub_field( 'daily_price_max' );
		echo ' </span><span class="per-word">per day</span><br>';
			 	elseif ( get_sub_field('monthly_price_low') ):	
		echo '<span class="monthly-rate">$';
			the_sub_field( 'monthly_price_low' ); 
		echo ' - $';
				the_sub_field( 'monthly_price_max' );
		echo ' </span><span class="per-word">per month</span><br>';
				 else : 
				echo '<span class="enquire">Enquire for pricing</span>';
				     endif; 
	 endwhile; 
 endif; 
					echo '</div>';
	
}

add_shortcode('space-rates', 'space_rates_info');

function service_testimony_carousel() {

		   ob_start();
        $posts = get_posts(array(
'numberposts'   => 4,
			'posts_per_page' => 4,
'post_type'     => 'testimonials',
 ));
   

		echo '<div class="wp-block-columns alignfull is-layout-flex wp-container-14 service-testimonial-section">
<div class="wp-block-column is-layout-flow">
					<div id="owl-service-testimonials" class="testimonial-service owl-carousel owl-theme">';
		
if($posts)
{
    foreach($posts as $post)
    {
		 $img = get_field("testimonial_image", $post->ID);
		$image_thumbnail_url = $img['sizes']['medium'];
        echo '<div class="item">	
		<div class="testimonial-row">
		<div class"left-service-testimonials"><img class="service-testimonial_image" src="' . $image_thumbnail_url . '" alt="' . get_the_title($post->ID) . '"/></div>
			<div class="right-testimonials">
				<span class="author-testimonials">' . get_field('author', $post->ID) . '</span>
			<p>' . get_field( 'testimonial', $post->ID ) . ' </p><br>
		
			</div>
	</div>
		</div>
		';
    }

}
		echo '</div>
		</div>
</div>
		';
		 return ob_get_clean();
	
}

add_shortcode('service_testimony', 'service_testimony_carousel');

function footer_newsletter_signup() {
if ( have_rows( 'footer_newsletter_sign_up', 'option' ) ) : 
while ( have_rows( 'footer_newsletter_sign_up', 'option' ) ) : the_row(); 
echo '<h3> ';
	the_sub_field( 'headline' ); 
echo '</h3><p>';
the_sub_field( 'description' );
echo '</p><div class="ast-builder-layout-element ast-flex site-header-focus-item ast-header-button-1" data-section="section-hb-button-1">
<div class="ast-builder-button-wrap ast-builder-button-size-md">
<div class="ast-custom-button newsletter-button"><a href="#footer-modal" data-toggle="modal">';
	the_sub_field( 'button_text' );
		echo '</a></div>
</div>
</div>';

endwhile;
endif;
	
}

add_shortcode('footer-newsletter', 'footer_newsletter_signup');

function space_view_buttons() {
echo '<div id="view-buttons" class="inner-filters-sticky grid-lg">
<div class="view-buttons">
	<div class="grid resizeclick"><i class="fa fa-th-large"></i></div>
	<div class="grid-2 resizeclick"><i class="fa fa-th"></i></div>
	<div class="list resizeclick"><i class="fa fa-list"></i></div>
	<div class="map resizeclick"><i class="fa fa-map"></i></div>
</div>
</div>';
	
}

add_shortcode('view-buttons', 'space_view_buttons');
?>