<?php
/**
 * The Header for our theme.
 * @package Ecommerce Hub
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'ecommerce-hub' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="header">
  <div class="social-icon">
    <div class="container">
      <div class="top-header">
        <div class="row">
          <div class="col-md-6">
            <?php if ( get_theme_mod('ecommerce_hub_welcome','') != "" ) {?>
              <div class="welcome">
                <?php if ( get_theme_mod('ecommerce_hub_welcome','') != "" ) {?>
                  <p><?php echo esc_html( get_theme_mod('ecommerce_hub_welcome',__('Welcome To The Store!','ecommerce-hub')) ); ?></p>
                <?php }?>
              </div>
          <?php }?>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="social-media">
              <?php if( get_theme_mod( 'ecommerce_hub_facebook' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_facebook','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
              <?php } ?>
              <?php if( get_theme_mod( 'ecommerce_hub_pintrest' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_pintrest','' ) ); ?>"><i class="fab fa-pinterest-p"></i></a>
              <?php } ?>
              <?php if( get_theme_mod( 'ecommerce_hub_rss') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_rss','' ) ); ?>"><i class="fa fa-rss"></i></a>
              <?php } ?>
              <?php if( get_theme_mod( 'ecommerce_hub_twitter' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_twitter','' ) ); ?>"><i class="fab fa-twitter"></i></a>
              <?php } ?>
              <?php if( get_theme_mod( 'ecommerce_hub_youtube' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_youtube','' ) ); ?>"><i class="fab fa-youtube"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div> 
  <div id="top-header">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3">
          <div class="logo">
            <?php if( has_custom_logo() ){ ecommerce_hub_the_custom_logo();
             }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; }?>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="search-box">
            <div class="row">
              <div class="col-md-6">
                <?php if(class_exists('woocommerce')){ ?>
                  <?php get_product_search_form()?>
                <?php }else { echo '<h6>'.esc_html('Please Install Woocommerce Plugin','ecommerce-hub').'<h6>'; }?> 
              </div>
              <div class="col-md-6">
                <?php if(class_exists('woocommerce')){ ?>
                   <button class="product-btn"><?php echo esc_html_e('All Categories','ecommerce-hub'); ?><i class="fa fa-caret-down" aria-hidden="true"></i></button>
                   <div class="product-cat">
                     <?php
                       $args = array(
                         //'number'     => $number,
                         'orderby'    => 'title',
                         'order'      => 'ASC',
                         'hide_empty' => 0,
                         'parent'  => 0
                         //'include'    => $ids
                       );
                       $product_categories = get_terms( 'product_cat', $args );
                       $count = count($product_categories);
                       if ( $count > 0 ){
                           foreach ( $product_categories as $product_category ) {
                             $cat_id   = $product_category->term_id;
                             $cat_link = get_category_link( $cat_id );
                             if ($product_category->category_parent == 0) { ?>
                           <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                           <?php
                         }
                           echo esc_html( $product_category->name ); ?></a><i class="fas fa-chevron-right"></i></li>
                           <?php
                           }
                         }
                     ?>
                   </div>
                <?php }else {
                 echo '<h6>'.esc_html('Please Install Woocommerce Plugin','ecommerce-hub').'<h6>'; }?>
              </div>
            </div> 
          </div>
        </div>
        <div class="col-md-1">
          <?php if(class_exists('woocommerce')){ ?>
            <li class="cart_box">
              <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
            </li>
            <span class="cart_no">
              <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_html_e( 'shopping cart','ecommerce-hub' ); ?>"><img src="<?php echo esc_html(get_template_directory_uri().'/images/shopping-cart.png'); ?>" alt=""></a>
            </span>
            <?php }else { echo '<h6>'.esc_html('Please Install Woocommerce Plugin','ecommerce-hub').'<h6>'; }?>
        </div>
        <div class="col-md-2 col-sm-2">
          <div class="account">
            <?php if ( is_user_logged_in() ) { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_html_e('My Account','ecommerce-hub'); ?>"><i class="fas fa-sign-out-alt"></i><?php esc_html_e('Logout','ecommerce-hub'); ?></a>
            <?php } 
            else { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_html_e('Login / Register','ecommerce-hub'); ?>"><i class="fas fa-sign-in-alt"></i><?php esc_html_e('Login','ecommerce-hub'); ?></a>
            <?php } ?>
          </div>
        </div>
      </div>  
    </div>
  </div>  
  <div id="header">
    <div class="container">
      <div class="menu-sec">
        <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','ecommerce-hub'); ?></a></div>
        <div class="row">
          <div class="menubox col-md-8 col-sm-8 p-0">
            <div class="nav">
              <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
            </div>
          </div>
          <div class="col-md-2 p-0">
            <div class="contact-details">
              <div class="row">
                <?php if ( get_theme_mod('ecommerce_hub_email_text','') != "" ) {?>
                  <div class="col-md-2 p-0 conatct-font">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <div class="col-md-10 p-0">
                    <?php if ( get_theme_mod('ecommerce_hub_email_text','') != "" ) {?>
                      <p class="bold-font"><?php echo esc_html( get_theme_mod('ecommerce_hub_email_text',__('Mail us Now','ecommerce-hub')) ); ?></p>
                    <?php }?>
                    <?php if ( get_theme_mod('ecommerce_hub_email','') != "" ) {?>
                      <p><?php echo esc_html( get_theme_mod('ecommerce_hub_email',__('ecommerce@example.com','ecommerce-hub')) ); ?></p>
                    <?php }?>
                  </div>
                <?php }?>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="contact-details">
              <div class="row">
                <?php if ( get_theme_mod('ecommerce_hub_call_text','') != "" ) {?>
                  <div class="col-md-2 p-0 conatct-font">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="col-md-10 p-0">
                    <?php if ( get_theme_mod('ecommerce_hub_call_text','') != "" ) {?>
                      <p class="bold-font"><?php echo esc_html( get_theme_mod('ecommerce_hub_call_text',__('Call us Now','ecommerce-hub') )); ?></p>
                    <?php }?>
                    <?php if ( get_theme_mod('ecommerce_hub_call_number','') != "" ) {?>
                      <p><?php echo esc_html( get_theme_mod('ecommerce_hub_call_number',__('+00-123-456-789','ecommerce-hub') )); ?></p>
                    <?php }?>
                  </div>
                <?php }?>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>