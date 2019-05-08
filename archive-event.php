<?php get_header();
pageBanner(array(
            'title'=> "All events",
            'subtitle' => "See what is goind on in our world!",
            'photo' => ""
        ));

?>

<div class="container container--narrow page-section">
    <?php
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', get_post_type());
        }
        echo paginate_links();
    ?>
    <hr class="section-break">
    <p>Looking for a recap of our past events? <a
            href="<?php echo site_url('/past-events/') ?>">Check
            out our past Events</a></p>

</div>


<?php get_footer();
