<?php

/**
 * Plugin Name: Olympics Sports ShortCodes
 * Author: Hervé Inisan
 * Version: 1.0.0
 * Description: Divers shortcodes pour l'affichage de sports olympique
 */
add_shortcode('sport_simple', 'shortcode_sport_simple');

function shortcode_sport_simple($userAttributes)
{
    $defaultAttributes = [
        "name" => "Basketball",
        "origin" => "Massachussetts (USA)",
        "inventor" => "James W. Naismith",
        "period" => "1891"
    ];

    $finalAttributes = shortcode_atts($defaultAttributes, $userAttributes);

    extract($finalAttributes);

    return <<< HTML
        <div class="">
            <h3>$name</h3>
            <p>Origine : <strong>$origin</strong></p>
            <p>Inventeur : <strong>$inventor</strong></p>
            <p>Période : <strong>$period</strong></p>
        </div>
    HTML;
}
