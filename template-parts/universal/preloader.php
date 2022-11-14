<div class="my-preloader">
	<div class="preloader-content">
        <img src="<?php
		
		$custom_logo_url = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
		
		echo $custom_logo_url;

		?>">
	</div>
</div>