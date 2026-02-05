<?php
class LeKeFuPro {
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->plugin_name = 'lekefupro';
        $this->version = LEKEFUPRO_VERSION;
        
        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once LEKEFUPRO_PLUGIN_DIR . 'includes/class-lekefupro-loader.php';
        require_once LEKEFUPRO_PLUGIN_DIR . 'public/class-lekefupro-public.php';
        
        $this->loader = new LeKeFuPro_Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new LeKeFuPro_Admin($this->get_plugin_name(), $this->get_version());
        
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_plugin_admin_menu');
        $this->loader->add_action('admin_init', $plugin_admin, 'register_setting');
    }

    private function define_public_hooks() {
        $plugin_public = new LeKeFuPro_Public($this->get_plugin_name(), $this->get_version());
        
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
        $this->loader->add_action('wp_footer', $plugin_public, 'display_customer_service_icons');
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_version() {
        return $this->version;
    }

    public static function activate() {
        // 激活时创建必要的数据库表和默认选项
        $default_options = array(
            'enabled' => false,
            'qq_enabled' => false,
            'qq_qrcode' => '',
            'wechat_enabled' => false,
            'wechat_qrcode' => '',
            'phone_enabled' => false,
            'phone_number' => '',
            'wechat_mp_enabled' => false,
            'wechat_mp_qrcode' => ''
        );
        
        add_option('lekefupro_settings', $default_options);
    }

    public static function deactivate() {
        // 停用时的处理逻辑
    }

    public static function uninstall() {
        // 删除插件时清理数据
        delete_option('lekefupro_settings');
    }
} 