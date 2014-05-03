<?php
/**
 * Created by CodeCrew.
 * Developer: Nenad Paic
 * Date: 4/30/14
 * Time: 7:08 PM
 */
?>

<!DOCTYPE html>

<html>
<head>
    <title><?php wp_title('-', 'true', 'right');
        bloginfo('name'); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/camera.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/bootstrap.css"/>
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />




    <script type='text/javascript' src='<?php bloginfo('template_url')?>/scripts/jquery.min.js'></script>
    <script type='text/javascript' src='<?php bloginfo('template_url')?>/scripts/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='<?php bloginfo('template_url')?>/scripts/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='<?php bloginfo('template_url')?>/scripts/camera.min.js'></script> 
    <script type='text/javascript' src='<?php bloginfo('template_url')?>/scripts/camera.js'></script> 

    
    <script>
		jQuery(function(){
			
			jQuery('#camera_random').camera({
				thumbnails: true
			});

		});
    </script>

</head>
<body>
    <div class="row">
<div id="wrapper-header">
<div class="col-md-4" id="logo"><?php add_logo();?></div>
<div class="col-md-4"></div>
<div class="col-md-4" id="header-widget"><?php dynamic_sidebar('headersection') ?></div>
</div>
</div>
</div>
	

<div id="gradient">

</div>

        <div id="wrapper" >
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </div>
     <?php
            wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav pull-right',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
            );

         ?>
    </div>
</nav>
<div class ="content">
    <div class="row" id="sub-nav">
<div class="sub-menu">
<?php
    nav_bar($post->ID);
?>
    </div>
</div>

    <?php
    if ($post->post_parent == 0){
       slider();
    }
    else{
        breadcumb($post->ID);
    }
?>   
<script >
	$("#searchsubmit").val('Go');
	$("#s").attr("placeholder", "Search");
	$("#s").attr("size", "30");
	$(".screen-reader-text").html("");
</script>

            


