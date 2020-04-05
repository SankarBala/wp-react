{
  "name": "<?php  ?>",
  "short_name": "Weather",
  "icons": [{
    "src": "<?php echo dirname($_SERVER['PHP_SELF']).'/assets/images/icons/icon-128x128.png';?>",
      "sizes": "128x128",
      "type": "image/png"
    }, {
      "src": "<?php echo dirname($_SERVER['PHP_SELF']).'/assets/images/icons/icon-144x144.png';?>",
      "sizes": "144x144",
      "type": "image/png"
    }, {
      "src": "<?php echo dirname($_SERVER['PHP_SELF']).'/assets/images/icons/icon-152x152.png';?>",
      "sizes": "152x152",
      "type": "image/png"
    }, {
      "src": "<?php echo dirname($_SERVER['PHP_SELF']).'/assets/images/icons/icon-192x192.png';?>",
      "sizes": "192x192",
      "type": "image/png"
    }, {
      "src": "<?php echo dirname($_SERVER['PHP_SELF']).'/assets/images/icons/icon-256x256.png';?>",
      "sizes": "256x256",
      "type": "image/png"
    }, {
      "src": "<?php echo dirname($_SERVER['PHP_SELF']).'/assets/images/icons/icon-512x512.png';?>",
      "sizes": "512x512",
      "type": "image/png"
    }],
  "start_url": "<?php echo substr(dirname($_SERVER['PHP_SELF']), 0, strrpos(dirname($_SERVER['PHP_SELF']),"/wp-content/themes/"));?>",
  "display": "standalone",
  "background_color": "#ff0000",
  "theme_color": "#2F3BA2"
}
