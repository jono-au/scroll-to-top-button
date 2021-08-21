<?php
if ( !defined('ABSPATH')) exit;
//check user capabilities
        // if( !current_user_can('manage_options') ) {
        //     return;
        // }
        
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
                        $WP_to_top_speed = ( @$_POST['WP_to_top_speed'] == 'fast')? 'fast' : 'slow';
                            //register to database
                            update_option('scroll_button_speed', $WP_to_top_speed);
                        
                        $WP_to_top_color = ( @$_POST['WP_to_top_color'] == 'blue')? 'blue' : 'red';
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
                    <input type="radio" name="WP_to_top_speed" value="fast" <?php if($WP_to_top_speed == "fast") echo('checked'); ?> />
                    Fast<br/>
                    <input type="radio" name="WP_to_top_speed" value="slow" <?php if($WP_to_top_speed == "slow") echo('checked'); ?> /> 
                    Slow<br/>         
                </td>
            </tr>
            <tr valign="top">
                <th width="50" scope="row">Button Colour</th>
                <td>
                    <input type="radio" name="WP_to_top_color" value="blue" <?php if($WP_to_top_color == "blue") echo('checked'); ?> />
                    Blue<br/>
                    <input type="radio" name="WP_to_top_color" value="red" <?php if($WP_to_top_color == "red") echo('checked'); ?> /> 
                    Red<br/>         
                </td>
            </tr>
            <tr>
                <th width="50" scope="row">Save this setting</th>
                <td>
                    <input type="submit" name="Totop_save" value="Save" /><br/>
                </td>
            </tr>

        </table>
     
        </div>