<?php
add_action('wp_footer','notification_bar');
 function notification_bar() {
   ?>
   <div id="notification_bar" style="transition: 250ms; padding: 0px 2%; background: <?php echo esc_attr(get_option('notification_bg_color'));  ?>; width: 98%; height: 50px; position: fixed; bottom: 0px; z-index: 100000000;">
     <span style="font-family: <?php echo esc_attr(get_option('notification_bar_fonts')); ?>; font-size: 25px; color: <?php echo esc_attr(get_option('notification_txt_color'));  ?>;"><?php echo esc_attr(get_option('notification')); ?></span>
     <img src="<?php echo plugins_url('close.png',__FILE__); ?>" onclick="close_notification_bar()" style="float: left; cursor: pointer; margin-left: 5px; margin-top: 7.5px;width: 35px; height: 35px; float: left;">
     <a target="_blank" href="<?php echo esc_attr(get_option('notification_btn_url')); ?>" style="font-family: <?php echo esc_attr(get_option('notification_bar_fonts')); ?>; color: <?php echo esc_attr(get_option('notification_btn_txt_color')); ?>; border-radius: 30px; padding: 0px 10px; background: <?php echo esc_attr(get_option('notification_btn_bg_color')); ?>;font-size: 20px; float: left; margin-top: 7px; margin-left: 10px;"><?php echo get_option('notification_btn_txt'); ?></a>
   </div>
   <?php
 }
 function notification_bar_script() {
    wp_enqueue_script('notification-bar-script.js',plugins_url('notification-bar-script.js',__FILE__),'','','true');
 }
 function notification_bar_style() {
    wp_enqueue_style('notification-bar-style.css',plugins_url('notification-bar-style.css',__FILE__),'','','');
}
add_action( 'wp_enqueue_scripts', 'notification_bar_style' );
add_action('wp_enqueue_scripts','notification_bar_script');
