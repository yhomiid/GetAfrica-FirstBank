<?php
if (!isset($nasa_opt)) {
    global $nasa_opt;
}

$columnImage = '6';
$columnInfo = '6';

if ($nasa_opt['product_image_layout'] != 'single') {
    
    if ($nasa_opt['product_image_style'] === 'slide') {
        $columnImage = '8';
        $columnInfo = '4';
    } else {
        $columnImage = '7';
        $columnInfo = '5';
    }
}

$dots = isset($nasa_opt['product_slide_dot']) && $nasa_opt['product_slide_dot'] ? 'true' : 'false';
?>

<div id="product-<?php echo (int) $product->get_id(); ?>" <?php post_class(); ?>>
    <?php if ($nasa_actsidebar && $nasa_sidebar != 'no') : ?>
        <div class="nasa-toggle-layout-side-sidebar nasa-sidebar-single-product <?php echo esc_attr($nasa_sidebar); ?>">
            <div class="li-toggle-sidebar">
                <a class="toggle-sidebar-shop" href="javascript:void(0);">
                    <i class="nasa-icon icon-nasa-icons-19"></i>
                </a>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="row nasa-product-details-page">
        <div class="<?php echo esc_attr($main_class); ?>" data-num_main="<?php echo ($nasa_opt['product_image_layout'] == 'double') ? '2' : '1'; ?>" data-num_thumb="<?php echo ($nasa_opt['product_image_layout'] == 'double') ? '4' : '6'; ?>" data-speed="300" data-dots="<?php echo $dots; ?>">

            <div class="row">
                <div class="large-<?php echo esc_attr($columnImage); ?> small-12 columns product-gallery rtl-right"> 
                    <?php do_action('woocommerce_before_single_product_summary'); ?>
                </div>
                
                <div class="large-<?php echo esc_attr($columnInfo); ?> small-12 columns product-info summary entry-summary rtl-left">
                    <div class="nasa-product-info-wrap">
                        <div class="nasa-product-info-scroll">
                            <?php do_action('woocommerce_single_product_summary'); ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php do_action('woocommerce_after_single_product_summary'); ?>

        </div>

        <?php if ($nasa_actsidebar && $nasa_sidebar != 'no') : ?>
            <div class="<?php echo esc_attr($bar_class); ?>">
                <a href="javascript:void(0);" title="<?php echo esc_attr__('Close', 'elessi-theme'); ?>" class="hidden-tag nasa-close-sidebar"><?php echo esc_html__('Close', 'elessi-theme'); ?></a>
                <?php dynamic_sidebar('product-sidebar'); ?>
            </div>
        <?php endif; ?>

    </div>
</div>
