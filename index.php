<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/app.css" />
    <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/manifest.php" />

    <!-- These meta is only for control frontend technolozy. -->

<?php
global $wp_query;
$object = get_queried_object();
$requestedTo = new stdClass();
if ($object->taxonomy) {
    $requestedTo->id = $object->term_id;
    $requestedTo->render = $object->taxonomy;
} else if ($object->post_type) {
    $requestedTo->id = $object->ID;
    $requestedTo->render = $object->post_type;
} else {
    if ($wp_query->query_vars['day'] || $wp_query->query_vars['day'] || $wp_query->query_vars['day'] > 0) {
        $requestedTo->render = 'archive';
        $requestedTo->day = $wp_query->query_vars['day'];
        $requestedTo->month = $wp_query->query_vars['monthnum'];
        $requestedTo->year = $wp_query->query_vars['year'];
    } else {
        if ($_SERVER['REQUEST_URI'] == parse_url(site_url('/'), PHP_URL_PATH)) {
            $requestedTo->render = 'home';
        } else {
            $requestedTo->render = 'default';
        }
    }
}
?>

<meta name="siteUrl" content="<?php echo parse_url(site_url(), PHP_URL_PATH); ?>" />
<meta name="render" content="<?php echo $requestedTo->render; ?>" />
<meta name="id" content="<?php echo $requestedTo->id; ?>" />
<meta name="day" content="<?php echo $requestedTo->day; ?>" />
<meta name="month" content="<?php echo $requestedTo->month; ?>" />
<meta name="year" content="<?php echo $requestedTo->year; ?>" />


    <!--  End frontend technolozy meta. -->

    <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <noscript>You must enable javascript to visit the website</noscript>

    <div id="root"></div>

    <script src="<?php bloginfo('template_directory'); ?>/assets/js/app.js"></script>
    <?php wp_footer(); ?>

</body>

</html>
