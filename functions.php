<?php
/**
 * Created by PhpStorm.
 * User: nenadpaic
 * Date: 5/1/14
 * Time: 10:04 AM
 */

require_once "wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php";
require_once "scripts/scriptsjs.php";

require_once "scripts/hooks.php";

require_once "include/slider_admin_options.php";
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

$option_name = 'cc_theme_options';

$option = get_option($option_name);

function slider(){
    $option_name = 'cc_theme_options';

$option = get_option($option_name);
     for ($i=1; $i<count($option)+1; $i++){
        if (isset($option["slider{$i}"])){
                $slides[$i] = '<div data-thumb="'.$option["slider{$i}"].'" data-src="'.$option["slider{$i}"].'">
                                    <div class="camera_caption fadeFromBottom">
                                        Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
                                    </div>
                                 </div>';
        }
    }
    echo '<div class="fluid_container">';
    echo '<div class="camera_wrap camera_azure_skin" id="camera_random">';

shuffle($slides);
foreach ($slides as $slides) {
    echo "$slides\n";
}

        
echo "</div><!-- #camera_random -->";

echo "</div><!-- .fluid_container -->";

}

register_sidebar(array(
    'name' => 'Right sidebar',
    'id'   => 'rightsidebar',
    'description' => 'this is right sidebar',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',

));
register_sidebar(array(
    'name' => 'Left sidebar',
    'id'   => 'leftsidebar',
    'description' => 'this is left sidebar',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',

));
register_sidebar(array(
    'name' => 'Footer sidebar',
    'id'   => 'dole',
    'description' => 'this is footer area',


));