<?php

/**
 * Plugin Name: Helo World
 * Author: Hervé Inisan
 * Version: 1.0
 * Description: A minimal plugin
 */

add_filter('the_title', 'title_listener');
add_filter('the_content', 'content_listener');

function title_listener($title)
{
    return strtoupper($title);
}

function content_listener($content)
{
    return strtolower($content);
}
