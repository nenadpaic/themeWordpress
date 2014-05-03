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

   
    
    <?php wp_head(); ?>
     <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/bootstrap.css"/>

   
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/flexslider.css" type="text/css"/ media="screen">

  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />
 
  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

</head>
<body>
<div id="gradient">
<div class="row" id="logoPosition">
<div id="wrapper-header">
<div class="col-md-4" id="logo"><?php add_logo();?></div>
<div class="col-md-4"></div>
<div class="col-md-4" id="header-widget"><?php dynamic_sidebar('headersection') ?></div>
</div>
</div>
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
  if($post->post_parent)
  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
  else
  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
  if ($children) { ?>
  <ul>
  <?php echo $children; ?>
  </ul>
  <?php } 

  ?>
  </div>
</div>
<?php
    if ($post->post_parent == 0 && !isset($_GET['s']) && !is_single()){


      slider();

   }
?>  
  
  



<script >
    $("#searchsubmit").val('Go');
    $("#s").attr("placeholder", "Search");
    $("#s").attr("size", "30");
    $(".screen-reader-text").html("");

</script> 





