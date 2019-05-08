<?php

    function pageBanner($args)
    {
        if (! $args['title']) {
            $args['title'] =  get_the_title();
        }
        
        if (! $args['subtitle']) {
            $args['subtitle'] =  get_field('page_banner_subtitle');
        }
        
        if (! $args['photo']) {
            if (get_field('page_banner_background_image')) {
                $args['photo']=get_field('page_banner_background_image')['sizes']['pageBanner'];
            } else {
                $args['photo']=get_theme_file_uri('/images/ocean.jpg');
            }
        } ?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php  echo $args['photo']  ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo $args['title'] ?>
        </h1>
        <div class="page-banner__intro">
            <p><?php  echo $args['subtitle']  ?>
            </p>
        </div>
    </div>
</div>
<?php
    }


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
        add_theme_support('post-thumbnails');
        add_image_size('professorLandscape', 400, 260, true);
        add_image_size('professorPortrait', 480, 650, true);
        add_image_size('pageBanner', 1500, 350, true);
    };
    add_action("after_setup_theme", "theme_features");



    function university_adjust_queries($query)
    {
        if (!is_admin() && is_post_type_archive('program') && $query ->is_main_query()) {
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
            $query->set('posts_per_page', '-1');
        }
        if (!is_admin() && is_post_type_archive('event') && $query ->is_main_query()) {
            $today = date('Ymd');

            $query->set('meta_key', 'event_date');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'ASC');
            $query->set('meta_query', array(
                array(
                            'key' => 'event_date',
                            'compare' => '>=',
                            'value' => $today,
                            'type' => 'numeric'
                        )
                ));
        }
    }

    add_action('pre_get_posts', 'university_adjust_queries');
    function universityMapKey($api)
    {
        $api['key']='ABQIAAAAvZMU4-DFRYtw1UlTj_zc6hT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQcT1h-VA8wQL5JBdsM5JWeJpukvw ';
        return $api;
    }

    add_filter('acf/fields/google-map/api', 'universityMapKey');
