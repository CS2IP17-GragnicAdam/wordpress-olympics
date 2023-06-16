<?php

/**
 * Plugin Name: Olympics Sports ShortCodes
 * Author: Hervé Inisan
 * Version: 1.0.0
 * Description: Divers shortcodes pour l'affichage de sports olympique
 */
add_shortcode('sport_simple', 'shortcode_sport_simple');
add_shortcode('sport_card', 'shortcode_sport_card');

function shortcode_sport_simple($userAttributes)
{
    $defaultAttributes = [
        "name" => "Indéfini",
        "origin" => "Inconnue",
        "inventor" => "Inconnue",
        "period" => "Inconnue"
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

function shortcode_sport_card($userAttributes)
{
    $defaultAttributes = [
        "name" => "Indéfini",
        "photo" => "",
        "summary" => ""
    ];

    $finalAttributes = shortcode_atts($defaultAttributes, $userAttributes);

    extract($finalAttributes);

    $image_path = plugin_dir_url(__DIR__) . "img/$photo";

    $text = "<div class='card' style='width: 18rem;'>";
    if ($photo != "") {
        $text = $text . "<img src='$image_path' class='card-img-top' alt='...'>";
    }
    $text = $text . "<div class='card-body'><h5 class='card-title'>$name</h5>";
    if ($summary != "") {
        $text = $text . "<p class='card-text'>$summary</p>";
    }
    $text = $text . "<a href='#' class='btn btn-primary'>Detail</a></div></div>";
    return $text;
}
