<?php
/*
  If you would like to edit this file, copy it to your current theme's directory and edit it there.
  WPUF will always look in your theme's directory first, before using this default template.
 */
?>
<div class="login" id="wpuf-login-form">

    <?php

    $message = apply_filters( 'login_message', '' );
    if ( ! empty( $message ) ) {
        echo $message . "\n";
    }
    ?>

    <?php wpuf()->login->show_errors(); ?>
    <?php wpuf()->login->show_messages(); ?>

    <form name="loginform" class="wpuf-login-form" id="loginform" action="<?php echo $action_url; ?>" method="post">
        <div class="form-group">
            <div class="wpuf-label">
                <label for="wpuf-user_login">店家ID</label>
            </div>
            <div class="wpuf-fields">
                <input type="text" name="log" id="wpuf-user_login" class="input" value="" size="20" />
            </div>
        </div>
        <div class="form-group">
            <div class="wpuf-label">
                <label for="wpuf-user_pass">密碼</label>
            </div>
            <div class="wpuf-fields">
                <input type="password" name="pwd" id="wpuf-user_pass" class="input" value="" size="20" />
            </div>
        </div>

        <?php $recaptcha = wpuf_get_option( 'login_form_recaptcha', 'wpuf_profile', 'off'); ?>
        <?php if( $recaptcha == 'on' ) : ?>
            <p >
                <div class="wpuf-fields">
                    <?php echo recaptcha_get_html( wpuf_get_option( 'recaptcha_public', 'wpuf_general' ), true, null, is_ssl() ); ?>
                </div>
            </p>
        <?php endif; ?>

        <div class="forgetmenot">
            <input name="rememberme" type="checkbox" id="wpuf-rememberme" value="forever" />
            <label for="wpuf-rememberme">記住我的資訊</label>
        </div>
        <div class="wpuf-submit submit">
            <input type="submit" name="wp-submit" id="wp-submit" value="登入" />
            <input type="hidden" name="redirect_to" value="<?php echo wp_get_referer() ?>" />
            <input type="hidden" name="wpuf_login" value="true" />
            <input type="hidden" name="action" value="login" />
            <?php wp_nonce_field( 'wpuf_login_action' ); ?>
        </div>
        <p>
            <?php do_action( 'wpuf_login_form_bottom' ); ?>
        </p>
    </form>
    <div class="login-link">
        <a href="<?php echo get_home_url(); ?>/create/">註冊</a> | <a href="<?php echo get_home_url(); ?>/login/?action=lostpassword">忘記密碼</a>
    </div>
    <script>
        $('html').attr('id', 'login');
    </script>
</div>
