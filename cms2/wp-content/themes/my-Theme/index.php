<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 10/10/2018
 * Time: 8:56
 */

get_header();

?>


<div class="main-content-width-wrapper">



            <main class="main-content">

                <?php
                    if(have_posts()):
                        while (have_posts()):
                            the_post();
                            ?><div class="index-entry"><h3><?php  echo get_the_title();  ?></h3><?php
                                the_content();
                                 ?></div><?php
                        endwhile;
                    endif;

                ?>
                </main>

    </div>

<?php

get_footer();
?>