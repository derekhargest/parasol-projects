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

		<div class="wp-block-cover alignfull">
			<div class="pp-container-top">
		<div class="parasol_premium_badge">
		<?php if ( get_field( 'parasol_premium' ) == 1 ) : ?> 
	
	<?php // echo 'true'; ?>	<a href="#parasol_premium_modal" data-toggle="modal"><div class="parasol_premium"><span>Parasol Premium</span></div></a>
						
<?php else : ?>
	<?php // echo 'false'; ?>
<?php endif; ?></div>
			</div>
			<div id="parasol_premium_modal" class="modal parasol_premium_modal" tabindex="-1"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button class="close" type="button" data-dismiss="modal">×</button> </div> <?php if ( have_rows( 'parasol_premium_pop_up', 'option' ) ) : ?>
	<?php while ( have_rows( 'parasol_premium_pop_up', 'option' ) ) : the_row(); ?>
		<p class="modal-headline"><?php the_sub_field( 'headline' ); ?></p>
		<p><?php the_sub_field( 'text' ); ?></p>
	<?php endwhile; ?>
<?php endif; ?></div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->
		 <div id="space-slider" class="owl-carousel owl-theme gallery">
			 
              	<?php $gallery_images = get_field( 'gallery' ); ?>
<?php if ( $gallery_images ) :  ?>
                            <?php foreach ( $gallery_images as $gallery_image ): ?>
			 <div class="item gallery-item">
			<a href="#space_gallery_modal" data-toggle="modal"><img class="owl-lazy" data-src="<?php echo esc_url( $gallery_image['url'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" /></a>
		 </div>
							<?php endforeach; ?>
                       <?php endif; ?>
			 
            </div>
						<div id="space_gallery_modal" class="modal space_gallery_modal" tabindex="-1"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button class="close" type="button" data-dismiss="modal">×</button> </div>  <?php echo do_shortcode('[acf_views name="Space Gallery" view-id="651f01033c253"]'); ?></div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->
		
		</div>
			<div class="space-container-top space-head">
				<div class="grid__item"><h1><?php echo get_the_title(); ?></h1></div>
				
				<div class="grid__item"><span><?php $neighborhood = get_field( 'neighborhood' ); ?>
<?php if ( $neighborhood ) : ?>
	<a href="/spaces/?_sft_neighborhood=<?php echo esc_html( $neighborhood->slug ); ?>"><?php echo esc_html( $neighborhood->name ); ?></a><?php endif; ?>,</span>
		<span><?php echo get_field( 'square_footage' ); ?> square feet </span>
					
					 <?php
    $feet=get_field('square_footage');
        $meters=intval($feet * .092903);
echo ( "($meters square meters)</br>" );
?>
			</div>
				<div class="grid__item"><?php if ( get_field( 'booked_often' ) == 1 ) : ?> 
	
	<?php // echo 'true'; ?>	<div class="booked_often"><i class="fa-solid fa-star"></i> Booked often</div>
<?php else : ?>
	<?php // echo 'false'; ?>
<?php endif; ?></div>
				<div class="grid__item item4">
										<div class="wp-block-buttons is-content-justification-right is-layout-flex wp-container-7">
						<?php $floor_plan_image_images = get_field( 'floor_plan_image' ); 
						$floor_plan = get_field( 'floor_plan' ); 
						?>
<?php if ( $floor_plan_image_images || $floor_plan ) :  ?>
						<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button add-floor" href="#floor-modal" data-toggle="modal" >View floor plan</a></div>
						<?php endif; ?>
						
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button add-map" href="#floor-modal" data-toggle="modal">Show on map <i class="far fa-map"></i></a></div>
	<div id="floor-modal" class="modal" tabindex="-1"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button class="close" type="button" data-dismiss="modal">×</button> </div>
<div id="tabBox">
  <div class="tabWrap">
    <input id="tab-01" name="tab" type="radio" checked />
    <label class="tab label-01" for="tab-01">  <?php if ( $floor_plan_image_images || $floor_plan ) :  ?><div class="wp-block-button"><div class="wp-block-button__link has-text-align-center wp-element-button">View floor plan</div></div><?php endif; ?></label>
	  
    <!-- tabContent 01 -->
    <article class="tabContent">
		<div class="container insize">
  <div id="floor-carousel" class="owl-carousel owl-theme" data-slider-id="1">
	       <?php $floor_plan_image_images = get_field( 'floor_plan_image' ); ?>
