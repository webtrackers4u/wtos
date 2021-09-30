
<?
global $site;
$tmce_base_url = $site["url"]."vendor/tinymce/tinymce";
?>
<script src="<?= $tmce_base_url."/tinymce.min.js"?>"></script>
<script>
    tinyMCE.baseURL = "<?= $tmce_base_url?>";// trailing slash important
    tinymce.suffix = ".min";

    function tmce(id) {
        tinymce.execCommand('mceRemoveControl', true, id);
        tinyMCE.init({
            // General options
            mode : "exact",
            selector: "#"+id,
            forced_root_block : '',
            //force_br_newlines : true,
            //force_p_newlines : false,

            plugins: 'codesample print preview  importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime lists wordcount  imagetools textpattern noneditable help  charmap  quickbars  emoticons',

            menubar: 'file edit view insert format tools table tc help',
            toolbar: 'bold italic underline strikethrough |  fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | subscript superscript | numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample |  ltr rtl | codesample ',

            // Example word content CSS (should be your site CSS) this one removes paragraph margins
            //content_css : "css/word.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            },
            file_picker_callback: function(callback, value, meta) {
                window["tmce_rest"] = {
                    callback:callback,
                    value: value,
                    meta: meta
                }
                // Provide file and text for the link dialog
                if (meta.filetype === 'file') {
                    callback('mypage.html', {text: 'My text'});
                }

                // Provide image and alt text for the image dialog
                if (meta.filetype === 'image') {
                    window.open("<?=$site["url-wtos"]?>/wtosImageUploader.php", "", "width=700,height=500");
                }

                // Provide alternative source and posted for the media dialog
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
                }
            }
        });
    }
    function tmce_inline(id) {
        tinymce.execCommand('mceRemoveControl', true, id);
        tinyMCE.init({
            // General options
            mode : "exact",
            inline: true,
            selector: "#"+id,
            forced_root_block : '',
            force_br_newlines : true,
            force_p_newlines : false,

            plugins: 'codesample print preview  importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime lists wordcount  imagetools textpattern noneditable help  charmap  quickbars  emoticons',

            menubar: 'file edit view insert format tools table tc help',
            toolbar: 'bold italic underline strikethrough |  fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | subscript superscript | numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample |  ltr rtl | codesample ',

            // Example word content CSS (should be your site CSS) this one removes paragraph margins
            //content_css : "css/word.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            },
            file_picker_callback: function(callback, value, meta) {
                window["tmce_rest"] = {
                    callback:callback,
                    value: value,
                    meta: meta
                }
                // Provide file and text for the link dialog
                if (meta.filetype === 'file') {
                    callback('mypage.html', {text: 'My text'});
                }

                // Provide image and alt text for the image dialog
                if (meta.filetype === 'image') {
                    window.open("<?=$site["url-wtos"]?>/wtosImageUploader.php", "", "width=700,height=500");
                }

                // Provide alternative source and posted for the media dialog
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
                }
            }
        });
    }


    const tmce_params = {
        // General options
        mode : "exact",
        selector: ".tmce",
        forced_root_block : '',
        force_br_newlines : true,
        force_p_newlines : false,

        //plugins: 'print preview  importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime lists wordcount  imagetools textpattern noneditable help  charmap  quickbars  emoticons codesample',

        plugins :'code',
        menubar: 'file edit view insert format tools table tc help tools',
        toolbar: 'bold italic underline strikethrough |  fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | subscript superscript | numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample |  ltr rtl |codesample | code',

        // Example word content CSS (should be your site CSS) this one removes paragraph margins
        //content_css : "css/word.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
            username : "Some User",
            staffid : "991234"
        },
        file_picker_callback: function(callback, value, meta) {
            window["tmce_rest"] = {
                callback:callback,
                value: value,
                meta: meta
            }
            // Provide file and text for the link dialog
            if (meta.filetype === 'file') {
                callback('mypage.html', {text: 'My text'});
            }

            // Provide image and alt text for the image dialog
            if (meta.filetype === 'image') {
                window.open("<?=$site["url-wtos"]?>/wtosImageUploader.php", "", "width=700,height=500");
            }

            // Provide alternative source and posted for the media dialog
            if (meta.filetype === 'media') {
                callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
            }
        }
    }
    tinyMCE.init(tmce_params);
</script>
