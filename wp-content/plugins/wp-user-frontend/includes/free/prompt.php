<?php

/**
 * Free to Pro prompter class
 *
 * @package WPUF
 */
class WPUF_Pro_Prompt {

    public static function get_pro_prompt() {
        echo '<h3 class="wpuf-pro-text-alert">' . self::get_pro_prompt_text() . '</h3>';
    }

    public static function get_pro_url() {
        return 'https://www.wpzt.cn/product/wp-user-frontend-pro';
    }

    public static function get_pro_prompt_text() {
        return sprintf( 'Available in <a href="%s" target="_blank">Pro Version</a>', self::get_pro_url() );
    }
}