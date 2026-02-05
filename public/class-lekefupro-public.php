<?php
class LeKeFuPro_Public {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name, LEKEFUPRO_PLUGIN_URL . 'public/css/lekefupro-public.css', array(), $this->version, 'all');
        wp_enqueue_style('dashicons');
    }

    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name, LEKEFUPRO_PLUGIN_URL . 'public/js/lekefupro-public.js', array('jquery'), $this->version, true);
    }

    public function display_customer_service_icons() {
        $options = get_option('lekefupro_settings');
        
        // 如果插件未启用，直接返回
        if (!isset($options['enabled']) || !$options['enabled']) {
            return;
        }

        include_once LEKEFUPRO_PLUGIN_DIR . 'public/partials/lekefupro-public-display.php';
    }
} 