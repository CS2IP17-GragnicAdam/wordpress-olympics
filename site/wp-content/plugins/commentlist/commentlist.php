<?php

/**
 * Plugin Name: Commentlist
 * Author: Hervé Inisan
 * Version: 1.0
 * Description: A commentlist plugin
 */
add_shortcode('commentlist', 'shortcode_commentlist');

function shortcode_commentlist($userAttributes)
{
    global $wpdb;

    $defaultAttributes = ["max" => 3];

    $finalAttributes = shortcode_atts($defaultAttributes, $userAttributes);

    extract($finalAttributes);

    $sql = "SELECT * FROM wp_comments LEFT JOIN wp_posts ON comment_post_ID = ID WHERE comment_type = 'comment' LIMIT $max";

    $result = $wpdb->get_results($sql);

    var_dump($result[0]);

    $text = "<h3>Commentaires Récents</h3><ul>";

    foreach ($result as $post) {
        $link = get_permalink($post->comment_post_ID);
        $text = $text . "<li>
            Posté par <strong>$post->comment_author</strong> sur : <a href='$link'>$post->post_title</a><br/>
            $post->comment_content
        </li>";
    }

    return $text . "</ul>";
}
