<?php
class LeKeFuPro_Admin {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, LEKEFUPRO_PLUGIN_URL . 'admin/css/lekefupro-admin.css', array(), $this->version, 'all');
        wp_enqueue_style('dashicons');
    }

    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, LEKEFUPRO_PLUGIN_URL . 'admin/js/lekefupro-admin.js', array('jquery'), $this->version, false);
        wp_enqueue_media();
    }

    public function add_plugin_admin_menu() {
        add_menu_page(
            '客服插件设置', // 页面标题
            'LeKeFuPro', // 菜单标题
            'manage_options', // 权限
            $this->plugin_name, // 菜单slug
            array($this, 'display_plugin_setup_page'), // 回调函数
            'dashicons-businessman' // 图标
        );
    }

    public function register_setting() {
        register_setting($this->plugin_name, 'lekefupro_settings', array($this, 'validate_settings'));
    }

    public function validate_settings($input) {
        $valid = array();
        
        $valid['enabled'] = isset($input['enabled']) ? true : false;
        $valid['qq_enabled'] = isset($input['qq_enabled']) ? true : false;
        $valid['qq_qrcode'] = sanitize_text_field($input['qq_qrcode']);
        $valid['wechat_enabled'] = isset($input['wechat_enabled']) ? true : false;
        $valid['wechat_qrcode'] = sanitize_text_field($input['wechat_qrcode']);
        $valid['phone_enabled'] = isset($input['phone_enabled']) ? true : false;
        $valid['phone_number'] = sanitize_text_field($input['phone_number']);
        $valid['wechat_mp_enabled'] = isset($input['wechat_mp_enabled']) ? true : false;
        $valid['wechat_mp_qrcode'] = sanitize_text_field($input['wechat_mp_qrcode']);
        
        return $valid;
    }

    public function display_plugin_setup_page() {
        $options = get_option('lekefupro_settings');
        include_once LEKEFUPRO_PLUGIN_DIR . 'admin/partials/lekefupro-admin-display.php';
    }
} 