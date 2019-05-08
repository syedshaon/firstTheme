<?php get_header();?>



<?php
    while (have_posts()) {
        the_post();
        pageBanner(array(
            'title'=> "",
            'subtitle' => "",
            'photo' => ""
        )); ?>


<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link"
                href="<?php  echo get_post_type_archive_link('program'); ?>"><i
                    class="fa fa-home" aria-hidden="true"></i> All Programs</a>
            <span class="metabox__main">Postede by <?php the_author_posts_link() ?> on <?php the_time('d.M.Y') ?> in <?php echo get_the_category_list(", ") ?></span>
        </p>
    </div>
    <div class="generic-content">
        <?php the_content(); ?>
    </div>

    <?php

             //Related Professors
        $relatedProfessors = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'professor',
                    'ignore_sticky_posts' => true,
                    'orderby'=> 'title',
                    'order' => 'ASC',
                    'meta_query' => array(

                        array(
                            'key' => 'related_programs',
                            'compare' => 'LIKE',
                            'value'  => '"'.get_the_ID().'"'
                        )
                    )

                ));
        if ($relatedProfessors->have_posts()) {
            echo '<hr class="section-break">';
            echo'<h2 class="headline headline--medium"> '.get_the_title().' Professors</h2>';

            echo '<ul class="professor-cards">';
            while ($relatedProfessors->have_posts()) {
                $relatedProfessors->the_post(); ?>
    <li class="professor-card__list-item">
        <a class="professor-card" href="<?php the_permalink(); ?>">

            <img class="professor-card__image"
                src="<?php the_post_thumbnail_url('professorLandscape') ?>"
                alt="">
            <span class="professor-card__name"><?php the_title(); ?></span>
        </a></li>

    <?php
            }
            echo '</ul>';
        }

        wp_reset_postdata();













 

        //Realted Events
        $today = date('Ymd');

        $relatedEvents = new WP_Query(array(
                    'posts_per_page' => 2,
                    'post_type' => 'event',
                    'ignore_sticky_posts' => true,
                    'meta_key' => 'event_date',
                    'orderby'=> 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_date',
                            'compare' => '>=',
                            'value' => $today,
                            'type' => 'numeric'
                        ),
                        array(
                            'key' => 'related_programs',
                            'compare' => 'LIKE',
                            'value'  => '"'.get_the_ID().'"'
                        )
                    )

                ));
        if ($relatedEvents->have_posts()) {
            echo '<hr class="section-break">';
            echo'<h2 class="headline headline--medium">Upcoming '.get_the_title().' Events</h2>';

            while ($relatedEvents->have_posts()) {
                $relatedEvents->the_post();
                get_template_part('template-parts/content', get_post_type());
            }
        }
        wp_reset_postdata(); ?>
</div>

<?php
    } ?>


<?php get_footer();
