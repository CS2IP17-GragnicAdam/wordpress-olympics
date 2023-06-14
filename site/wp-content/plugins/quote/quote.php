<?php

/**
 * Plugin Name: Quote
 * Author: Hervé Inisan
 * Version: 1.0
 * Description: A quote plugin
 */
add_shortcode('quote', 'shortcode_quote');

function shortcode_quote()
{
    $quotes = [
        "L'Abbée Noir",
        "L'Abbée Tonnierre",
        "L'Abbée Chamèle",
        "L'Abbée Vitré",
        "L'Abbée Ration",
        "L'Abbée Cédaire",
        "L'Abbée BOUUUUUUUUUUUUUUUUUUU",
    ];
    return $quotes[rand(0, count($quotes) - 1)];
}
