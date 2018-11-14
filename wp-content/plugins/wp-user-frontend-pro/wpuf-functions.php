<?php
//挖鱼源码网 
?>
<?php  

add_action('plugins_loaded','wpuf_pro_load_plugin');
class WP_User_Frontend_Pro
{
	public function __construct()
	{
		if (!class_exists('WP_User_Frontend')) 
		{
			if (!current_user_can('manage_options')) 
			{
				return null;
			}
			add_action('admin_notices',array(0=>$this,1=>'wpuf_activation_notice'));
			add_action('wp_ajax_wpuf_pro_install_wp_user_frontend',array(0=>$this,1=>'install_wp_user_frontend'));
		}
		$this->define_constants();
		$this->includes();
		$this->instantiate();
		$this->init_actions();
	}
	public static function init()
	{
		$instance=new WP_User_Frontend_Pro();
	}
	public function wpuf_activation_notice()
	{
		echo '        <div class="updated" id="wpuf-pro-installer-notice" style="padding: 1em; position: relative;">
           <h2>';
		_e('您的WP用户前端专业版已经安装成功!','wpuf-pro');
		echo '</h2>

           ';
		$plugin_file=basename(dirname(__FILE__)).'/wpuf-pro.php';
		$core_plugin_file='wp-user-frontend/wpuf.php';
		echo '            <a href="';
		echo wp_nonce_url('plugins.php?action=deactivate&amp;plugin='.$plugin_file.'&amp;plugin_status=all&amp;paged=1&amp;s=','deactivate-plugin_'.$plugin_file);
		echo '" class="notice-dismiss" style="text-decoration: none;" title="';
		_e('关闭通知','wpuf-pro');
		echo '"></a>

           ';
		if ((file_exists(WP_PLUGIN_DIR.'/'.$core_plugin_file) && is_plugin_inactive('wpuf-user-frontend'))) 
		{
			echo '                <p>';
			_e('你还需要激活核心插件，才能使用完整功能。','wpuf-pro');
			echo '</p>
               <p>
                   <a class="button button-primary" href="';
			echo wp_nonce_url('plugins.php?action=activate&amp;plugin='.$core_plugin_file.'&amp;plugin_status=all&amp;paged=1&amp;s=','activate-plugin_'.$core_plugin_file);
			echo '"  title="';
			_e('激活插件','wpuf-pro');
			echo '">';
			_e('立即激活','wpuf-pro');
			echo '</a>
               </p>
           ';
		}
		else 
		{
			echo '                <p>';
			echo sprintf(__('您只需要安装 %sCore Plugin%s 即可实现。','wpuf-pro'),'<a target="_blank" href="https://wordpress.org/plugins/wp-user-frontend/">','</a>');
			echo '</p>

               <p>
                   <button id="wpuf-pro-installer" class="button">';
			_e('现在安装','wpuf-pro');
			echo '</button>
               </p>
           ';
		}
		echo "
       </div>

       <script type=\"text/javascript\">
           (function (\$) {
               var wrapper = \$('#wpuf-pro-installer-notice');

               wrapper.on('click', '#wpuf-pro-installer', function (e) {
                   var self = \$(this);

                   e.preventDefault();
                   self.addClass('install-now updating-message');
                   self.text('";
		echo esc_js('Installing...','wpuf-pro');
		echo '\');

                   var data = {
                       action: \'wpuf_pro_install_wp_user_frontend\',
                       _wpnonce: \'';
		echo wp_create_nonce('wpuf-pro-installer-nonce');
		echo '\'
                   };

                   $.post(ajaxurl, data, function (response) {
                       if (response.success) {
                           self.attr(\'disabled\', \'disabled\');
                           self.removeClass(\'install-now updating-message\');
                           self.text(\'';
		echo esc_js('Installed','wpuf-pro');
		echo '\');

                           window.location.reload();
                       }
                   });
               });
           })(jQuery);
       </script>
       ';
	}
	public function install_wp_user_frontend()
	{
		if ((!isset($_REQUEST['_wpnonce']) || !wp_verify_nonce($_REQUEST['_wpnonce'],'wpuf-pro-installer-nonce'))) 
		{
			wp_send_json_error(__('Error: Nonce verification failed','wpuf-pro'));
		}
		include_once(ABSPATH.'wp-admin/includes/plugin-install.php');
		include_once(ABSPATH.'wp-admin/includes/class-wp-upgrader.php');
		$plugin='wp-user-frontend';
		$api=plugins_api('plugin_information',array('slug'=>$plugin,'fields'=>array('sections'=>false)));
		$upgrader=new Plugin_Upgrader(new WP_Ajax_Upgrader_Skin());
		$result=$upgrader->install($api->download_link);
		if (is_wp_error($result)) 
		{
			wp_send_json_error($result);
		}
		$result=activate_plugin('wp-user-frontend/wpuf.php');
		if (is_wp_error($result)) 
		{
			wp_send_json_error($result);
		}
		wp_send_json_success();
	}
	private function define_constants()
	{
		define('WPUF_PRO_VERSION','4.0.1');
		define('WPUF_PRO_FILE',__FILE__);
		define('WPUF_PRO_ROOT',dirname(__FILE__));
		define('WPUF_PRO_INCLUDES',WPUF_PRO_ROOT.'/includes');
		define('WPUF_PRO_ROOT_URI',plugins_url('',__FILE__));
		define('WPUF_PRO_ASSET_URI',WPUF_PRO_ROOT_URI.'/assets');
	}
	public function includes()
	{
		require_once(WPUF_ROOT.'/class/render-form.php');
		require_once(WPUF_PRO_INCLUDES.'/login.php');
		require_once(WPUF_PRO_INCLUDES.'/frontend-form-profile.php');
		if (is_admin()) 
		{
			require_once(WPUF_ROOT.'/admin/posting.php');
			require_once(WPUF_ROOT.'/admin/template.php');
			require_once(WPUF_ROOT.'/admin/installer.php');
			require_once(WPUF_ROOT.'/admin/template-post.php');
			require_once(WPUF_ROOT.'/class/subscription.php');
			require_once(WPUF_PRO_ROOT.'/admin/coupon.php');
			require_once(WPUF_PRO_ROOT.'/admin/coupon-element.php');
			require_once(WPUF_PRO_ROOT.'/admin/posting-profile.php');
			require_once(WPUF_PRO_ROOT.'/admin/template-profile.php');
			require_once(WPUF_PRO_ROOT.'/admin/pro-page-installer.php');
			require_once(WPUF_PRO_ROOT.'/admin/profile-forms-list-table.php');
		}
		require_once(WPUF_ROOT.'/admin/template.php');
		require_once(WPUF_ROOT.'/admin/template-post.php');
		require_once(WPUF_ROOT.'/class/subscription.php');
		require_once(WPUF_PRO_INCLUDES.'/class-render-form.php');
		require_once(WPUF_PRO_INCLUDES.'/form.php');
		require_once(WPUF_PRO_INCLUDES.'/profile-form.php');
		require_once(WPUF_PRO_INCLUDES.'/form-element.php');
		require_once(WPUF_PRO_INCLUDES.'/content-restriction.php');
		require_once(WPUF_PRO_INCLUDES.'/subscription.php');
		require_once(WPUF_PRO_INCLUDES.'/coupons.php');
		require_once(WPUF_PRO_INCLUDES.'/render-form.php');
	}
	public function instantiate()
	{
		WPUF_Login::init();
		new WPUF_Frontend_Form_Profile();
		new WPUF_Content_Restriction();
		new WPUF_Pro_Render_Form();
		if (is_admin()) 
		{
			new WPUF_Admin_Form_Pro();
			new WPUF_Admin_Profile_Form_Pro();
			new WPUF_Admin_Posting_Profile();
			new WPUF_Admin_Coupon();
			WPUF_Coupons::init();
		}
	}
	public function init_actions()
	{
		add_action('init',array(0=>$this,1=>'load_textdomain'));
		add_action('wpuf_admin_subscription_detail',array(0=>$this,1=>'wpuf_admin_subscription_detail_runner'),10,4);
		add_action('wpuf_update_subscription_pack',array(0=>$this,1=>'wpuf_update_subscription_pack_runner'),10,2);
		add_filter('wpuf_get_subscription_meta',array(0=>$this,1=>'wpuf_get_subscription_meta_runner'),10,2);
		add_filter('wpuf_new_subscription',array(0=>$this,1=>'wpuf_new_subscription_runner'),10,4);
		add_action('wpuf_coupon_settings_form',array(0=>$this,1=>'wpuf_coupon_settings_form_runner'),10,1);
		add_action('wpuf_check_save_permission',array(0=>$this,1=>'wpuf_check_save_permission_runner'),10,2);
		add_action('wpuf_admin_menu_top',array(0=>$this,1=>'admin_menu_top'));
		add_action('wpuf_admin_menu',array(0=>$this,1=>'admin_menu'));
		add_filter('wpuf_options_others',array(0=>$this,1=>'wpuf_pro_settings_fields'));
		add_filter('wpuf_pro_page_install',array(0=>$this,1=>'install_pro_pages'),10,1);
		add_filter('wpuf_custom_field_render',array(0=>$this,1=>'render_custom_fields'),99,4);
		add_action('trash_post',array(0=>$this,1=>'delete_post_function'));
		add_action('wpuf_get_post_form_templates',array(0=>$this,1=>'post_form_templates'));
	}
	public function load_textdomain()
	{
		load_plugin_textdomain('wpuf-pro',false,dirname(plugin_basename(__FILE__)).'/languages-DaiYunXuan-finished/');
	}
	public function admin_menu_top()
	{
		$capability=wpuf_admin_role();
		$profile_forms_page=add_submenu_page('wp-user-frontend',__('Registration Forms','wpuf-pro'),__('Registration Forms','wpuf-pro'),$capability,'wpuf-profile-forms',array(0=>$this,1=>'wpuf_profile_forms_page'));
		add_action('load-'.$profile_forms_page,array(0=>$this,1=>'footer_styles'));
	}
	public function wpuf_profile_forms_page()
	{
		$action=(isset($_GET['action'])?$_GET['action']:NULL);
		$add_new_page_url=admin_url('admin.php?page=wpuf-profile-forms&action=add-new');
		switch($action)
		{
			case 'edit':require_once(WPUF_PRO_ROOT.'/views/profile-form.php');
			break;
			case 'add-new':require_once(WPUF_PRO_ROOT.'/views/profile-form.php');
			break;
		}
		require_once(WPUF_PRO_ROOT.'/admin/profile-forms-list-table-view.php');
	}
	public function footer_styles()
	{
		echo '<style type="text/css">
           .column-user_role { width:12% !important; overflow:hidden }
       </style>';
	}
	public function admin_menu()
	{
		$capability=wpuf_admin_role();
		add_submenu_page('wp-user-frontend',__('Coupons','wpuf-pro'),__('Coupons','wpuf-pro'),$capability,'edit.php?post_type=wpuf_coupon');
	}
	public function wpuf_pro_settings_fields($wpuf_general_fields)
	{
		$pro_settings_fields=array(0=>array('name'=>'gmap_api_key','label'=>__('Google Map API','wpuf'),'desc'=>__('<a target="_blank" href="https://developers.google.com/maps/documentation/javascript">API</a> key is needed to render Google Maps','wpuf')));
		$wpuf_general_settings=array_merge($wpuf_general_fields,$pro_settings_fields);
		return $wpuf_general_settings;
	}
	public function wpuf_admin_subscription_detail_runner($sub_meta,$hidden_recurring_class,$hidden_trial_class,$obj)
	{
		WPUF_pro_subscription_element::add_subscription_element($sub_meta,$hidden_recurring_class,$hidden_trial_class,$obj);
	}
	public function wpuf_coupon_settings_form_runner($obj)
	{
		WPUF_pro_Coupon_Elements::add_coupon_elements($obj);
	}
	public function wpuf_check_save_permission_runner($post,$update)
	{
		WPUF_pro_Coupon_Elements::check_saving_capability($post,$update);
	}
	public function install_pro_pages($profile_options)
	{
		$wpuf_pro_page_installer=new wpuf_pro_page_installer();
		return $wpuf_pro_page_installer->install_pro_version_pages($profile_options);
	}
	public function wpuf_update_subscription_pack_runner($subscription_id,$post)
	{
		WPUF_pro_subscription_element::update_subcription_data($subscription_id,$post);
	}
	public function wpuf_get_subscription_meta_runner($meta,$subscription_id)
	{
		return WPUF_pro_subscription_element::get_subscription_metadata($meta,$subscription_id);
	}
	public function wpuf_new_subscription_runner($user_meta,$user_id,$pack_id,$recurring)
	{
		return WPUF_pro_subscription_element::set_subscription_meta_to_user($user_meta,$user_id,$pack_id,$recurring);
	}
	public function delete_post_function($post_id)
	{
		WPUF_pro_subscription_element::restore_post_numbers($post_id);
	}
	public function render_custom_fields($html,$value,$attr,$form_settings)
	{
		switch($attr['input_type'])
		{
			case 'ratings':$ratings_html='';
			foreach($attr['options'] as $key=>$option)
			{
				$ratings_html .='<option value="'.$key.'" '.(in_array($key,$value) ? 'selected' : '').'>'.$option.'</option>';
			}
			$js='<script type="text/javascript">';
			break;
			case 'repeat':$multiple=(isset($attr['multiple'])?$attr['multiple']=='true':(isset($attr['multiple']) ? true : false));
			if (!$multiple) 
			{
				$value=(isset($value['0'])?$value["\\60"]:'');
				$value=explode(WPUF_Render_Form::$separator,$value);
				$html .=sprintf('<li><label>%s</label>: %s</li>',$attr['label'],implode(', ',$value));
			}
			break;
		}
		return $html;
	}
	public function post_form_templates($integrations)
	{
		require_once(WPUF_PRO_INCLUDES.'/post-form-templates/woocommerce.php');
		$integrations['WPUF_Post_Form_Template_WooCommerce']=new WPUF_Post_Form_Template_WooCommerce();
		return $integrations;
	}
}
function wpuf_pro_load_plugin()
{
	WP_User_Frontend_Pro::init();
}
?>