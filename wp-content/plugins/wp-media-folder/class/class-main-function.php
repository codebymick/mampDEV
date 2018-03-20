<?php
// Prohibit direct script loading
defined('ABSPATH') || die('No direct script access allowed!');
class Wpmf_main {
    /* Create thumbnail after replace */
    function createThumbs($filepath, $extimage, $metadata, $post_id) {

        if (isset($metadata['sizes']) && is_array($metadata['sizes'])) {
            $uploadpath = wp_upload_dir();
            foreach ($metadata['sizes'] as $size => $sizeinfo) {
                $intermediate_file = str_replace(basename($filepath), $sizeinfo['file'], $filepath);
                $intermediate_file = apply_filters('wp_delete_file', $intermediate_file);

                switch ($extimage) {
                    case 'jpeg':
                    case 'jpg':
                        $img = imagecreatefromjpeg($filepath);
                        break;
                        break;

                    case 'png':
                        $img = imagecreatefrompng($filepath);
                        break;
                        break;

                    case 'gif':
                        $img = imagecreatefromgif($filepath);
                        break;

                    case 'bmp':
                        $img = imagecreatefromwbmp($filepath);
                        break;
                        break;
                }

                // load image and get image size
                $width = imagesx($img);
                $height = imagesy($img);
                $new_width = $sizeinfo['width'];
                $new_height = floor($height * ( $sizeinfo['width'] / $width ));
                $tmp_img = imagecreatetruecolor($new_width, $new_height);
                imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                switch ($extimage) {
                    case 'jpeg':
                    case 'jpg':
                        imagejpeg($tmp_img, path_join($uploadpath['basedir'], $intermediate_file));
                        break;
                        break;

                    case 'png':
                        $background = imagecolorallocate($tmp_img , 0, 0, 0);
                        imagecolortransparent($tmp_img, $background);
                        imagepng($tmp_img, path_join($uploadpath['basedir'], $intermediate_file));
                        break;
                        break;

                    case 'gif':
                        imagegif($tmp_img, path_join($uploadpath['basedir'], $intermediate_file));
                        break;

                    case 'bmp':
                        imagewbmp($tmp_img, path_join($uploadpath['basedir'], $intermediate_file));
                        break;
                        break;
                }

                $metadata[$size]['width'] = $new_width;
                $metadata[$size]['width'] = $new_height;
                wp_update_attachment_metadata( $post_id, $metadata );
            }
        }else{
            wp_update_attachment_metadata( $post_id, $metadata );
        }
    }
}
