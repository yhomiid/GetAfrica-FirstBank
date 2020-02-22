<?php
/**
 * Custom Product image
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.1
 */
if (!defined('ABSPATH')) :
    exit; // Exit if accessed directly
endif;

global $product, $nasa_opt;

$productId = $product->get_id();
$attachment_ids = $product->get_gallery_image_ids();
$data_rel = '';
$thumbNailId = get_post_thumbnail_id();
$image_title = esc_attr(get_the_title($thumbNailId));
$image_full = wp_get_attachment_image_src($thumbNailId, 'full');
$image_link = isset($image_full[0]) ? $image_full[0] : wp_get_attachment_url($thumbNailId);
$image_large = wp_get_attachment_image_src($thumbNailId, 'shop_single');
$src_large = isset($image_large[0]) ? $image_large[0] : $image_link;
$image = get_the_post_thumbnail($productId, apply_filters('single_product_large_thumbnail_size', 'shop_single'), array('title' => $image_title));
$attachment_count = count($attachment_ids);

$slideHoz = false;
if (isset($nasa_opt['product_detail_layout']) && $nasa_opt['product_detail_layout'] === 'classic' && isset($nasa_opt['product_thumbs_style']) && $nasa_opt['product_thumbs_style'] === 'hoz') {
    $slideHoz = true; 
}

$imageMobilePadding = 'mobile-padding-left-5 mobile-padding-right-5';
if (isset($nasa_opt['product_detail_layout']) && $nasa_opt['product_detail_layout'] == 'new' && isset($nasa_opt['product_image_style']) && $nasa_opt['product_image_style'] == 'scroll') {
    $imageMobilePadding = 'mobile-padding-left-0 mobile-padding-right-0';
}

$class_wrapimg = 'row nasa-mobile-row';
$show_thumbnail = true;
if (isset($nasa_opt['product_detail_layout']) && $nasa_opt['product_detail_layout'] == 'full') :
    $show_thumbnail = false;
    $class_wrapimg = 'nasa-row nasa-mobile-row nasa-columns-padding-0';
    $imageMobilePadding = 'mobile-padding-left-0 mobile-padding-right-0';
endif;

$sliders_arrow = isset($nasa_opt['product_slide_arrows']) && $nasa_opt['product_slide_arrows'] && $nasa_opt['product_image_style'] === 'slide' ? true : false;
?>

<div class="images">
    <div class="<?php echo $class_wrapimg; ?>">
        <div class="large-12 columns <?php echo $imageMobilePadding; ?>">
            <?php if ($show_thumbnail && !$slideHoz && (!isset($nasa_opt['nasa_in_mobile']) || !$nasa_opt['nasa_in_mobile'])) : ?>
                <div class="nasa-thumb-wrap rtl-right">
                    <?php do_action('woocommerce_product_thumbnails'); ?>
                </div>
            <?php endif; ?>
            
            <div class="nasa-main-wrap rtl-left<?php echo $slideHoz ? ' nasa-thumbnail-hoz' : ''; ?>">
                <div class="product-images-slider images-popups-gallery">
                    <div class="nasa-main-image-default-wrap">
                        
                        <?php if ($sliders_arrow) : ?>
                            <div class="nasa-single-slider-arrows">
                                <a class="nasa-single-arrow" data-action="prev" href="javascript:void(0);">
                                    <span class="nasa-text hidden-tag">
                                        <?php echo esc_html__('PREV', 'elessi-theme'); ?>
                                    </span>
                                </a>
                                <a class="nasa-single-arrow" data-action="next" href="javascript:void(0);">
                                    <span class="nasa-text hidden-tag">
                                        <?php echo esc_html__('NEXT', 'elessi-theme'); ?>
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="main-images nasa-single-product-main-image nasa-main-image-default">
                            <div class="item-wrap">
                                <div class="nasa-item-main-image-wrap" id="nasa-main-image-0" data-key="0">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="easyzoom first">
                                            <?php echo apply_filters(
                                                'woocommerce_single_product_image_html',
                                                sprintf(
                                                    '<a href="%s" class="woocommerce-main-image product-image" data-o_href="%s" data-full_href="%s" title="%s">%s</a>',
                                                    $image_link,
                                                    $src_large,
                                                    $image_link,
                                                    $image_title,
                                                    $image
                                                ),
                                                $productId
                                            ); ?>
                                        </div>
                                    <?php else :
                                        $noimage = wc_placeholder_img_src();
                                        ?>
                                        <div class="easyzoom">
                                            <?php echo apply_filters(
                                                'woocommerce_single_product_image_html',
                                                sprintf(
                                                    '<a href="%s" class="woocommerce-main-image product-image" data-o_href="%s"><img src="%s" /></a>',
                                                        $noimage,
                                                        $noimage,
                                                        $noimage
                                                    ),
                                                $productId
                                            ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                            $_i = 0;
                            if ($attachment_count > 0) :
                                foreach ($attachment_ids as $id) :
                                    $_i++;
                                    ?>
                                    <div class="item-wrap">
                                        <div class="nasa-item-main-image-wrap" id="nasa-main-image-<?php echo (int) $_i; ?>" data-key="<?php echo (int) $_i; ?>">
                                            <div class="easyzoom">
                                                <?php
                                                $image_title = esc_attr(get_the_title($id));
                                                
                                                $image_full = wp_get_attachment_image_src($id, 'full');
                                                $image_link = isset($image_full[0]) ?
                                                    $image_full[0] : wp_get_attachment_url($id);
                                                
                                                $images = wp_get_attachment_image_src($id, 'shop_single');
                                                $image = isset($images[0]) ?
                                                    $images[0] : $image_link;
                                                echo sprintf(
                                                    '<a href="%s" class="woocommerce-additional-image product-image" title="%s"><img alt="%s" src="%s" /></a>',
                                                    $image_link,
                                                    $image_title,
                                                    $image_title,
                                                    $image
                                                );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>

                    <div class="product-image-btn">
                        <a class="product-lightbox-btn tip-top" data-tip="<?php esc_html_e('Zoom', 'elessi-theme'); ?>" href="#"></a>
                        
                        <?php do_action('product_video_btn'); ?>
                    </div>
                </div>
                
                <div class="nasa-end-scroll"></div>
            </div>
            
            <?php if ($show_thumbnail && $slideHoz) : ?>
                <div class="nasa-thumb-wrap nasa-thumbnail-hoz">
                    <?php do_action('woocommerce_product_thumbnails'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
