<?php get_header();
pageBanner(array(
            'title'=> "Our Campuses",
            'subtitle' => "We have several conviniently located Campuses.",
            'photo' => ""
        ));


?>

<div class="container container--narrow page-section">
    <ul class="list-list min-list">
        <?php
    
        while (have_posts()) {
            the_post();
            $mapLocation =get_field('map_location'); ?>
        <div class="marker"
            data-lat='<?php echo $mapLocation['lat'] ?>'
            data-lang='<?php echo $mapLocation['lng'] ?>'>
        </div>

        <?php
        }
        echo paginate_links();
    ?>
    </ul>


</div>


<?php get_footer();
