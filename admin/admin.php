<?php
if ( !defined('ABSPATH')) exit;

?>
        <div class="wrap">
            <h1><?php esc_html_e( get_admin_page_title()); ?></h1>
<?php
                /* Save button clicked */  
                $Totop_save = @$_POST['Totop_save'];
                $Totop_save = wp_kses($Totop_save, array());

                if ( isset($Totop_save)){
                //nonce check 
                if ( isset( $_POST['_wpnonce']) && $_POST['_wpnonce']){
                    if (check_admin_referer( 'scroll-button', '_wpnonce' )){
                        //POST variables
                        //$WP_to_top_speed = ( @$_POST['WP_to_top_speed'] == 'fast')? 'fast' : 'slow';
                        $WP_to_top_speed = ( @$_POST['WP_to_top_speed']);
                        //register to database
                            update_option('scroll_button_speed', $WP_to_top_speed);
                        
                        //$WP_to_top_color = ( @$_POST['WP_to_top_color'] == 'blue')? 'blue' : 'red';
                        $WP_to_top_color = ( @$_POST['WP_to_top_color']);

                            //register to database
                            update_option('scroll_button_color', $WP_to_top_color);
                    }
                }
                
            }
                
               /* recieving the data */
               $WP_to_top_speed = get_option('scroll_button_speed'); 
               $WP_to_top_color = get_option('scroll_button_color'); 
               
                
                
?>


        <form method="post" id="wp_to_top_form" action="">
            <?php wp_nonce_field('scroll-button', '_wpnonce' ); ?>

        <table class="form-table">
            <tr valign="top">
                <th width="50" scope="row">Scroll Speed</th>
                <td>
                    <label>Slow</label>
                        <input  class="slider-color" type="range" name="WP_to_top_speed" min="100" max="1100" value="<?php echo get_option('scroll_button_speed')?>" step="200">
                    <label>Fast</label>
                </td>
            </tr>
            <tr valign="top">
                <th width="50" scope="row">Button Colour</th>
                <td>
                     <input type="text" name="WP_to_top_color" value="<?php echo get_option( 'scroll_button_color' ) ?>" class="my-color-field" data-default-color="#effeff" />
                </td>
            </tr>
        
        </table>
        
        <input type="submit" name="Totop_save" value="Save Settings" class="button button-primary"/><br/>

        </div>
