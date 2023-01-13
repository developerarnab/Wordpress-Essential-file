 <?php 

/*
* POST FUNCTION CODE
*/

function slider_post_type() {
	$labels = array(
		'name'                => _x( 'slider', 'Post Type General Name', 'resturant' ),
		'singular_name'       => _x( 'slider', 'Post Type Singular Name', 'resturant' ),
		'menu_name'           => __( 'slider', 'resturant' ),
		'parent_item_colon'   => __( 'Parent slider', 'resturant' ),
		'all_items'           => __( 'All slider', 'resturant' ),
		'view_item'           => __( 'View slider', 'resturant' ),
		'add_new_item'        => __( 'Add New slider', 'resturant' ),
		'add_new'             => __( 'Add New', 'resturant' ),
		'edit_item'           => __( 'Edit slider', 'resturant' ),
		'update_item'         => __( 'Update slider', 'resturant' ),
		'search_items'        => __( 'Search slider', 'resturant' ),
		'not_found'           => __( 'Not Found', 'resturant' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'resturant' ),
	);
	$args = array(
		'label'               => __( 'slider', 'resturant' ),
		'description'         => __( 'slider news and reviews', 'resturant' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', ),
		'taxonomies'          => array( 'genres' ),	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,

		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'taxonomies'          => array( 'category' ),
	);
	register_post_type( 'slider', $args );
}
add_action( 'init', 'slider_post_type', 0 );

/*
* FILE LINK CODE
*/
<?php echo esc_url( get_template_directory_uri() ); ?>/

<!-- DYNAMIC IMAGE LINK -->

<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>

<!-- POST CREATING CODE -->
<!-- START --> 
<?php  $posts = new WP_Query( array( 'post_type' => 'post name' , 'posts_per_page' => 6, 'order' => 'ASC' ) );
while($posts->have_posts()) : $posts->the_post();?>
<!-- END -->
<?php endwhile; ?>

<!-- CONTENT AND TITLE DYNAMIC CODE -->
<?php echo get_the_title();?>
<?php echo get_the_content();?>
<?php echo the_excerpt(); ?>

<!-- SITE URL CODE -->
<?=site_url();?>


 <?php echo do_shortcode( '[contact-form-7 id="46" title="Contact us form"]' ); ?>
 
<!-- PAGE DYnamic CODE -->
<?php $my_query = new WP_Query('page_id=7'); while ($my_query->have_posts()) : $my_query->the_post();?>
<!-- END -->
<?php endwhile; ?>

<!-- ADD HEADER -->
<?php
/**
/* Template Name: Home
 *
 * Displays Only Home template
 *
 * @package WordPress
 * @subpackage buildline
 * @since buildline 1.0
 */
 get_header(); ?>

<!-- Widgets Shortcode -->
 <?php dynamic_sidebar('sidebar-2') ?>

<!-- Dynamic Link -->
<?php the_permalink();?>
 <!-- ADD FOOTER -->
 <?php get_footer(); ?>
<!-- Dynamic page  -->
 <?Php while ( have_posts() ) : the_post(); ?>

<!-- CATEGORI CODE --> 
<!-- START --> 
<?php $catquery = new WP_Query( 'post_type=recipes&cat=1&posts_per_page=20&order=ASC' ); while($catquery->have_posts()) : $catquery->the_post(); ?>
<!-- END -->
 <?php endwhile; ?>	

<!-- NAVBER DYNAMIC CODE -->

<?php   wp_nav_menu( array(
        'theme_location'    => 'primary',
         'depth'             => 2,
          'container'         => 'ul',
          'container_class'   => '',
           'container_id'      => '',
            'menu_class'        => 'menu_main_nav',
             'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'  => new WP_Bootstrap_Navwalker())
               );
            ?>



<?php echo of_get_option( 'logo' ); ?>



<!-- Archives Code -->
<?php
/**
 * The template for displaying srvices archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<!-- Archives Code -->


<?php

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

?>

<?php wp_footer(); ?>



<title><?php global $page, $paged; wp_title( '|', true, 'right' );
    if ( $site_description && ( is_home() || is_front_page() ) )echo " | $site_description"; ?></title>





<!-- 

<?php  $posts = new WP_Query( array( 'post_type' => 'faq' , 'order' => 'ASC' ) );
$showactive=0;
         while($posts->have_posts()) : $posts->the_post();
          if($showactive==0) { $class = 'active'; } else { $class = ''; }?>
      <div class="panel panel-default ">
         <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question<?=$class?>">
            <h4 class="panel-title">
               <a  class="ing">Q: <?php echo get_the_title();?></a>
            </h4>
         </div>
         <div id="question<?=$class?>" class="panel-collapse collapse" style="height: 0px;">
            <div class="panel-body">
               <p><?php echo get_the_content();?>
               </p>
            </div>
         </div>
      </div>
<?php $showactive++; endwhile; ?> -->



<!-- 
<?php  $posts = new WP_Query( array( 'post_type' => 'Faq' , 'order' => 'ASC' ) );
               $count=1;
               while($posts->have_posts()) : $posts->the_post();
               ?>

            <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                     <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?=$count?>" aria-expanded="true" aria-controls="collapseOne<?=$count?>" class="collapsed">
                   <?= get_the_title();?>
                     </a>
                  </h4>
               </div>
               <div id="collapseOne<?=$count?>" class="panel-collapse collapse <?php if($count==1){echo 'in';}else{echo '';} ?>" role="tabpanel" aria-labelledby="headingOne<?=$count?>">
                  <div class="panel-body">
                     <p><?= get_the_content();?></p>
                     <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>" alt="">
                  </div>
               </div>
            </div>
<?php $count++; endwhile; ?>
 -->




<!-- Search bar code
<?php 
            $blogarray=array();
            $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3));
            //print_r($wpb_all_query);die;
            if ( $wpb_all_query->have_posts() ) :
              while ( $wpb_all_query->have_posts() ) : 
                $wpb_all_query->the_post();
            ?> -->




?>

designerppl4@gmail.com

David@123$