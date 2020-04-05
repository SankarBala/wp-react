<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/app.css"/>
	<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/manifest.php"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<noscript>You must enable javascript to visit the website</noscript>
	<div id="root"></div>
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/app.js"></script>
	<?php wp_footer(); ?>


	<!-- Register service worker -->
	<script>
		if ("serviceWorker" in navigator) {
      window.addEventListener("load", function() {
        navigator.serviceWorker
          .register("<?php echo bloginfo('template_directory').'/serviceWorker.js';?>")
      });
    }
	</script>
  
</body>
</html>