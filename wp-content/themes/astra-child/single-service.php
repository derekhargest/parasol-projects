<?php

/**
 * Template Name: Service
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
		<div class="pop-up-content service-body">
			<div class="pop-up-left">
				<div class="service-left">
					<div class="inherit-container-width wp-block-group info-box service-menu-box is-layout-constrained"
						style="border-style:none;border-width:0px;border-radius:9px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px; margin-bottom: 40px;">
						<h4>Our Services</h4>
						<?php
						$currentID = get_the_ID();
						$my_query  = new WP_Query(
							array(
								'post_type' => 'service',
								'showposts' => '10',
								''          => array(
									$currentID,
								),
							)
						);
						while ( $my_query->have_posts() ) :
							$my_query->the_post();
							?>
						<a class="service-link" href="<?php the_permalink(); ?>">
							<div class="service-menu-item 
								<?php
								if ( get_the_ID() == $currentID ) :
									?>
								active<?php endif; ?>">
							<?php the_title(); ?>
							</div>
						</a>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</div>
					<?php $banner_image = get_field( 'banner_image' ); ?>

					<div class="inherit-container-width wp-block-group info-box is-layout-constrained service-contact"
						style=" background-size: cover; background-color: rgba(22, 86, 86, 0.9); background-repeat: no-repeat; border-style:none;border-width:0px;border-radius:9px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px; 
						<?php
						if ( $banner_image ) {
							echo 'background-image: linear-gradient(rgba(22, 86, 86, 0.8), rgba(22, 86, 86, 0.8)), url(' . esc_url( $banner_image['url'] ) . ');'; }
						?>
					">

						<?php if ( have_rows( 'sidebar' ) ) : ?>
							<?php
							while ( have_rows( 'sidebar' ) ) :
								the_row();
								?>
						<h4><?php echo get_sub_field( 'sidebar_headline' ); ?></h4>
						<p><?php echo get_sub_field( 'sidebar_text' ); ?></p>
						<div class="wp-block-button"><a
								class="wp-block-button__link has-text-align-center wp-element-button"
								href="#service-enquire-modal" data-toggle="modal">Enquire now </a></div>
						<div class="service-contact-detail">
							<ul>
								<li><i class="fa fa-phone"></i><a
										href="tel:<?php echo get_field( 'service_phone' ); ?>"><?php echo get_field( 'service_phone' ); ?></a>
								</li>
								<li><i class="fa-solid fa-envelope"></i></i><a
										href="mailto:<?php echo get_field( 'service_email' ); ?>"><?php echo get_field( 'service_email' ); ?></a>
								</li>
							</ul>
						</div>
						<div id="service-enquire-modal" class="modal" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header"> <button class="close" type="button"
											data-dismiss="modal">×</button> </div>
									<div class="embed-form-modal">
										<?php echo get_sub_field( 'embed_code_enquire_now_button' ); ?></div>

								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					</div>
					<?php endwhile; ?>
					<?php endif; ?>


				</div>
			</div>
			<div class="pop-up-right">
				<div class="wp-block-cover alignfull">
					<span aria-hidden="true" class="wp-block-cover__background"></span>

					<?php $header_image = get_field( 'banner_image' ); ?>
					<?php if ( $header_image ) : ?>
					<img loading="lazy" src="<?php echo esc_url( $header_image['url'] ); ?>"
						alt="<?php echo esc_attr( $header_image['alt'] ); ?>"
						class="wp-block-cover__image-background wp-post-image" alt="" decoding="async"
						data-object-fit="cover">
					<?php endif; ?>
				</div>
				<?php echo get_field( 'about' ); ?>
				<?php the_content(); ?>
			</div>

		</div>

	</div>


</div>

<!-- #primary -->



<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>




<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
</div> <!-- ast-container -->
</div><!-- #content -->

<div class="sticky-block"></div>
<?php if ( have_rows( 'product_block' ) ) : ?>
	<?php
	while ( have_rows( 'product_block' ) ) :
		the_row();
		?>
<div class="product-block">
	<div class='product-page-wrapper'>
		<div class='product-row'>
			<div class='product-column'>
				<div class='product-left-column'>


					<div id="product-slider" class="owl-carousel owl-theme" data-slider-id="1">
				<?php $service_product_images = get_sub_field( 'product_gallery' ); ?>
				<?php if ( $service_product_images ) : ?>
						<?php foreach ( $service_product_images as $service_product_image ) : ?>
						<div class="item">

							<img src="<?php echo esc_url( $service_product_image['sizes']['large'] ); ?>" alt="zoom"
								class="alignleft size-medium wp-image-7000"
								alt="<?php echo esc_attr( $service_product_image['alt'] ); ?>" />


						</div>
						<?php endforeach; ?>
						<?php endif; ?>
					</div>



				</div>
			</div>
			<div class='product-column'>
				<div class='product-right-column'>

					<h2 class="product-title"><?php the_sub_field( 'product_name' ); ?></h2>
					<p><?php the_sub_field( 'product_description' ); ?></p>
					<h3 class="product-price"><?php the_sub_field( 'pricing_info' ); ?></h3>

					<div class="accordion wp-block-acf-accordion">
				<?php if ( have_rows( 'features_dropdowns' ) ) : ?>
						<?php
						while ( have_rows( 'features_dropdowns' ) ) :
							the_row();
							?>
						<button class="accordion-header" type="button" id="tab0-1" aria-expanded="false"
							aria-controls="panel0-1">
							<span class="accordion-title"><?php the_sub_field( 'accordion_title' ); ?><span
									class="accordion-icon"></span>
							</span>
						</button>
						<div class="accordion-content" id="panel0-0" aria-hidden="true" aria-labelledby="tab0-0">
							<?php the_sub_field( 'dropdown_text' ); ?>


						</div>
						<?php endwhile; ?>
						<?php else : ?>
							<?php // No rows found ?>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>



		<?php endwhile; ?>
		<?php else : ?>
			<?php // No rows found ?>
		<?php endif; ?>
	</div>
	<?php
	astra_content_after();

	astra_footer_before();

	astra_footer();

	astra_footer_after();
	?>
</div><!-- #page -->
<?php
	astra_body_bottom();
	wp_footer();
?>
</body>

</html>