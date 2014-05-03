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
require_once "include/logo_admin_options.php";
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

    foreach ($slides as $slides) {
        echo "$slides\n";
    }

        
    echo "</div><!-- #camera_random -->";

    echo "</div><!-- .fluid_container -->";

}

function url_prepare($word){
    return strtr($word," ","-");
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
//Za dobijanje prve stranice u lancu, grandparrent
function get_root_parent($page_id) {
global $wpdb;
	$parent = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE post_type='page' AND ID = '$page_id'");
	if ($parent == 0) return $page_id;
	else return get_root_parent($parent);
}

function nav_bar($page_id){
 if($post->post_parent)
     //Da uvek ispisuje decu od grandparenta, da bude fiksni meni
  $children = wp_list_pages("title_li=&child_of=".  get_root_parent($page_id)."&echo=0");
  else
  $children = wp_list_pages("title_li=&child_of=".  get_root_parent($page_id)."&echo=0");
  if ($children) { ?>
  <ul>
  <?php echo $children; ?>
  </ul>
  <?php 
  
  } 


}
function side_nav_menu($page_id){
    //Proveravamo su decu od glavnog roditelja, meni koji nam treba je uvek drugi
    $svi_roditelji = get_post_ancestors($page_id); 
    end($svi_roditelji);
    $drugi = prev($svi_roditelji);
    //Ako ne postoji drugi, dodeljujemo mu vrednost
    if (empty($drugi))
        $drugi = $page_id;
    $args = array(
        'child_of' => $drugi,
        'depth' => 0,
    );
       $test = wp_list_pages($args);
       echo "<pre>", print_r($test), "</pre>";

  }
  
function breadcumb($page_id){
    $svi_roditelji = get_post_ancestors($page_id); 
    krsort($svi_roditelji);
    foreach ($svi_roditelji as $r)
        $test .=  "<a href='". get_permalink($r) ."'>". get_the_title($r) ."</a> / ";
    
    $test .= get_the_title($page_id);
        echo $test; 
}


register_sidebar(array(
    'name' => 'Header section',
    'id'   => 'headersection',
    'description' => 'this is header section',
    'before_widget' => '<div class="widget-header">',
    'after_widget'  => '</div>',


));
function add_logo(){
    $cc_logo_option = get_option('cc_theme_logo_options'); ?>

    <a href="<?php bloginfo('home'); ?>"></a> <img src="<?php echo $cc_logo_option['logourl'] ?>" alt="Logo image" /></a>

<?php
}
