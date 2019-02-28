<?php
/**
 * Service Box all Settings Hear
 * 
 */
function ecommerce_lite_homepage_service_section(){
    //Service Section Default Value
    $defaults = array(
        array(
            'service_icons'     => 'fa fa-ambulance',
            'service_title'     => 'Free Delivery',
            'service_short_desc'=> 'From $59.89'                        
        ),
        array(
            'service_icons'     => 'fa fa-usd',
            'service_title'     => 'Free Return',
            'service_short_desc'=> '365 a day'  
        ),
        array(
            'service_icons'     => 'fa fa-user',
            'service_title'     => 'Support 24/7',
            'service_short_desc'=> 'Online 24 hours'  
        ),
        array(
            'service_icons'     => 'fa fa-usd',
            'service_title'     => 'Big Saving',
            'service_short_desc'=> 'Weeken Sales'  
        )
    );

    //Service Box Section
    $service_box_items = get_theme_mod( 'homepage_service_box_section', $defaults );
    
    ?>
    <section id="frontpage_service_box_section" class="container">
        <div style="background: ;text-align: center;height: 50px;width: 100%;overflow: hidden;position: relative;margin-top: 50px;">

            <hr style="background:;width: 100%;height: 2px;position: absolute;margin:0px;margin-top: 20px;">
            
            <h5 style="font-size: 6px;color:#eee;">x</h5>
            <h4 style="background: white;display: inline;margin: 0px;z-index: 999;position: relative;margin-top: 20px !important;padding-left: 20px;padding-right: 20px;">OUR SERVICES</h4>
        </div>
        <div class="support">
            <div class="row">

                <?php foreach( $service_box_items as $service_item ){ ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 xs-12 service-box">
                        <div class="feature-box">
                            <div class="service-icon">
                                <i class="<?php echo esc_attr( $service_item['service_icons'] ); ?> fa-3x"  aria-hidden="true"></i>
                            </div>
                            <div class="service-text">
                                <div class="ser-title"><?php echo esc_attr( $service_item['service_title'] ); ?></div>
                                <div class="ser-subtitle"><?php echo esc_attr( $service_item['service_short_desc'] ); ?></div>   
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>

    <?php
}
add_action('service-box','ecommerce_lite_homepage_service_section');