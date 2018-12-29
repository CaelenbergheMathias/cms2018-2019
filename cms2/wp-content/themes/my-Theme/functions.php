<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 10/10/2018
 * Time: 10:16
 */

if( ! function_exists('mytheme_setup')):
    function mytheme_setup()
    {
        add_theme_support('title-tag');
    }
endif;

//add_action('after_setup_theme', 'setup');

function register_mytheme_menus()
{
    register_nav_menus(array('primary'=> __('Primary Menu'),
        'footer'=> __('Footer Menu')));
}

add_action('init', 'register_mytheme_menus');


function mytheme_scripts(){
    wp_enqueue_style('mytheme_styles',get_stylesheet_uri());
    wp_enqueue_style('mytheme_google_fonts','https://fonts.googleapis.com/css?family=Raleway:300,400,400i,700');
}


add_action('wp_enqueue_scripts', 'mytheme_scripts');


function mytheme_widget_init()
{
    register_sidebar( array('name'=> __('Main Sidebar','mytheme'),
        'id'=> 'main-sidebar',
        'description' => __('Widgets added here will appear in all pages using the Two Column Template', 'mytheme'),
        'before_widget'=>'<section id="%1$s" class="widget %2$s">',
        'after_widget'=>'</section>',
        'before_title'=> '<h2 class="widget-title">',
        'after_title'=> '</h2>'));


}

add_action('widgets_init', 'mytheme_widget_init');

/*
---------  Custom Menu Post Type --------
*/
function evenement_init(){
    $labels = array(
        'name' => __('Evenementen'),
        'singular_name' => __('Evenement'),
        'add_new_item' => __('Add new evenement'),
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds Evenementen',
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'excerpt'),
    );
    register_post_type('evenement', $args);
}
add_action('init', 'evenement_init');

//Step 2: instead of using the custom fields-plugin, create your own custom fields
function evenement_admin_init(){
    add_meta_box(
        'evenement_details',		//$id
        'Evenement Details',		//$title
        'evenement_callback',	//$callback function
        'evenement',				//$post_type
        'normal',				//$context
        'high')	;				//$priority

    function evenement_callback(){
        global $post;
        $custom = get_post_custom($post->ID);
        //add custom fields
        $naam = $custom['evenement_naam'][0];
        $plaats = $custom['evenement_plaats'][0];
        $date = $custom['evenement_date'][0];
        $descr = $custom["evenement_descr"][0];

        ?>
        Please enter the required details of the evenement here.
        <div class="wrap">
            <p>
                <label>Naam: </label><br><input type="text" name="evenement_naam" value="<?php echo $naam;?>">
            </p>
            <p>
                <label>Plaats: </label><br><input type="text" name="evenement_plaats" value="<?php echo $plaats;?>">
            </p>
            <p>
                <label>Datum: </label><br><input type="date" name="evenement_date" value="<?php echo $date;?>">
            </p>
            <p>
                <label>Description: </label><br><input type="text" name="evenement_descr" value="<?php echo $descr;?>">
            </p>
        </div>
        <?php

    }
}
add_action('admin_init', 'evenement_admin_init');

//step 3: save the data of your custom fields
function evenement_save_data(){
    global $post;
    update_post_meta($post->ID, 'evenement_naam', $_POST['evenement_naam']);
    update_post_meta($post->ID, 'evenement_plaats', $_POST['evenement_plaats']);
    update_post_meta($post->ID, 'evenement_date', $_POST['evenement_date']);
    update_post_meta($post->ID, 'evenement_descr', $_POST['evenement_descr']);
}
add_action('save_post', 'evenement_save_data');



function beeld_init(){
    $labels = array(
        'name' => __('Beelden'),
        'singular_name' => __('Beeld'),
        'add_new_item' => __('Add new beeld'),
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds Beelden',
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'excerpt'),
    );
    register_post_type('beeld', $args);
}
add_action('init', 'beeld_init');

//Step 2: instead of using the custom fields-plugin, create your own custom fields
function beeld_admin_init(){
    add_meta_box(
        'beeld_details',		//$id
        'Beeld Details',		//$title
        'beeld_callback',	//$callback function
        'beeld',				//$post_type
        'normal',				//$context
        'high')	;				//$priority

    function beeld_callback(){
        global $post;
        $custom = get_post_custom($post->ID);
        //add custom fields
        $name = $custom['beeld_naam'][0];
        $materialen = $custom['beeld_materials'][0];
        $date = $custom['beeld_date'][0];
        $descr = $custom["beeld_descr"][0];
        ?>
        Geef hier de details van uw beeld in
        <div class="wrap">
            <p>
                <label>Naam: </label><br><input type="text" name="beeld_naam" value="<?php echo $name;?>">
            </p>
            <p>
                <label>Materialen: </label><br><input type="text" name="beeld_materials" value="<?php echo $materialen;?>">
            </p>
            <p>
                <label>Datum: </label><br><input type="date" name="beeld_date" value="<?php echo $date;?>">
            </p>
            <p>
                <label>Beschrijving: </label><br><textarea name="beeld_descr" value="<?php echo $descr;?>"></textarea>
            </p>
        </div>
        <?php

    }
}
add_action('admin_init', 'beeld_admin_init');

//step 3: save the data of your custom fields
function beeld_save_data(){
    global $post;
    update_post_meta($post->ID, 'beeld_naam', $_POST['beeld_naam']);
    update_post_meta($post->ID, 'beeld_materials', $_POST['beeld_materials']);
    update_post_meta($post->ID, 'beeld_date', $_POST['beeld_date']);
    update_post_meta($post->ID, 'beeld_descr', $_POST['beeld_descr']);
}
add_action('save_post', 'beeld_save_data');



