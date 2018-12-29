<?php

/* Template Name: Beelden Page */

?>


<?php get_header(); ?>

    <div class="menus-wrapper">

        <?php
        if (have_posts()) {
            //var_dump(have_posts());
            while (have_posts()) {
                the_post();
                the_title('<h3>', '</h3>');

                global $post;
                //var_dump($post);
                $custom = get_post_custom($post->ID);
                $name = $custom['beeld_naam'][0];
                $date = $custom['beeld_date'][0];
                the_content();
                echo $name . " (" . $date . ")<br>";
                echo $custom['beeld_descr'][0];


            };

        } else {
            echo 'No content available';
        };
        ?>
    </div>


<?php get_footer(); ?>