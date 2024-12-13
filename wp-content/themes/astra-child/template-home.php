<?php

/**
 * Template Name: Home Page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
	<div id="primary" <?php astra_primary_class(); ?>>
    <div id="content" role="main">

        <?php while ( have_posts() ) : the_post(); ?> 

		<div class="wp-block-cover alignfull" style="min-height:804px">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<img class="wp-block-cover__image-background" alt="" src="<?php echo get_the_post_thumbnail( get_the_ID(), 'full' );?>
			<div class="wp-block-cover__inner-container hero-home">
<h1 class="wp-block-heading has-text-align-center hero-text"><?php the_field( 'headline' ); ?></h1>
<p class="has-text-align-center hero-tag-line"><?php the_field( 'blurb' ); ?></p>
<div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-1">
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php the_field( 'button_link' ); ?>"><?php the_field( 'button_text' ); ?></a></div>
</div>
</div></div>
		<div class="client-home wp-block-columns alignfull has-ast-global-color-2-background-color has-background is-layout-flex wp-container-4">
<div class="wp-block-column is-layout-flow" style="flex-basis:20%; display: grid;">
<h5 class="wp-block-heading has-ast-global-color-5-color has-text-color">Trusted by</h5>
</div>
<div class="wp-block-column client-container">
<?php
        $posts = get_posts(array(
'meta_query' => array(
        array(
            'key'   => 'trusted_by_featured',
            'value' => '1',
        )
    ),
'numberposts'   => 5,
'post_type'     => 'pop-up'

 ));
    ?>
  <?php foreach($posts as $post){

       $img = get_field("logo");
		$image_thumbnail_url = $img['sizes']['medium'];?> 

	<a href="<?php echo get_permalink($post->ID) ?>"><div class="client-box"><img class="client-logo" alt="<?php echo get_the_title($post->ID) ?>" src="<?php echo $image_thumbnail_url; ?>"/></div></a>

  <?php }?>	
			</div>
</div>
        <?php endwhile; ?>

		<h3 class="wp-block-heading has-text-align-center feature-title">Featured Spaces in NYC</h3>
		<div class="wp-block-uagb-post-grid uagb-post-grid space-carousel">			
					<div id="home-carousel" class="owl-carousel owl-theme">
			<?php $featured_spaces = get_field( 'featured_spaces', 'option' ); ?>
<?php if ( $featured_spaces ) : ?>
	<?php foreach ( $featured_spaces as $post ) :  ?>					  
		<?php $neighborhood = get_field( 'neighborhood' );
        echo '<div class="feature-space">
		<div class="item">';
echo '<div id="home-carousel--nested" class="owl-carousel owl-theme home-carousel--nested">';
$images = get_field( 'preview_images' );
foreach( $images as $image ) {
  $image_url = $image['url'];
  $image_thumbnail_url = $image['sizes']['medium_large'];
echo '  <div class="item">';
	echo '<a href="' . get_the_permalink($post_id) . '">';
  echo '<img class="owl-lazy" alt="' . get_the_title($post->ID) . '" data-src="' . $image_thumbnail_url . '">';
  echo ' </a></div>';
}

echo '</div>
		
		<div class="space-row">
			<div class="space-left">
		<h3 class="space-title">' . get_the_title($post->ID) . '</h3>
			<h3 class="neighborhood">' . $neighborhood->name .'</h3>
			</div>
			<div class="space-right">
			<span>' . get_field('square_footage') . ' square foot</span><br>';
		
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
		
		</div>'; ?>
	<?php endforeach; ?>

<?php endif; ?>	
																		  
						</div>
		</div>
		</div>
									<div> <?php the_content(); ?> </div>									  
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

 $img = get_field("logo");
		$image_thumbnail_url = $img['sizes']['medium'];
 if ( get_field( 'logo' ) ) :
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
		<?php
        $posts = get_posts(array(
'numberposts'   => 4,
			'posts_per_page' => 4,
'post_type'     => 'testimonials',
 ));
    ?>
		<div class="wp-block-columns alignfull has-ast-global-color-1-background-color has-background is-layout-flex wp-container-14 testimonial-section">
<div class="wp-block-column is-layout-flow">
					<div id="owl-testimonials" class="testimonial-home owl-carousel owl-theme">
		<?php
if($posts)
{
    foreach($posts as $post)
    {
		 $img = get_field("testimonial_image");
		$image_thumbnail_url = $img['sizes']['medium'];
        echo '<div class="item">	
		<div class="testimonial-row">
		<div class"left-testimonials"><img class="testimonial_image" src="' . $image_thumbnail_url . '" alt="' . get_the_title($post->ID) . '"/></div>
			<div class="right-testimonials">
			<p>' . get_field('testimonial') . ' </p><br>
			<span class="author-testimonials">' . get_field('author') . ' - ' . get_field('business_name') . ' </span>
			</div>
	</div>
		</div>
		';
    }

}

		?>
						</div>
		</div>
</div>
		</div>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>