<?php
if ( !defined('ABSPATH')) exit;
//check user capabilities
        // if( !current_user_can('manage_options') ) {
        //     return;
        // }
        
?>
        <div class="wrap">
            <h1>BLAH HA</h1>
            <p><?php esc_html_e( 'Content'); ?></p>
        </div>

        <table class="form-table">
            <tr valign="top">
                <th width="50" scope="row">Scroll Speed</th>
                <td>
                    <input type="radio" name="WP_to_top_speed" value="fast"> <?php if($WP_to_top_speed == "fast") echo('checked'); ?> />
                    Fast<br/>
                    <input type="radio" name="WP_to_top_speed" value="slow"> <?php if($WP_to_top_speed == "slow") echo('checked'); ?> /> 
                    Slow<br/>         
                </td>
            </tr>
            <tr valign="top">
                <th width="50" scope="row">Button Colour</th>
                <td>
                    <input type="radio" name="WP_to_top_color" value="blue"> <?php if($WP_to_top_color == "blue") echo('checked'); ?> />
                    Blue<br/>
                    <input type="radio" name="WP_to_top_color" value="red"> <?php if($WP_to_top_color == "red") echo('checked'); ?> /> 
                    Red<br/>         
                </td>
            </tr>

        </table>
     