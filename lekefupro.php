<?php
/**
 * Plugin Name: LeKeFuPro
 * Plugin URI: https://www.lezaiyun.com/902.html
 * Description: 一个专业的WordPress客服浮动图标插件，支持QQ、微信、电话、公众号等客服功能。公众号：<span style="color: red;">老蒋朋友圈</span>
 * Version: 1.0.0
 * Author: 老蒋和他的小伙伴
 * Author URI: https://www.lezaiyun.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: lekefupro
 */

// 防止直接访问此文件
if (!defined('ABSPATH')) {
    exit;
}

// 定义插件常量
define('LEKEFUPRO_VERSION', '1.0.0');
define('LEKEFUPRO_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('LEKEFUPRO_PLUGIN_URL', plugin_dir_url(__FILE__));

// 包含必要的文件
require_once LEKEFUPRO_PLUGIN_DIR . 'includes/class-lekefupro.php';
require_once LEKEFUPRO_PLUGIN_DIR . 'admin/class-lekefupro-admin.php';

// 激活插件时的钩子
register_activation_hook(__FILE__, array('LeKeFuPro', 'activate'));

// 停用插件时的钩子
register_deactivation_hook(__FILE__, array('LeKeFuPro', 'deactivate'));

// 卸载插件时的钩子
register_uninstall_hook(__FILE__, array('LeKeFuPro', 'uninstall'));

// 初始化插件
function run_lekefupro() {
    $plugin = new LeKeFuPro();
    $plugin->run();
}
run_lekefupro(); 