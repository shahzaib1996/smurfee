<?php
/**
 * The template part for displaying services
 * @package Ecommerce Hub
 * @subpackage ecommerce_hub
 * @since 1.0
 */
?>
<div class="col-md-4 col-sm-4">
    <div class="blog-sec">
        <div class="mainimage">
            <?php 
                if(has_post_thumbnail()) { 
                  the_post_thumbnail(); 
                }
            ?>    
        </div>
        <h3><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?></a></h3>
        <div class="post-info">
            <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
            <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
            <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"> <?php comments_number( __('0 Comments','ecommerce-hub'), __('0 Comments','ecommerce-hub'), __('% Comments','ecommerce-hub') ); ?></span> 
        </div>
        <p><?php the_excerpt(); ?></p>
        <div class="blogbtn">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read Full', 'ecommerce-hub' ); ?>"><?php esc_html_e('Read Full','ecommerce-hub'); ?></a>
        </div>
    </div>
</div>