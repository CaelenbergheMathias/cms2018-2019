<?php

/* Template Name: Evenementen Page */

?>


<?php get_header(); ?>

    <div class="main-content-width-wrapper">
        <div class="two-column-entry evenementen">
            <?php get_sidebar('main-sidebar'); ?>
            <main class="main-content">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        ?> <article><?php
                        the_post();
                        the_title('<h3>', '</h3>');

                        global $post;
                        //var_dump($post);
                        $custom = get_post_custom($post->ID);

                        ?><p> <?php echo $custom['evenement_naam'][0]; ?></p><?php
                        the_content();
                        ?><p><?php echo $custom['evenement_date'][0]; ?></p><?php
                        ?><p><?php echo $custom['evenement_plaats'][0]; ?></p><?php
                        ?><p><?php echo $custom['evenement_descr'][0]; ?></p><?php
                    ?> </article><?php
                    };

                } else {
                    echo 'No content available';
                };
                ?>
            </main>

        </div>



    </div>

<?php get_footer(); ?>