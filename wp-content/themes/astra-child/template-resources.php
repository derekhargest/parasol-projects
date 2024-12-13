<?php

/**
 * Template Name: Resource Landing Page
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

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>
		<div class="gradient-background">
		<div class="landing-page-content">
			
		
			<?php
        $posts = get_posts(array(
'numberposts'   => 6,
'post_type'     => 'post',
 ));
			
    ?>
<div class="space-container">
		<h3 class="wp-block-heading has-text-align-left section-title">Top resources</h3>
		<div class="wp-block-uagb-post-grid uagb-post-grid space-carousel">			
					<div id="resource-carousel" class="owl-carousel">
		<?php
if($posts)
{
	
    foreach($posts as $post)
    {
		$categories = get_the_category();
        echo '<div class="feature-space">
				<a href="' . get_permalink($post->ID) . '">
					<div class="item resource-item">
						<div class="resource-img">
						<img class="resources_image" src="' . wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) . '"/>
						</div>
						<div class="resource-content">
						<p class="resource-category">' . esc_html( $categories[0]->name ) .'</p>
						
						<h3>' . get_the_title($post->ID) . '</h3>
						<p>' . apply_filters( 'the_excerpt', get_the_excerpt() ) . '</p>
						</div>
			
					</div>
				</a>
			</div>';
    }

}
		?>
						</div>
		</div>
			
			</div>
			
			<div class="resource-container">
			<h3 class="wp-block-heading has-text-align-left section-title">All resources</h3>
		<div><?php echo do_shortcode('[searchandfilter id="11430"]'); ?></div>
		<div><?php echo do_shortcode('[custom-layout id="11433"]'); ?></div>
			
			</div>
			
			</div>
		</div>
	

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
