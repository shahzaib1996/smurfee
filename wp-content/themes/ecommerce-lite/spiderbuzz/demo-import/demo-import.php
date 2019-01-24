<?php
/**
 * Ecommerce lite Import Options 
 * Demo Import File 
 */
function ecommerce_lite_import_files() {
    return array(
      array(
        'import_file_name'           => 'Default',
        'categories'                 => array( 'eCommerce'),
        'import_file_url'            =>  get_template_directory_uri() . '/spiderbuzz/demo-import/ecommerce-lite.xml',
        'import_widget_file_url'     =>  get_template_directory_uri() . '/spiderbuzz/demo-import/ecommerce-lite.wie',
        'import_customizer_file_url' =>  get_template_directory_uri() . '/spiderbuzz/demo-import/ecommerce-lite.dat',
        
        'import_preview_image_url'   =>  get_template_directory_uri() . '/screenshot.png',
        'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'ecommerce-lite' ),
        'preview_url'                => 'http://demo.spiderbuzz.com/ecommerce-lite',
      ),
      array(
        'import_file_name'           => 'Default',
        'categories'                 => array( 'eCommerce'),
        'import_file_url'            =>  get_template_directory_uri() . '/spiderbuzz/demo-import/ecommerce-lite.xml',
        'import_widget_file_url'     =>  get_template_directory_uri() . '/spiderbuzz/demo-import/ecommerce-lite.wie',
        'import_customizer_file_url' =>  get_template_directory_uri() . '/spiderbuzz/demo-import/ecommerce-lite.dat',
        
        'import_preview_image_url'   =>  get_template_directory_uri() . '/screenshot.png',
        'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'ecommerce-lite' ),
        'preview_url'                => 'http://demo.spiderbuzz.com/ecommerce-lite',
      ),
      
    );
  }
  add_filter( 'pt-ocdi/import_files', 'ecommerce_lite_import_files' );


  
/*****************************************************************
*         After demo import options
*************************************************************/
function ecommerce_lite_after_import_setup() {
  // Assign menus to their locations.
  $main_menu = get_term_by( 'name', 'All Pages', 'nav_menu' );
  
  set_theme_mod( 'nav_menu_locations', array(
    'primary-menu' => $main_menu->term_id,
    )
  );

  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'Sample Page ' );
  $blog_page_id  = get_page_by_title( 'Blog' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ecommerce_lite_after_import_setup' );