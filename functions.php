<?php
/**
 * Created by PhpStorm.
 * User: nenadpaic
 * Date: 5/1/14
 * Time: 10:04 AM
 */

require_once "wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php";
require_once "scripts/scriptsjs.php";
require_once "include/admin_options.php";
require_once "scripts/hooks.php";
if(function_exists('register_nav_menus')){
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'CCtheme' ),
) );

}

if(function_exists('add_theme_support')){
    add_theme_support('post-thumbnails');
}
if(function_exists('add_image_size')){
    add_image_size('featured', 400, 250, true);
    add_image_size('post-thumb', 200, 125, true);
}
if(get_option('cc_theme_option')){
    $cc_options = get_option('cc_theme_option');
}else{
    add_option('cc_theme_option', array(
        'slider_image_1' => 'proba.jpg',
        'slider_image_2' => 'proba2.jpg',
        'slider_image_3' => 'proba3.jpg',
        'slider_image_4' => 'proba4.jpg',
        'slider_enabled' => false

    ));
}
$cc_options = get_option('cc_theme_option');
add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
    add_theme_page('My Plugin Theme', 'Slider options', 'edit_theme_options', 'my-unique-identifier', 'my_plugin_function');
}
function my_plugin_function(){
?>
<h3>Slike slidera</h3>

<?php
}