<?php

/**
 * Template Name: About
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
	
	<?php $header_image = get_field( 'header_image' ); ?>
<?php if ( $header_image ) : ?>
	<img loading="lazy" src="<?php echo esc_url( $header_image['url'] ); ?>" alt="<?php echo esc_attr( $header_image['alt'] ); ?>" class="wp-block-cover__image-background wp-post-image" alt="" decoding="async" data-object-fit="cover">
	<?php endif; ?>
	<div class="wp-block-cover__inner-container">
	<h4><?php the_field( 'headline' ); ?></h4>
</div></div>
<div class="pop-up-content">
	<div class="pop-up-left">
	
		<?php the_content(); ?>
		</div>
		<div class="pop-up-right">
			<div class="inherit-container-width wp-block-group info-box is-layout-constrained" style="border-style:none;border-width:0px;border-radius:9px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
<h4 class="wp-block-heading"><?php echo get_the_title(); ?></h4>
<ul class="wp-block-social-links has-visible-labels has-icon-color is-style-logos-only is-vertical is-nowrap is-layout-flex wp-container-5">
	<li style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-instagram wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="https://www.instagram.com/<?php the_field( 'instagram_username' ); ?>" class="wp-block-social-link-anchor"><i class="fa fa-instagram"></i><span class="wp-block-social-link-label">@<?php the_field( 'instagram_username' ); ?></span></a></li>

	<li style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-linkedin wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="https://www.linkedin.com/company/<?php the_field( 'linkedin_username' ); ?>" class="wp-block-social-link-anchor"><i class="fa fa-linkedin"></i><span class="wp-block-social-link-label">@<?php the_field( 'linkedin_username' ); ?></span></a></li>
<li style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-facebook wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="https://www.facebook.com/<?php the_field( 'facebook_username' ); ?>" class="wp-block-social-link-anchor"><i class="fa fa-facebook"></i><span class="wp-block-social-link-label">@<?php the_field( 'facebook_username' ); ?></span></a></li></ul>
<p>Tel: <?php the_field( 'telephone_number' ); ?></p>
<p><a href="mailto:<?php the_field( 'email_address' ); ?>"><?php the_field( 'email_address' ); ?></a></p>
<p><?php the_field( 'address' ); ?></p>
</div>
</div>	
		</div>
	</div>
			</div>
	</div><!-- #primary -->
<div class="staff-container">
	<div class="staff-inner">
				<h4>Meet your dedicated team of professionals.</h4>
				<div class="staff-boxes">
			<?php if ( have_rows( 'staff' ) ) : ?>
	<?php while ( have_rows( 'staff' ) ) : the_row(); ?>
				<div class="staff">
					<div class="staff-text">
	<p class="staff-name">	<?php the_sub_field( 'name' ); ?></p>
		<p class="staff-position"><?php the_sub_field( 'position' ); ?></p>
	<p>	<?php the_sub_field( 'bio' ); ?></p>
						
						<?php if ( have_rows( 'social_links' ) ) : ?>
			<?php while ( have_rows( 'social_links' ) ) : the_row(); ?>
							<div style="color: var(--ast-global-color-0); " class="wp-social-link wp-social-link-<?php the_sub_field( 'social_network' ); ?> wp-block-social-link"><a rel=" noopener nofollow" target="_blank" href="<?php the_sub_field( 'url' ); ?>" class="wp-block-social-link-anchor"><i class="fa fa-<?php the_sub_field( 'social_network' ); ?>"></i></a></div>
			<?php endwhile; ?>
		<?php else : ?>
			<?php // No rows found ?>
		<?php endif; ?>
					</div>
						<div class="staff-photo"><?php $photo = get_sub_field( 'photo' ); ?>
		<?php if ( $photo ) : ?>
			<img src="<?php echo esc_url( $photo['url'] ); ?>" alt="<?php echo esc_attr( $photo['alt'] ); ?>" />
		<?php endif; ?></div>
				</div>
	<?php endwhile; ?>
<?php else : ?>
	<?php // No rows found ?>
<?php endif; ?>
					</div>
	</div>
			</div>

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
