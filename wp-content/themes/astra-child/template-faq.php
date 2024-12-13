<?php

/**
 * Template Name: FAQ
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
		
		<?php

$posts = get_posts(array(
    'numberposts' => 10,
    'post_type' => 'faq',
));

if($posts)
{
    echo '<div>';

    foreach($posts as $post)
    {
        echo '<h3>' . get_field('question') . '</h3>';
		echo '<div>' . get_field('answer') . '</div>';
    }

    echo '</div>';
}

?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>