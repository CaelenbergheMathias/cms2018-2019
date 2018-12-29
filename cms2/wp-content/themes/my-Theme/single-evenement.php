<?php

/* Template Name: Evenementen Page */

?>


<?php get_header(); ?>
    <div class="menus-wrapper">

        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_title('<h3>', '</h3>');

                global $post;
                //var_dump($post);
                $custom = get_post_custom($post->ID);
                $author = $custom['textbook_author'][0];
                $pub_date = $custom['textbook_date'][0];

                echo $author . " (" . $pub_date . ")<br>";


                echo $custom['evenement_naam'][0];
                the_content();
                echo $custom['evenement_date'][0];
                echo $custom['evenement_plaats'][0];
                echo $custom['evenement_descr'][0];
            };

        } else {
            echo 'No content available';
        };
        ?>
    </div>


<?php get_footer(); ?>