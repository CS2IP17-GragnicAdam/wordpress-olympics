<?php

/**
 * Plugin Name: Paths
 * Author: Hervé Inisan
 * Version: 1.0
 * Description: A path plugin
 */
add_shortcode('paths', 'shortcode_paths');

function shortcode_paths()
{
    $home_url = home_url();
    $plugins_url = plugins_url();
    $plugins_path = plugin_dir_path(__FILE__);
    $plugins_dir_path = plugin_dir_url(__FILE__);
    $plugin_basename = plugin_basename(__FILE__);
    $wp_var = wp_upload_dir();
    $path = $wp_var['path'];
    $url = $wp_var['url'];
    $subdir = $wp_var['subdir'];
    $basedir = $wp_var['basedir'];
    $baseurl = $wp_var['baseurl'];
    $error = $wp_var['error'];
    return <<< HTML
        <h2>Bienvenue chez kayak</h2>
        <h5>Accueil</h5>
        <p>$home_url</p>
        <h5>Url des plugins</h5>
        <p>$plugins_url</p>
        <h5>Chemin du plugin</h5>
        <p>$plugins_path</p>
        <h5>Url du plugin</h5>
        <p>$plugins_dir_path</p>
        <h5>Ficher principal du plugin</h5>
        <p>$plugin_basename</p>
        <h5>Dossier des uploads</h5>
        <p>-> path = $path</p>
        <p>-> url = $url</p>
        <p>-> subdir = $subdir</p>
        <p>-> basedir = $basedir</p>
        <p>-> baseurl = $baseurl</p>
        <p>-> error = $error</p>
    HTML;
}
