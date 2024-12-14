<?php

/**
 * Template Name: Pop Up Landing Page
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
    $('.modal-body').load('/modal/enquire/',function(){
        $('#enquire-modal').modal({show:true});
    });
});
			});

jQuery(document).ready(function($){
$('.membership-button').on('click',function(){
    $('.modal-body').load('/modal/become-a-member/',function(){
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
	
	<script>
		jQuery(document).ready(function($){
$('.pop-up-button').on('click',function(){
        $('#myModal').modal({show:true});
});
			});
</script>
	

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

<?php endif; ?>

	<div id="primary" class="<?php astra_primary_class(); ?>">
		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>
		
		<?php if (wp_is_mobile()) : ?>
<div id="mobile-filter-box" class="off-canvas">
    <div class="off-canvas-content">
        <button id="close-filter-box" class="close-btn">×</button>
        <h4>FILTERS</h4> 
        <?php echo do_shortcode('[searchandfilter id="11506"]'); ?>
        <button id="done-button" class="done-btn">Update</button>
    </div>
</div>
<?php endif; ?>


<?php if (astra_page_layout() == "right-sidebar"): ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
