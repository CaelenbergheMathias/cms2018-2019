<?php

/* Template Name: Beelden Page */

?>


<?php get_header(); ?>

    <div class="main-content-width-wrapper">
        <div class="two-column-entry">

            <main class="main-content">

                <?php
                if (have_posts()) {
                    //var_dump(have_posts());
                    while (have_posts()) {
                        ?>
                        <article><?php
                        the_post();
                        the_title('<h3>', '</h3>');

                        global $post;
                        //var_dump($post);
                        $custom = get_post_custom($post->ID);
                        $name = $custom['beeld_naam'][0];
                        $date = $custom['beeld_date'][0];
                        the_content();
                        ?><p class="name"><?php echo $name . " (" . $date . ")"; ?></p><?php
                        ?><p class="materials"><?php echo $custom['beeld_materials'][0]; ?></p><?php
                        ?><p class="description"><?php echo $custom['beeld_descr'][0]; ?></p><?php

                        ?></article><?php

                    };

                } else {
                    echo 'No content available';
                };
                ?>

            </main>
            <?php get_sidebar('main-sidebar'); ?>
        </div>


    </div>

<?php get_footer(); ?>