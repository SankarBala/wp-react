<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/app.css"/>
	<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/manifest.php"/>

        
    <!-- These meta is only for control frontend technolozy. -->
    <meta name="siteUrl" content="<?php echo parse_url(site_url(), PHP_URL_PATH);?>"/>
    <meta name="object" content="page"/>
    <meta name="objectId" content=""/>
    <!--  End frontend technolozy meta. -->




    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<?php

global $wp_query;
$object = get_queried_object();

$requestedTo = new stdClass();

if($object->taxonomy){

    $requestedTo->id = $object->term_id;
    $requestedTo->rander = $object->taxonomy;
    
} else if ($object->post_type ) {
    
    $requestedTo->id = $object->ID;
    $requestedTo->rander = $object->post_type;
    if($object->post_type === 'attachment') {
        $requestedTo->post_mime_type = $object->post_mime_type ? $object->post_mime_type : null;
    }
    
}  else {
    
     if ($wp_query->query_vars['day'] || $wp_query->query_vars['day'] || $wp_query->query_vars['day'] > 0){
        
        $requestedTo->rander = 'archive';
        $requestedTo->day = $wp_query->query_vars['day'];
        $requestedTo->month = $wp_query->query_vars['monthnum'];
        $requestedTo->year = $wp_query->query_vars['year'];
    } else {

        $requestedTo->render = 'home';
    }
    
}



    $requestedTo->error = $wp_query->query_vars['error'];
    
     
var_dump($requestedTo);
echo '<br>';
var_dump($wp_query->query_vars);


?>

<noscript>You must enable javascript to visit the website</noscript>

<div id="root"></div>
	<script src="<?php bloginfo('template_directory'); ?>/assets/js/app.js"></script>
    <?php wp_footer(); ?>

</body>
</html>