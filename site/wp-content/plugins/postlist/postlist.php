<?php

/**
 * Plugin Name: Postlist
 * Author: Hervé Inisan
 * Version: 1.0
 * Description: A postlist plugin
 */
add_shortcode('postlist', 'shortcode_postlist');

function shortcode_postlist($userAttributes)
{
    global $wpdb;

    $defaultAttributes = ["max" => 3];

    $finalAttributes = shortcode_atts($defaultAttributes, $userAttributes);

    extract($finalAttributes);

    $sql = "SELECT * FROM wp_posts WHERE post_type = 'post' LIMIT $max";

    $result = $wpdb->get_results($sql);

    $text = "<h3>Article Récents</h3><ul>";

    foreach ($result as $post) {
        $title = $post->post_title;
        $link = get_permalink($post->ID);
        $text = $text . "<li><a href='$link'>$title</a></li>";
    }

    return $text . "</ul>";
}
