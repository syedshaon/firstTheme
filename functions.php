<?php


    function theme_files()
    {
        wp_enqueue_script("mainJS", get_theme_file_uri('/js/scripts-bundled.js'), null, microtime(), true);
        wp_enqueue_style("googleFont", "//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i
");
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
');
        wp_enqueue_style("main", get_stylesheet_uri(), null, microtime());
    }




    add_action("wp_enqueue_scripts", "theme_files");

    function theme_features()
    {
        register_nav_menu("headerMenu", "Header Menu Location");
        register_nav_menu("footerMenu1", "Footer Menu 1");
        register_nav_menu("footerMenu2", "Footer Menu 2");


        //This function below show title of page in browser's nav bar
        add_theme_support("title-tag");
    };
    add_action("after_setup_theme", "theme_features");

    // Section below is to create custom posts type
 
    /**
     * Register a custom post type
     *
     * Supplied is a "reasonable" list of defaults
     *  register_post_type for full list of options for register_post_type
     *  add_post_type_support for full descriptions of 'supports' options
     *  get_post_type_capabilities for full list of available fine grained capabilities that are supported
     */


    function university_post_types()
    {
        register_post_type('event', array(
            'public' => true,
            'rewrite' => array('slug'=>'event'),
            'hierarchical' => true,
            'has_archive' => true,
            'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 7,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'page',
            'labels' => array(
                'name' => 'Events',
                 'add_new_item' => "Add New Event",
                 'edit_item' => "Edit Event",
                 "all_items" => "All Events",
                 "singular_name" => "Event"
            ),
            'menu_icon'=>'dashicons-calendar',
            'supports' => array( 'title', 'editor','comments', 'revisions','author', 'excerpt'  )

        ));
    }


    add_action("init", "university_post_types");
