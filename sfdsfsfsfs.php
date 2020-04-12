<?php


$object = get_queried_object();

     var_dump($object);

     echo '<hr>';

global $wp_query;


    var_dump($wp_query->query_vars);

?>


class std {
    
    $requestedTo->id = $object->term_id ? $object->term_id : $object->ID;
    $requestedTo->post_type = $object->post_type ? $object->post_type : null;
    $requestedTo->post_mime_type = $object->post_mime_type ? $object->post_mime_type : null;
    $requestedTo->taxonomy = $object->taxonomy ? $object->taxonomy : null;
    $requestedTo->day = $wp_query->query_vars['day'] !== 0 ? $wp_query->query_vars['day'] : null;
    $requestedTo->month = $wp_query->query_vars['monthnum'] !== 0 ? $wp_query->query_vars['monthnum'] : null;
    $requestedTo->year = $wp_query->query_vars['year'] !== 0 ? $wp_query->query_vars['year'] : null;
    $requestedTo->error = $wp_query->query_vars['error'];
    

}

$requestedTo = new std();