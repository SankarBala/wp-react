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
          .register("serviceWorker.js")
         
      });
    }
	</script>
	    <p id="nstatus"></p>
    <script>
        Notification.requestPermission(
            function (status) {
                console.log('Notification ermission status:', status);
            });

        document.getElementById('nstatus').innerHTML = Notification.permission;

        var option = {
            body: "This is body",
            icon: "favicon.ico",
            vibrate: [1000, 500, 1000],
            data: { primayKey: 1 },
            actions: [
                { action: 'explore', title: 'got the site', icon: '/photo.jpg' },
                { action: 'close', title: 'no thanks', icon: '/photo.jpg' },
            ]
        };

        if (Notification.permission === 'granted') {
            navigator.serviceWorker.getRegistration().then(function (reg) {
                reg.showNotification('Hello world!', option);
            });
        }

    </script>
  
</body>
</html>