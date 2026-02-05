<?php
// 防止直接访问此文件
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="lekefupro-container">
    <div class="lekefupro-icons">
        <?php if (isset($options['qq_enabled']) && $options['qq_enabled'] && !empty($options['qq_qrcode'])): ?>
        <div class="lekefupro-icon-item">
            <span class="dashicons dashicons-businessman"></span>
            <div class="lekefupro-qrcode">
                <img src="<?php echo esc_url($options['qq_qrcode']); ?>" alt="QQ客服" />
                <p>扫码添加QQ客服</p>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($options['wechat_enabled']) && $options['wechat_enabled'] && !empty($options['wechat_qrcode'])): ?>
        <div class="lekefupro-icon-item">
            <span class="dashicons dashicons-whatsapp"></span>
            <div class="lekefupro-qrcode">
                <img src="<?php echo esc_url($options['wechat_qrcode']); ?>" alt="微信客服" />
                <p>扫码添加微信客服</p>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($options['phone_enabled']) && $options['phone_enabled'] && !empty($options['phone_number'])): ?>
        <div class="lekefupro-icon-item">
            <span class="dashicons dashicons-phone"></span>
            <div class="lekefupro-qrcode">
                <p class="phone-number"><?php echo esc_html($options['phone_number']); ?></p>
                <p>点击拨打电话</p>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($options['wechat_mp_enabled']) && $options['wechat_mp_enabled'] && !empty($options['wechat_mp_qrcode'])): ?>
        <div class="lekefupro-icon-item">
            <span class="dashicons dashicons-megaphone"></span>
            <div class="lekefupro-qrcode">
                <img src="<?php echo esc_url($options['wechat_mp_qrcode']); ?>" alt="微信公众号" />
                <p>扫码关注公众号</p>
            </div>
        </div>
        <?php endif; ?>

        <div class="lekefupro-icon-item scroll-to-top">
            <span class="dashicons dashicons-arrow-up-alt"></span>
        </div>
    </div>
</div> 