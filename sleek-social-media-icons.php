<?php

/*
Plugin Name: Sleek Social Media Icons
Description: A widget that displays sleek social media icons
Version: 1.0
Author: Your Name
*/

class Sleek_Social_Media_Icons_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'sleek_social_media_icons',
            __( 'Sleek Social Media Icons', 'sleek' ),
            array(
                'description' => __( 'A widget that displays sleek social media icons', 'sleek' ),
            )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        echo '<div class="sleek-social-media-icons">';
        echo '<a href="' . esc_url( $instance['facebook'] ) . '"><i class="fab fa-facebook"></i></a>';
        echo '<a href="' . esc_url( $instance['twitter'] ) . '"><i class="fab fa-twitter"></i></a>';
        echo '<a href="' . esc_url( $instance['instagram'] ) . '"><i class="fab fa-instagram"></i></a>';
        echo '<a href="' . esc_url( $instance['linkedin'] ) . '"><i class="fab fa-linkedin"></i></a>';
        echo '<a href="' . esc_url( $instance['youtube'] ) . '"><i class="fab fa-youtube"></i></a>';
        echo '<a href="' . esc_url( $instance['whatsapp'] ) . '"><i class="fab fa-whatsapp"></i></a>';
        echo '</div>';

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Follow Us', 'sleek' );
        $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
        $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
        $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
        $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
        $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
        $whatsapp = ! empty( $instance['whatsapp'] ) ? $instance['whatsapp'] : '';
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


<?php 

    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : __( 'Follow Us', 'sleek' );
        $instance['facebook'] = ! empty( $new_instance['facebook'] ) ? esc_url_raw( $new_instance['facebook'] ) : '';
        $instance['twitter'] = ! empty( $new_instance['twitter'] ) ? esc_url_raw( $new_instance['twitter'] ) : '';
        $instance['instagram'] = ! empty( $new_instance['instagram'] ) ? esc_url_raw( $new_instance['instagram'] ) : '';
        $instance['linkedin'] = ! empty( $new_instance['linkedin'] ) ? esc_url_raw( $new_instance['linkedin'] ) : '';
        $instance['youtube'] = ! empty( $new_instance['youtube'] ) ? esc_url_raw( $new_instance['youtube'] ) : '';
        $instance['whatsapp'] = ! empty( $new_instance['whatsapp'] ) ? esc_url_raw( $new_instance['whatsapp'] ) : '';
        return $instance;
    }
    



}


function sleek_social_media_icons_register_widget() {
    register_widget( 'Sleek_Social_Media_Icons_Widget' );
}
add_action( 'widgets_init', 'sleek_social_media_icons_register_widget' );
