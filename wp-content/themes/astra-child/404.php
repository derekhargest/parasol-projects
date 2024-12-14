<?php

/**
 * Template Name: Space
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<div id="primary" <?php astra_primary_class(); ?>>
    <div id="content" role="main">

		<div class="space-container 404-page">
		<h1>We can’t seem to find the page you’re looking for</h1>
<h3>Here are some helpful links instead:</h3>
			<ul class"page-list"><li><a href="https://parasolprojects.com/" class="menu-link">Home</a></li>
<li><a href="/services/" class="menu-link">Services</a></li>
<li><a href="/spaces/" class="menu-link">Spaces</a></li>
<li><a href="/resources/" class="menu-link">Resources</a></li>
<li><a href="/pop-ups/" class="menu-link">Pop Ups</a></li>
<li><a href="/faq/" class="menu-link">FAQ</a></li>
<li><a href="/about/" class="menu-link">About</a></li>
</ul>
		</div>
		
		<div class="similar-spaces">
				<?php
        $posts = get_posts(array(
'numberposts'   => 6,
'post_type'     => 'space',
 ));
    ?>

		<h3 class="wp-block-heading has-text-align-center feature-title">Featured Spaces in NYC</h3>
<div class="wp-block-uagb-post-grid uagb-post-grid space-carousel">			
					<div id="home-carousel" class="owl-carousel owl-theme">
		<?php
if($posts)
{
    foreach($posts as $post)
    {
		$neighborhood = get_field( 'neighborhood' );
        echo '<div class="feature-space">
		<div class="item">';
			
			// example markup: create an unordered list of images
echo '<div id="home-carousel--nested" class="owl-carousel owl-theme home-carousel--nested">';
$images = get_field( 'preview_images' );
// loop through the images to get the URL
foreach( $images as $image ) {

  // the url for the full image
  $image_url = $image['url'];

  // the url for a specific image size - in this case: thumbnail
  $image_thumbnail_url = $image['sizes']['large'];

  // render your markup inside this loop, example: an unordered list of images
  echo '  <div class="item">';
	echo '<a href="' . get_the_permalink($post_id) . '">';
  echo '<img alt="' . get_the_title($post->ID) . '" src="' . $image_thumbnail_url . '">';
	echo '</a>';
  echo ' </div>';
}

echo '</div>
		
		<div class="space-row">
			<div class="space-left">
		<h2 class="space-title">' . get_the_title($post->ID) . '</h2>
			<h3 class="neighborhood">' . $neighborhood->name .'</h3>
			</div>
			<div class="space-right">
			<span>' . get_field('square_footage') . ' square feet</span><br>';
		
			echo '<div class="space-rates">';
				if ( have_rows( 'pricing' ) ) :
	 while ( have_rows( 'pricing' ) ) : the_row(); 
			 if( get_sub_field('weekly_price_low') ): 
		echo '<span class="weekly-rate-result">$';
			the_sub_field( 'weekly_price_low' ); 
		echo ' - $';
				the_sub_field( 'weekly_price_max' );
		echo ' </span><br><span class="per-word">per week</span><br>';
				elseif ( get_sub_field('daily_price_low') ): 	
		echo '<span class="daily-rate">$';
			the_sub_field( 'daily_price_low' ); 
		echo ' - $';
				the_sub_field( 'daily_price_max' );
		echo ' </span><br><span class="per-word">per day</span><br>';
			 	elseif ( get_sub_field('monthly_price_low') ):	
		echo '<span class="monthly-rate">$';
			the_sub_field( 'monthly_price_low' ); 
		echo ' - $';
				the_sub_field( 'monthly_price_max' );
		echo ' </span><br><span class="per-word">per month</span><br>';
				 else : 
				echo '<span class="enquire">Enquire for pricing</span>';
				     endif; 
	 endwhile; 
 endif; 
					echo '</div>
			<a href="' . get_permalink($post->ID) . '">Learn More</a>
			</div>
			</div>
		</div>
	
		</div>';
    }

}
		?>
						</div>
		</div>
		</div>
	  </div>
		<?php astra_primary_content_bottom(); ?>

		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>