<?php
// 防止直接访问此文件
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap">
    <h2>LeKeFuPro 客服插件设置</h2>
    <p>客服图标设置。<a href="https://www.lezaiyun.com/902.html" target="_blank">插件介绍</a>（关注公众号：<span style="color: red;">老蒋朋友圈</span>）</p>
    <form method="post" action="options.php">
        <?php
            settings_fields('lekefupro');
            do_settings_sections('lekefupro');
        ?>
        
        <table class="form-table">
            <tr>
                <th scope="row">启用插件</th>
                <td>
                    <label>
                        <input type="checkbox" name="lekefupro_settings[enabled]" value="1" <?php checked(isset($options['enabled']) ? $options['enabled'] : false); ?> />
                        启用客服浮动图标
                    </label>
                </td>
            </tr>

            <!-- QQ设置 -->
            <tr>
                <th scope="row">QQ客服</th>
                <td>
                    <label>
                        <input type="checkbox" name="lekefupro_settings[qq_enabled]" value="1" <?php checked(isset($options['qq_enabled']) ? $options['qq_enabled'] : false); ?> />
                        启用QQ客服
                    </label>
                    <div class="image-upload-wrap">
                        <input type="hidden" name="lekefupro_settings[qq_qrcode]" id="qq_qrcode" value="<?php echo esc_attr(isset($options['qq_qrcode']) ? $options['qq_qrcode'] : ''); ?>" />
                        <button type="button" class="button upload-image" data-target="qq_qrcode">
                            上传QQ二维码
                        </button>
                        <div id="qq_qrcode_preview" class="image-preview">
                            <?php if (isset($options['qq_qrcode']) && !empty($options['qq_qrcode'])): ?>
                                <img src="<?php echo esc_url($options['qq_qrcode']); ?>" style="max-width:200px;" />
                            <?php endif; ?>
                        </div>
                    </div>
                </td>
            </tr>

            <!-- 微信设置 -->
            <tr>
                <th scope="row">微信客服</th>
                <td>
                    <label>
                        <input type="checkbox" name="lekefupro_settings[wechat_enabled]" value="1" <?php checked(isset($options['wechat_enabled']) ? $options['wechat_enabled'] : false); ?> />
                        启用微信客服
                    </label>
                    <div class="image-upload-wrap">
                        <input type="hidden" name="lekefupro_settings[wechat_qrcode]" id="wechat_qrcode" value="<?php echo esc_attr(isset($options['wechat_qrcode']) ? $options['wechat_qrcode'] : ''); ?>" />
                        <button type="button" class="button upload-image" data-target="wechat_qrcode">
                            上传微信二维码
                        </button>
                        <div id="wechat_qrcode_preview" class="image-preview">
                            <?php if (isset($options['wechat_qrcode']) && !empty($options['wechat_qrcode'])): ?>
                                <img src="<?php echo esc_url($options['wechat_qrcode']); ?>" style="max-width:200px;" />
                            <?php endif; ?>
                        </div>
                    </div>
                </td>
            </tr>

            <!-- 电话设置 -->
            <tr>
                <th scope="row">电话客服</th>
                <td>
                    <label>
                        <input type="checkbox" name="lekefupro_settings[phone_enabled]" value="1" <?php checked(isset($options['phone_enabled']) ? $options['phone_enabled'] : false); ?> />
                        启用电话客服
                    </label>
                    <div>
                        <input type="text" name="lekefupro_settings[phone_number]" value="<?php echo esc_attr(isset($options['phone_number']) ? $options['phone_number'] : ''); ?>" class="regular-text" placeholder="请输入客服电话号码" />
                    </div>
                </td>
            </tr>

            <!-- 公众号设置 -->
            <tr>
                <th scope="row">微信公众号</th>
                <td>
                    <label>
                        <input type="checkbox" name="lekefupro_settings[wechat_mp_enabled]" value="1" <?php checked(isset($options['wechat_mp_enabled']) ? $options['wechat_mp_enabled'] : false); ?> />
                        启用微信公众号
                    </label>
                    <div class="image-upload-wrap">
                        <input type="hidden" name="lekefupro_settings[wechat_mp_qrcode]" id="wechat_mp_qrcode" value="<?php echo esc_attr(isset($options['wechat_mp_qrcode']) ? $options['wechat_mp_qrcode'] : ''); ?>" />
                        <button type="button" class="button upload-image" data-target="wechat_mp_qrcode">
                            上传公众号二维码
                        </button>
                        <div id="wechat_mp_qrcode_preview" class="image-preview">
                            <?php if (isset($options['wechat_mp_qrcode']) && !empty($options['wechat_mp_qrcode'])): ?>
                                <img src="<?php echo esc_url($options['wechat_mp_qrcode']); ?>" style="max-width:200px;" />
                            <?php endif; ?>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <?php submit_button('保存设置'); ?>
    </form>
</div> 
<p><img width="150" height="150" src="<?php echo plugins_url('/images/wechat.png', __FILE__); ?>" alt="扫码关注公众号" /></p>