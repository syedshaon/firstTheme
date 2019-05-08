<?php get_header();
pageBanner(array(
            'title'=> "Our Campuses",
            'subtitle' => "We have several conviniently located Campuses.",
            'photo' => ""
        ));


?>

<div class="container container--narrow page-section">

    <div class="acf-map">
        <?php
    
        while (have_posts()) {
            the_post();
            $mapLocation =get_field('map_location'); ?>
        <div class="marker"
            data-lat='<?php echo $mapLocation['lat'] ?>'
            data-lang='<?php echo $mapLocation['lng'] ?>'>
            <a href="<?php the_permalink(); ?>">
                <h3><?php the_title() ?>
                </h3>
            </a>
            <?php echo $mapLocation['address'] ?>
        </div>

        <?php
        } ?>
    </div>

    <div class="container container--narrow page-section">
        <ul class="list-list min-list">
            <?php
    
        while (have_posts()) {
            the_post();
            $mapLocation =get_field('map_location'); ?>
            <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
            <p><?php echo $mapLocation['address']; ?>
            </p>

            <?php
        }
        echo paginate_links();
    ?>
        </ul>


    </div>



</div>


<?php get_footer();
