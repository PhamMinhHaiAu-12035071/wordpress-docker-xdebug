<?php
function universityFiles(): void
{
    wp_enqueue_script(
        "main_university_js",
        get_theme_file_uri("/build/index.js"),
        array("jquery"),
        "1.0",
        true
    );
    wp_enqueue_style(
        "custom_google_fonts",
        "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700|Roboto:100,300,400,400i,500,700"
    );
    wp_enqueue_style("font_awesome", "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_style("university_main_styles", get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style("university_extra_styles", get_theme_file_uri('/build/index.css'));
}

add_action("wp_enqueue_scripts", "universityFiles");

function universityFeatures(): void
{
    register_nav_menu("headerMenuLocation", "Header Menu Location");
    register_nav_menu("footerLocationOne", "Footer Location One");
    register_nav_menu("footerLocationTwo", "Footer Location Two");
    add_theme_support("title-tag");
}

add_action("after_setup_theme", "universityFeatures");

function universityAdjustQueries(WP_Query $query): void
{
    if (!is_admin() && is_post_type_archive("seminar") && $query->is_main_query()) {
        $query->set("orderby", "meta_value_num");
        $query->set("order", "ASC");
        $query->set("meta_key", "event_date");
        $query->set("meta_query", array(
            array(
                "key" => "event_date",
                "compare" => ">=",
                "value" => date("Ymd"),
                "type" => "numeric"
            )
        ));
    }
}
add_action("pre_get_posts", "universityAdjustQueries");