<?php if ( $floor_plan_image_images ) :  ?>
	<?php foreach ( $floor_plan_image_images as $floor_plan_image_image ): ?>
	   <div class="item">
		<a href="<?php echo esc_url( $floor_plan_image_image['url'] ); ?>"  target="_blank">
			<img src="<?php echo esc_url( $floor_plan_image_image['sizes']['large'] ); ?>" alt="zoom" class="alignleft size-medium wp-image-7000" alt="<?php echo esc_attr( $floor_plan_image_image['alt'] ); ?>" />
		</a>
		<p><?php echo esc_html( $floor_plan_image_image['caption'] ); ?></p>
		   <a href="<?php echo esc_url( $floor_plan_image_image['url'] ); ?>"  download><i class="fa-solid fa-image"></i> Download floor plan image</a>
		   </div>
	<?php endforeach; ?>
<?php endif; ?>
</div>
			<?php if ( get_field( 'floor_plan' ) ) : ?>
	<a href="<?php echo get_field( 'floor_plan' ); ?>" download><i class="fa-solid fa-file-pdf"></i> Download floor plan document</a>
<?php endif; ?>
			
</div>
    </article>
  </div>
  <div class="tabWrap"> 
    <input id="tab-02" name="tab" type="radio" />
    <label class="tab label-02" for="tab-02"><div class="wp-block-button"><div class="wp-block-button__link has-text-align-center wp-element-button">Show on map</div></div></label>
    <!-- tabContent 02 -->
    <article class="tabContent">
		<?php if ( have_rows( 'address' ) ) : ?>
	<?php while ( have_rows( 'address' ) ) : the_row(); ?>
		<?php $latitude = get_field( 'latitude' );
			$longitude = get_field( 'longitude' ); 
		?>
		<?php if ( $latitude ) : ?>
		 <?php echo do_shortcode('[display_map width="848" height="500" zoom="16" language="en" map_type="ROADMAP" map_draggable="true" marker1="'. $latitude .' | '. $longitude .' | '. get_the_title() .' | '. get_the_title() .' | space"]'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
    </article>
  </div>
</div>
		 </div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->			
						</div>
		</div>
</div>
	
		<div class="space-container space-features">			
			<?php $highlights = get_field( 'highlights' ); ?>
<?php if ( $highlights ) : ?>
	<?php $get_terms_args = array(
		'taxonomy' => 'highlight',
		'hide_empty' => 0,
		'include' => $highlights,
	); ?>
	<?php $terms = get_terms( $get_terms_args ); ?>
	<?php if ( $terms ) : ?>
		<?php foreach ( $terms as $term ) : ?>
		<div class="item highlight">
			 <div class="highlight-icon"> <img src="<?php echo get_field("icon", $term); ?>" /></div>
			<?php echo esc_html( $term->name ); ?>	
			<p><?php echo esc_html( $term->description ); ?></p>	
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
<?php endif; ?>
			<div class="item item-3">
				<div class="inner-price">
			<div class="rates">
				
				
				<?php if ( have_rows( 'pricing' ) ) : ?>
	<?php while ( have_rows( 'pricing' ) ) : the_row(); ?>
			<?php if( get_sub_field('daily_price_low') ): ?>	
				 <div class="price-content" data-number="1">
		<h3>$<?php the_sub_field( 'daily_price_low' ); ?> - $<?php the_sub_field( 'daily_price_max' ); ?></h3>
					   </div>
				<?php endif; ?>
				<?php if ( get_sub_field('weekly_price_low') ): ?>	
				 <div class="price-content" data-number="2">
		<h3>$<?php the_sub_field( 'weekly_price_low' ); ?> - $<?php the_sub_field( 'weekly_price_max' ); ?></h3>
					   </div>
				<?php endif; ?>
					<?php if ( get_sub_field('monthly_price_low') ): ?>	
				  <div class="price-content" data-number="3">
		<h3>$<?php the_sub_field( 'monthly_price_low' ); ?> - $<?php the_sub_field( 'monthly_price_max' ); ?></h3>
				</div>
				<?php endif; ?>
		 <div class="selectSection"><?php if ( get_sub_field('daily_price_low') ): ?><button type="button" data-number="1" class="active-price">per day</button><?php endif; ?><?php if(get_sub_field('daily_price_low') && get_sub_field('weekly_price_low')): ?><span>•</span><?php endif; ?><?php if( get_sub_field('weekly_price_low') ): ?><button type="button" data-number="2" <?php if(get_sub_field('daily_price_low') == null): ?>class="active-price"<?php endif; ?>>per week</button><?php endif; ?><?php if(get_sub_field('weekly_price_low') && get_sub_field('monthly_price_low')): ?><span>•</span><?php endif; ?><?php if ( get_sub_field('monthly_price_low') ): ?><button type="button" data-number="3" <?php if(get_sub_field('daily_price_low') && get_sub_field('weekly_price_low') == null): ?>class="active-price"<?php endif; ?>>per month</button><?php endif; ?></div>
				
				<?php
     if(
         ( !get_sub_field('weekly_price_low') ) && 
         ( !get_sub_field('daily_price_low') ) && 
         ( !get_sub_field('monthly_price_low') )
	 ): 
?>
  <h3>Enquire for pricing</h3>
<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
					</div>
				<div class="wp-block-buttons is-content-justification-right is-layout-flex wp-container-7">
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button enquire-now-button" href="#enquire-modal" data-toggle="modal">Enquire Now</a></div>
</div>
				<p>We offer seasonal pricing and multi-week packages. 
Prices vary based on season and location.</p>
</div></div>
		</div>

		</div>
		<div class="space-container space-about">
			<div class="item">
		<h4>About</h4>
				<h2><?php echo get_field( 'about' ); ?></h2>
			</div>
				<div class="item space-about-right">
						<?php 
                        $past_clients = get_posts(array(
                            'post_type' => 'pop-up',
							'posts_per_page' => 15,
                            'meta_query' => array(
                                array(
                                    'key' => 'location',
                                    'value' => '"' . get_the_ID() . '"',
                                    'compare' => 'LIKE'
                                )
                            )
                        ));

                        ?>
                        <?php if(  $past_clients ): ?>
                         	<h4>Past clients</h4>
					<div class="client-list">
                            <?php foreach(  $past_clients as  $past_client ): ?>
                                <span><a class="client" href="<?php echo get_permalink( $past_client->ID ); ?>"><?php echo get_the_title( $past_client->ID ); ?></a></span>
                            <?php endforeach; ?>
						</div>
                        <?php else : ?>
					<div class="client-list">
						</div>
                        <?php endif; ?>

</div>
		</div>
		
		<?php if( get_field('video') ): ?>		
		<div class="space-container">
			<div class="space-video">
				<h3>Video Tour</h3>
		<?php echo get_field( 'video' ); ?>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if( get_field('360_view') ): ?>		
		<div class="space-container">
			<div class="space-video">
				<h3>360 View</h3>
			<?php echo get_field( '360_view' ); ?>
				<span class="tour-tip">Drag to interact with space preview.</span>
			</div>
		</div>
		<?php endif; ?>
		
		
		<?php $amenities_checked_values = get_field( 'amenities_options' ); ?>
<?php if ( $amenities_checked_values ) : ?>
		<div class="space-container amenities">
			<h4>Amenities</h4>
		<ul>
	<?php foreach ( $amenities_checked_values as $amenities_value ): ?>
		<li><?php echo esc_html( $amenities_value ); ?></li>
	<?php endforeach; ?>
					</ul>
</div>	
<?php endif; ?>
	
		
		<div class="about-neighborhood">
<?php if ( $neighborhood ) : ?>
	<?php $get_terms_args = array(
		'taxonomy' => 'neighborhood',
	); ?>
	<?php $terms = get_the_terms( $post->ID , 'neighborhood' ); ?>		
	<?php if ( $terms ) : ?>
		<?php foreach ( $terms as $term ) : ?>
			<div class="item"><h4>About the area</h4><p><?php echo esc_html( $term->description ); ?></p></div>
			 <div class="neighborhood-image item"> 
			<?php $image = get_field( 'image', $term ); ?>
<?php if ( $image ) : ?>
	<a href="/spaces/?_sft_neighborhood=<?php echo esc_html( $neighborhood->slug ); ?>"><img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" /></a>
<?php endif; ?>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
<?php endif; ?>
		</div>
		
			<div class="enquire-block wp-block-buttons is-content-justification-center is-layout-flex wp-container-7">
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button enquire-now-button" href="#enquire-modal" data-toggle="modal">Enquire about this space</a></div>
</div>
		<div class="similar-spaces">
				<?php
        $posts = get_posts(array(
'numberposts'   => 6,
'post_type'     => 'space',
 ));
    ?>

		<h3 class="wp-block-heading has-text-align-center feature-title">Similar spaces</h3>
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