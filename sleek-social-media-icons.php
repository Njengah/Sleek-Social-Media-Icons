<?php
/**
* Plugin Name: Sleek Social Media Icons
* Plugin URI: https://njengah.com/projects
* Description: This plugin adds sleek social media icons to your website via the WordPress widget.
* Version: 1.0.0
* Author: Njengah
* Author URI: https://njengah.com
* Text Domain: sleek-social-media-icon
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* 
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 * Class Sleek_Social_Media_Icons_Widget
 *
 * Main widget class for the Sleek Social Media Icons plugin.
 */

class Sleek_Social_Media_Icons_Widget extends WP_Widget {


    /**
     * __construct function
     *
     * Sets up the widget and any necessary hooks.
     */

    public function __construct() {
        parent::__construct(
            'sleek_social_media_icons',
            __( 'Sleek Social Media Icons', 'sleek' ),
            array(
                'description' => __( 'A widget that displays sleek social media icons', 'sleek' ),
            )
        );
    }
 
    /**
     * widget function
     *
     * Outputs the widget content to the front-end.
     *
     * @param array $args     The widget arguments.
     * @param array $instance The widget instance.
     */

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        $SSIconSStyles_background = ! empty( $instance['sleek-social-icons-background'] ) ? $instance['sleek-social-icons-background'] : '';
        $SSIconSStyles_color = ! empty( $instance['sleek-social-icons-color'] ) ? $instance['sleek-social-icons-color'] : '';
        echo $SSIconSStyles_background; ?>

           <style>
            .sleek-social-media-icons a{
                background-color: <?php echo esc_html($SSIconSStyles_background); ?>;
                color: <?php echo esc_html($SSIconSStyles_color); ?> ; 
            }

            </style>
        <?php 

        echo '<div class="sleek-social-media-icons">';
         if($instance['facebook'] !='')
        echo '<a href="' . esc_url( $instance['facebook'] ) . '"><i class="fa-brands fa-facebook"></i></a>';
        if($instance['twitter'] !='')
        echo '<a href="' . esc_url( $instance['twitter'] ) . '"><i class="fab fa-twitter"></i></a>';
        if($instance['instagram'] !='')
        echo '<a href="' . esc_url( $instance['instagram'] ) . '"><i class="fab fa-instagram"></i></a>';
        if($instance['linkedin'] !='')
        echo '<a href="' . esc_url( $instance['linkedin'] ) . '"><i class="fab fa-linkedin"></i></a>';
        if($instance['youtube'] !='')
        echo '<a href="' . esc_url( $instance['youtube'] ) . '"><i class="fab fa-youtube"></i></a>';
        if($instance['whatsapp'] !='')
        echo '<a href="' . esc_url( $instance['whatsapp'] ) . '"><i class="fab fa-whatsapp"></i></a>';
        echo '</div>';

