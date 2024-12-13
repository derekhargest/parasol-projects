<div class="modal-header"> <button class="close" type="button" data-dismiss="modal">×</button> </div>
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
			PARASOL <?php the_field( 'book_now_form', 'option' ); ?>