<div class="modal-header"> <button class="close" type="button" data-dismiss="modal">×</button> </div>
					<?php if ( have_rows( 'address' ) ) : ?>
	<?php while ( have_rows( 'address' ) ) : the_row(); ?>
			<div class="copy-block">
			<div>
			<p id="space-address"><?php echo get_sub_field( 'address_1' ); ?>, <?php echo get_sub_field( 'city' ); ?>, <?php echo get_sub_field( 'state' ); ?>, <?php echo get_sub_field( 'zip' ); ?></p>
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
			PARASOL <?php echo get_field( 'book_now_form', 'option' ); ?>

<div id="modal" class="modal" style="display:none;">
  <h1><?php echo get_field('pop-up_title', 'option') ?></h1>
  <p><?php echo get_field('pop-up_text', 'option') ?></p>
  
  <?php if (get_field('pop-up_link', 'option')) { ?>
   <div id="modal-link">
    <a href="<?php echo get_field('pop-up_link', 'option')?>" class="modal-more">Find Out More</a>
   </div><!-- #modal-link -->
  <?php } ?>
</div>