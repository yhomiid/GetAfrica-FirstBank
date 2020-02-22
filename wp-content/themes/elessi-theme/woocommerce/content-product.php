<?php
/**
 *
 * The template for displaying product content within loops
 *
 * 
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */
global $product, $nasa_opt, $nasa_animated_products;
if (empty($product) || !$product->is_visible()) :
    return;
endif;

$productId = $product->get_id();
$stock_status = $product->get_stock_status();
$stock_label = $stock_status == 'outofstock' ?
    esc_html__('Out of stock', 'elessi-theme') : esc_html__('In stock', 'elessi-theme');

$time_sale = false;
if ($product->is_on_sale() && $product->get_type() != 'variable') {
    $time_from = get_post_meta($productId, '_sale_price_dates_from', true);
    $time_to = get_post_meta($productId, '_sale_price_dates_to', true);
    $time_sale = ((int) $time_to < NASA_TIME_NOW || (int) $time_from > NASA_TIME_NOW) ? false : (int) $time_to;
}

$show_in_list = isset($show_in_list) ? $show_in_list : true;

$class_wrap = 'product-item grid';
if (!isset($nasa_opt['nasa_in_mobile']) || !$nasa_opt['nasa_in_mobile']) {
    $class_wrap .= ' wow fadeInUp';
}
$class_wrap .= $nasa_animated_products ? ' ' . $nasa_animated_products : '';
$class_wrap .= $stock_status == "outofstock" ? ' out-of-stock' : '';

if (isset($nasa_opt['loop_layout']) && $nasa_opt['loop_layout']) {
    $class_wrap .= ' nasa-layout-' . $nasa_opt['loop_layout'];
}

$class_wrap .= $time_sale ? ' product-deals' : '';

if (!isset($_delay)) {
    $_delay = 0;
}

/**
 * Show Categories info
 */
$cat_info = isset($cat_info) ? $cat_info : true;

/**
 * Show Short Description info
 */
$description_info = isset($description_info) ? $description_info : true;

$attributes = 'data-wow="fadeInUp" data-wow-duration="1s" data-wow-delay="' . esc_attr($_delay) . 'ms"';
echo (!isset($wrapper) || $wrapper == 'li') ? '<li class="product-warp-item">' : '';
echo '<div class="' . esc_attr($class_wrap) . '" ' . $attributes . '>';

do_action('woocommerce_before_shop_loop_item');

echo $time_sale ? elessi_time_sale($time_sale) : '<div class="nasa-sc-pdeal-countdown hidden-tag"></div>';
?>

<div class="product-img-wrap">
    <?php do_action('woocommerce_before_shop_loop_item_title'); ?>
</div>

<div class="product-info-wrap info">
    <?php do_action('woocommerce_shop_loop_item_title', $cat_info); ?>
    <?php do_action('woocommerce_after_shop_loop_item_title', $description_info); ?>
</div>

<?php if ($show_in_list && (!isset($nasa_opt['nasa_in_mobile']) || !$nasa_opt['nasa_in_mobile'])) : ?>
    <!-- Clone Group btns for layout List -->
    <div class="hidden-tag nasa-list-stock-wrap">
        <p class="nasa-list-stock-status <?php echo esc_attr($stock_status); ?>">
            <?php echo esc_html__('AVAILABILITY: ', 'elessi-theme') . '<span>' . $stock_label . '</span>'; ?>
        </p>
    </div>

    <div class="group-btn-in-list-wrap hidden-tag">
        <div class="group-btn-in-list"></div>
    </div>
<?php endif; ?>

<?php
do_action('woocommerce_after_shop_loop_item');

echo '</div>';

echo (!isset($wrapper) || $wrapper == 'li') ? '</li>' : '';
