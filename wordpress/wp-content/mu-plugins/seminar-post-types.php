<?php
function seminarPostTypes(): void
{
    register_post_type("seminar", array(
        "show_in_rest" => true,
        "supports" => array("title", "editor", "excerpt"),
        "rewrite" => array("slug" => "seminars"),
        "has_archive" => true,
        "public" => true,
        "labels" => array(
            "name" => "Seminars",
            "add_new_item" => "Add New Seminar",
            "edit_item" => "Edit Seminar",
            "all_items" => "All Seminars",
            "singular_name" => "Seminar"
        ),
        "menu_icon" => "dashicons-welcome-learn-more"
    ));
}
add_action("init", "seminarPostTypes");
