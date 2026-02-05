jQuery(document).ready(function($) {
    'use strict';

    // 处理图片上传
    $('.upload-image').on('click', function(e) {
        e.preventDefault();

        var button = $(this);
        var targetId = button.data('target');
        var customUploader = wp.media({
            title: '选择图片',
            button: {
                text: '使用此图片'
            },
            multiple: false
        });

        customUploader.on('select', function() {
            var attachment = customUploader.state().get('selection').first().toJSON();
            $('#' + targetId).val(attachment.url);
            $('#' + targetId + '_preview').html('<img src="' + attachment.url + '" style="max-width:200px;" />');
        });

        customUploader.open();
    });
}); 