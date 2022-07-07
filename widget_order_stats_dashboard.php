//======================================================================
//                  # Widget stats ordini in dashboard #
//======================================================================
function wc_dashboard_new_order_stats() {
    global $woocommerce;
 
    $on_hold_count    = 0;
    $processing_count = 0;
    $pending_count = 0;
    $completed_count = 0;
    $failed_count = 0;
    $refunded_count  = 0;
    $cancelled_count = 0;
 
    foreach ( wc_get_order_types( 'order-count' ) as $type ) {
            $counts            = (array) wp_count_posts( $type );
            $on_hold_count    += isset( $counts['wc-on-hold'] ) ? $counts['wc-on-hold'] : 0;
            $processing_count += isset( $counts['wc-processing'] ) ? $counts['wc-processing'] : 0;
            $pending_count    += isset( $counts['wc-pending'] ) ? $counts['wc-pending'] : 0;
            $completed_count    += isset( $counts['wc-completed'] ) ? $counts['wc-completed'] : 0;
            $failed_count    += isset( $counts['wc-failed'] ) ? $counts['wc-failed'] : 0;
            $refunded_count    += isset( $counts['wc-completed'] ) ? $counts['wc-refunded'] : 0;
            $cancelled_count    += isset( $counts['wc-cancelled'] ) ? $counts['wc-cancelled'] : 0;
            } 
 
 
            ?>
 
            <li class="on-hold-orders">
                <a href="<?php echo esc_url( admin_url( 'edit.php?post_status=wc-on-hold&amp;post_type=shop_order' ) ); ?>">
                <?php
                    printf(
                        _n( '%s order on-hold', '%s orders on-hold', $on_hold_count, 'woocommerce' ),
                        $on_hold_count
                    );
                ?>
                </a>
            </li>
            
            <li class="processing-orders">
            <a href="<?php echo esc_url( admin_url( 'edit.php?post_status=wc-processing&amp;post_type=shop_order' ) ); ?>">
                <?php
 
                    printf(
                        _n( '%s order awaiting processing', '%s orders awaiting processing', $processing_count, 'woocommerce' ),
                        $processing_count
                    );
                ?>
                </a>
            </li>
 
            <li class="pending-orders">
            <a href="<?php echo esc_url( admin_url( 'edit.php?post_status=wc-pending&amp;post_type=shop_order' ) ); ?>">
                <?php
                    printf(
                        _n( '%s order pending', '%s orders pending', $pending_count, 'woocommerce' ),
                        $pending_count
                    );
                ?>
                </a>
            </li>
 
            <li class="completed-orders">
            <a href="<?php echo esc_url( admin_url( 'edit.php?post_status=wc-completed&amp;post_type=shop_order' ) ); ?>">
                <?php
                    printf(
                        _n( '%s order completed', '%s orders completed', $completed_count, 'woocommerce' ),
                        $completed_count
                    ); 
                ?>
                </a>
            </li>
 
            <li class="failed-orders">
                <a href="<?php echo esc_url( admin_url( 'edit.php?post_status=wc-failed&amp;post_type=shop_order' ) ); ?>">
                <?php
                    printf(
                        _n( '%s order failed', '%s orders failed', $failed_count, 'woocommerce' ),
                        $failed_count
                    );
                ?>
                </a>
            </li>
 
            <li class="refunded-orders">
                <a href="<?php echo esc_url( admin_url( 'edit.php?post_status=wc-refunded&amp;post_type=shop_order' ) ); ?>">
                <?php
                    printf(
                        _n( '%s order refunded', '%s orders refunded', $refunded_count, 'woocommerce' ),
                        $refunded_count
                    );
                ?>
                </a>
            </li>
 
            <li class="cancelled-orders">
                <a href="<?php echo esc_url( admin_url( 'edit.php?post_status=wc-cancelled&amp;post_type=shop_order' ) ); ?>">
                <?php
                    printf(
                        _n( '%s order cancelled', '%s orders cancelled', $cancelled_count, 'woocommerce' ),
                        $cancelled_count
                    );
                ?>
                </a>
            </li>
 
            <?php
        }
 
function wc_dashboard_new_order_stats_init() {
    wp_add_dashboard_widget( 'woocommerce_dashboard_new_stats', __( 'WooCommerce order stats', 'woocommerce' ), 'wc_dashboard_new_order_stats' );
}
add_action( 'wp_dashboard_setup', 'wc_dashboard_new_order_stats_init' );
 
function wc_print_new_stats_styles() {
     
    ?>
 
    <style type="text/css">
 
        #woocommerce_dashboard_new_stats li.on-hold-orders a {
            color: #e66f00;
        }
         
        #woocommerce_dashboard_new_stats li {
        font-size: 14px;
        line-height: 1em;
        font-weight: 400;
        display: block;
        box-sizing: border-box;
    }
         
        #woocommerce_dashboard_new_stats li.on-hold-orders a::before {
            font-family: woocommerce;
            content: "\e033";
            color: #999;
        }
         
        #woocommerce_dashboard_new_stats li.processing-orders a {
            color: #e66f00;
            border-right: 1px solid #ececec;
        }
         
        #woocommerce_dashboard_new_stats li.processing-orders a::before {
            font-family: woocommerce;
            content: "\e011";
            color: #ffba00;;
        }
         
        #woocommerce_dashboard_new_stats li.pending-orders a {
            color: #e66f00;
        }
         
        #woocommerce_dashboard_new_stats li.pending-orders a::before {
            font-family: woocommerce;
            content: "\e011";
            color: #ffba00;;
        }
         
        #woocommerce_dashboard_new_stats li.completed-orders a {
            color: green;
        }
         
        #woocommerce_dashboard_new_stats li.completed-orders a::before {
            font-family: woocommerce;
            content: "\e011";
            color: #7ad03a;
        }
 
        #woocommerce_dashboard_new_stats li.failed-orders a {
            color: red;
        }
         
        #woocommerce_dashboard_new_stats li.failed-orders a::before {
            font-family: woocommerce;
            content: "\e013";
            color: #a00;
        }
         
        #woocommerce_dashboard_new_stats li.refunded-orders a {
            color: red;
        }
         
        #woocommerce_dashboard_new_stats li.refunded-orders a::before {
            font-family: woocommerce;
            content: "\e013";
            color: #a00;
        }
         
        #woocommerce_dashboard_new_stats li.cancelled-orders a {
            color: red;
        }
         
        #woocommerce_dashboard_new_stats li.cancelled-orders a::before {
            font-family: woocommerce;
            content: "\e013";
            color: #a00;
        }
 
    </style>
    <?php
}
add_action( 'admin_head', 'wc_print_new_stats_styles' );