        echo $args['after_widget'];
    }


    /**
     * form function
     *
     * Outputs the widget form fields to the back-end.
     *
     * @param array $instance The widget instance.
     */

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Follow Us', 'sleek' );
        $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
        $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
        $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
        $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
        $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
        $whatsapp = ! empty( $instance['whatsapp'] ) ? $instance['whatsapp'] : '';
        $sleeksocialbg = ! empty( $instance['sleek-social-icons-background'] ) ? $instance['sleek-social-icons-background'] : '';
        $sleeksocialclr = ! empty( $instance['sleek-social-icons-color'] ) ? $instance['sleek-social-icons-color'] : '';

        echo '$sleeksocialbg'; 
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>

            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_url( $facebook ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_url( $twitter ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_url( $instagram ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'LinkedIn URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_url( $linkedin ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_url( $youtube ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'whatsapp' ); ?>"><?php _e( 'WhatsApp URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'whatsapp' ); ?>" name="<?php 
            echo $this->get_field_name( 'whatsapp' ); ?>" type="text" value="<?php echo esc_url( $whatsapp ); ?>">
        </p>

        <h3 class="sleek-social-icons-widget-h3-admin-header"> Style Settings </h3> <hr> 

        <p>
            <label for="<?php echo $this->get_field_id( 'sleek-social-icons-background' ); ?>">
            <?php _e( 'Icons Background:' ); ?></label>
            <input class="sleek-social-icons-widget-color-picker" 
            id="<?php echo $this->get_field_id( 'sleek-social-icons-background' ); ?>" 
            name="<?php 
            echo $this->get_field_name( 'sleek-social-icons-background' ); ?>" 
            type="text" value="<?php echo sanitize_text_field( $sleeksocialbg ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'sleek-social-icons-color' ); ?>">
            <?php _e( 'Icons Font Color:' ); ?></label>
            <input class="sleek-social-icons-widget-color-picker" 
            id="<?php echo $this->get_field_id( 'sleek-social-icons-color' ); ?>" 
            name="<?php 
            echo $this->get_field_name( 'sleek-social-icons-color' ); ?>" 
            type="text" value="<?php echo sanitize_text_field( $sleeksocialclr ); ?>">
        </p>
<?php 

    }


    /**
     * update function
     *
     * Handles saving the widget instance.
     *
     * @param array $new_instance The new widget instance.
     * @param array $old_instance The old widget instance.
     *
     * @return array The updated widget instance.
     */

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : __( 'Follow Us', 'sleek' );
        $instance['facebook'] = ! empty( $new_instance['facebook'] ) ? esc_url_raw( $new_instance['facebook'] ) : '';
        $instance['twitter'] = ! empty( $new_instance['twitter'] ) ? esc_url_raw( $new_instance['twitter'] ) : '';
        $instance['instagram'] = ! empty( $new_instance['instagram'] ) ? esc_url_raw( $new_instance['instagram'] ) : '';
        $instance['linkedin'] = ! empty( $new_instance['linkedin'] ) ? esc_url_raw( $new_instance['linkedin'] ) : '';
        $instance['youtube'] = ! empty( $new_instance['youtube'] ) ? esc_url_raw( $new_instance['youtube'] ) : '';
        $instance['whatsapp'] = ! empty( $new_instance['whatsapp'] ) ? esc_url_raw( $new_instance['whatsapp'] ) : '';
        $instance['sleek-social-icons-background'] = ! empty( $new_instance['sleek-social-icons-background'] ) ? esc_url_raw( $new_instance['sleek-social-icons-background'] ) : '';
        $instance['sleek-social-icons-color'] = ! empty( $new_instance['sleek-social-icons-color'] ) ? esc_url_raw( $new_instance['sleek-social-icons-color'] ) : '';

        return $instance;
    }
    
}

  /**
     * Register the widget
     *
     * register the widget with WordPress and set the necessary options
     */

function sleek_social_media_icons_register_widget() {
    register_widget( 'Sleek_Social_Media_Icons_Widget' );
}
add_action( 'widgets_init', 'sleek_social_media_icons_register_widget' );


/**
 * Enqueues FontAwesome CSS for the 'Sleek Social Media Icons' plugin
 *
 * This function uses the wp_enqueue_style function to enqueue the FontAwesome CSS file, 
 * which is located in the assets/fontawesome/css directory within the plugin.
 * The plugin_dir_url function is used to get the URL of the plugin's directory, 
 * and __FILE__ is a magic constant that holds the path of the current file.
 *
 * The add_action function is used to hook the sleek_social_media_icons_enqueue_fontawesome 
 * function to the wp_enqueue_scripts action, which is called when WordPress is loading 
 * the scripts for a page. This ensures that the FontAwesome CSS is loaded on every page of the website.
 *
 */

function sleek_social_media_icons_enqueue_fontawesome() {
    wp_enqueue_style( 'fontawesome', '//use.fontawesome.com/releases/v6.2.1/css/all.css' );

    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'front-sleek-social-icons-widget-styles',  $plugin_url . 'assets/css/sleek-social-icons-widget-styles.css',  array(), '1.0.0', false ); 
}
add_action( 'wp_enqueue_scripts', 'sleek_social_media_icons_enqueue_fontawesome' );

/***
 *  Add the admin css styles 
 */

function sleek_social_media_icons_widget_enqueue_admin_scripts(){

    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker', false, array('jquery'));

    wp_enqueue_style( 'admin-sleek-social-icons-widget-styles',  $plugin_url . 'assets/admin/css/admin-sleek-social-icons-widget-styles.css',  array(), '1.0.0', false );
    wp_enqueue_script( 'admin-sleek-social-icons-widget-scripts',  $plugin_url . 'assets/admin/js/admin-sleek-social-icons-widget-scripts.js', array( 'jquery' ), '1.0.0', false );  
}
add_action( 'admin_enqueue_scripts', 'sleek_social_media_icons_widget_enqueue_admin_scripts' );





