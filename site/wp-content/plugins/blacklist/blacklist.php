<?php

/**
 * Plugin Name: Blacklist
 * Author: Hervé Inisan
 * Version: 1.0
 * Description: A blacklist plugin
 */

add_filter('the_title', 'content_listener');
add_filter('the_content', 'content_listener');

function content_listener($content)
{
    $banWords = ["/PHP/", "/Java/", "/PostgreSQL/", "/Postgres/", "/.NET/", "/Kotlin/", "/WordPress/"];
    $banWordReplace = [];
    foreach ($banWords as $word) {
        $bite = str_replace('/', '', $word);
        array_push($banWordReplace, "<span style='text-decoration:line-through;'>$bite</span>");
    }
    return preg_replace($banWords, $banWordReplace, $content);
}
