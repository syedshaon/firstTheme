<?php get_header();
pageBanner(array(
            'title'=> "Past Events!",
            'subtitle' => "A recap of our past events.",
            'photo' => ""
        ));


?>

<div class="container container--narrow page-section">
    <?php
         $today = date('Ymd');
                $pastEventPosts = new WP_Query(array(
                    'paged' => get_query_var('paged', 1),
                    'posts_per_page' => 10, //Not required
                    'post_type' => 'event',
                    'ignore_sticky_posts' => true,
                    'meta_key' => 'event_date',
                    'orderby'=> 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_date',
                            'compare' => '<',
                            'value' => $today,
                            'type' => 'numeric'
                        )
                    )

                ));



        while ($pastEventPosts->have_posts()) {
            $pastEventPosts->the_post();
            get_template_part('template-parts/content', get_post_type());
        }
        echo paginate_links(array(
            'total'=> $pastEventPosts->max_num_pages
        ));
    ?>

</div>


<?php get_footer();
