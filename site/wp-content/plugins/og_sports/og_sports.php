<?php

/**
 * Plugin Name: Olympics Sports ShortCodes
 * Author: Hervé Inisan
 * Version: 1.0.0
 * Description: Divers shortcodes pour l'affichage de sports olympique
 */
add_shortcode('sport_simple', 'shortcode_sport_simple');
add_shortcode('sport_card', 'shortcode_sport_card');
add_shortcode('sports_all', 'shortcode_sports_all');

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

function shortcode_sports_all($userAttributes)
{
    global $wpdb;

    $defaultAttributes = [
        "limit" => 10
    ];

    $finalAttributes = shortcode_atts($defaultAttributes, $userAttributes);

    extract($finalAttributes);

    $sql = "SELECT * FROM `wp_sports` LIMIT $limit";

    $result = $wpdb->get_results($sql);

    $text = '<div class="row row-cols-1 row-cols-md-2 g-4">';
    foreach ($result as $sport) {
        $text = $text . <<< HTML
        <div class="card w-45 m-4" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">$sport->name</h5>
                <p class="card-text">$sport->summary</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ORIGINE: $sport->origin</li>
                <li class="list-group-item">PERIODE: $sport->period</li>
                <li class="list-group-item">INVENTEUR: $sport->inventor</li>
            </ul>
            <div class="card-body">
                <a href='#' class='btn btn-primary'>Detail</a>
            </div>
        </div>
        HTML;
    }

    $text = $text . "</div>";

    return $text;
}
