<?php
/*
* Plugin Name: نوار اطلاع رسانی | ایمن وب
* Plugin Uri: https://wordpress.org/plugins/plugins-notification-bar
* Description: نمایش نوتیفیکیشن در سایت با سفارشی سازی کامل
* Version: 1.4
* Author: ایمن وب
* Author Uri: https://instagram.com/imenweb.ir
*/

add_action('admin_menu','notification_bar_admin_menu');
function notification_bar_admin_menu() {
  add_menu_page('نوار اطلاع رسانی','نوار اطلاع رسانی','manage_options','notification_bar','notification_bar_settings',' dashicons-bell','6');
}

function notification_bar_settings() {
  if (isset($_POST['save'])) {
    $notification = sanitize_text_field($_POST['notification-bar-text']);
    $notification_bacground_color = sanitize_text_field($_POST['bg-color']);
    $notification_text_color = sanitize_text_field($_POST['txt-color']);
    $notification_text_fonts = sanitize_text_field($_POST['fonts']);
    $notification_btn_txt = sanitize_text_field($_POST['btn-txt']);
    $notification_btn_url = sanitize_text_field($_POST['btn-url']);
    $notification_btn_bg_color = sanitize_text_field($_POST['btn-bg-color']);
    $notification_btn_txt_color = sanitize_text_field($_POST['btn-txt-color']);
    update_option('notification',$notification);
    update_option('notification_bg_color',$notification_bacground_color);
    update_option('notification_txt_color',$notification_text_color);
    update_option('notification_bar_fonts',$notification_text_fonts);
    update_option('notification_btn_txt',$notification_btn_txt);
    update_option('notification_btn_url',$notification_btn_url);
    update_option('notification_btn_bg_color',$notification_btn_bg_color);
    update_option('notification_btn_txt_color',$notification_btn_txt_color);
    echo '<div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible">
<p><strong>تنظیمات ذخیره شد.</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">رد کردن این اخطار</span></button></div>';
  }
  ?>
  <form action="" method="post" style="margin-top: 20px;">
    <span style="font-size: 25px;">نوار اطلاع رسانی</span>
    <br><br>
    <label for="notification_bar_text">متن نوار اطلاع رسانی: </label>
    <input type="text" class="regular-text" name="notification-bar-text" value="<?php echo esc_attr(get_option('notification')); ?>">
    <br><br>
    <label for="bg-color">رنگ پس زمینه نوار اطلاع رسانی: </label>
    <input type="color" name="bg-color" style="width: 70px;" value="<?php echo esc_attr(get_option('notification_bg_color'));  ?>">
    <br><br>
    <label for="txt-color">رنگ متن نوار اطلاع رسانی: </label>
    <input type="color" name="txt-color" style="width: 70px;" value="<?php echo esc_attr(get_option('notification_txt_color'));  ?>">
    <br><br><br><br>
    <span style="font-size: 20px;">فونت متن:</span>
    <br><br>
    <label for="fonts">بی کودک</label>
    <input name="fonts" type="radio" value="bkoodk">
    <br><br>
    <label for="fonts">بی تیتر</label>
    <input name="fonts" type="radio" value="btitr">
    <br><br>
    <label for="fonts">میخک</label>
    <input name="fonts" type="radio" value="mikhak">
    <br><br>
    <label for="fonts">بی زر</label>
    <input name="fonts" type="radio" value="bzar">
    <br><br><br><br>
    <span style="font-size: 20px;">دکمه:</span>
    <br><br>
    <label for="txt-color">متن دکمه:</label>
    <input type="text" name="btn-txt" style="width: 200px;" value="<?php echo esc_attr(get_option('notification_btn_txt'));  ?>">
    <br><br>
    <label for="txt-color">لینک دکمه:</label>
    <input type="text" name="btn-url" style="width: 600px;" value="<?php echo esc_attr(get_option('notification_btn_url'));  ?>">
    <br><br>
    <label for="txt-color">رنگ پس زمینه دکمه:</label>
    <input type="color" name="btn-bg-color" style="width: 70px;" value="<?php echo esc_attr(get_option('notification_btn_bg_color'));  ?>">
    <br><br>
    <label for="txt-color">رنگ متن دکمه:</label>
    <input type="color" name="btn-txt-color" style="width: 70px;" value="<?php echo esc_attr(get_option('notification_btn_txt_color'));  ?>">
    <br><br>
    <input type="submit" name="save" style="margin-top: 20px;" class="button button-primary" value="ذخیره تنظیمات">
  </form>
  <?php
}
include('notification-bar.php');
