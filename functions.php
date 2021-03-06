<?php

function university_files() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'university_files');

function tema_features () {
	register_nav_menu("headerMenuLocation", "Header Menu");
	register_nav_menu("footerLocation1", "Footer Menu 1");
	register_nav_menu("footerLocation2", "Footer Menu 2");
	add_theme_support("title-tag");
}

add_action("after_setup_theme" , "tema_features");

function tema_ajust_queries($query) {

	if (!is_admin() AND is_post_type_archive("Programas") AND $query->is_main_query()) {
		$query->set("orderby", "title");
		$query->set("order", "ASC");
		$query->set("posts_per_page", -1);
	}

	if (!is_admin() AND is_post_type_archive("Eventos") AND $query->is_main_query()){
		$hoje = date("Ymd");
		$query->set("meta_key", "event_date");
		$query->set("orderby", "meta_value_num");
		$query->set("order", "ASC");
		$query->set("meta_query", array(
                array(
                  "key" => "dia_do_evento",
                  "compare" => ">=",
                  "value" => $hoje,
                  "type" => "numeric"
                )
              ));
	}
}
add_action("pre_get_posts", "tema_ajust_queries");