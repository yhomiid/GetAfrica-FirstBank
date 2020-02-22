<?php
/**
 * @package nasatheme
 */
global $nasa_opt;
$nasa_parallax = isset($nasa_opt['blog_parallax']) && $nasa_opt['blog_parallax'] ? true : false;

$categories = get_the_category_list(esc_html__(', ', 'elessi-theme'));
$tags = get_the_tag_list();
$shares = shortcode_exists('nasa_share') ? do_shortcode('[nasa_share el_class="text-right mobile-text-left rtl-mobile-text-right rtl-text-left"]') : '';

do_action('nasa_before_single_post');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-image margin-bottom-40">
            <?php if ($nasa_parallax) : ?>
                <div class="parallax_img" style="overflow:hidden">
                    <div class="parallax_img_inner" data-velocity="0.15">
                        <?php the_post_thumbnail(); ?>
                        <div class="image-overlay"></div>
                    </div>
                </div>
            <?php else : ?>
                <?php the_post_thumbnail(); ?>
                <div class="image-overlay"></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <header class="entry-header text-center">
        <?php if ($categories) :
            echo '<div class="nasa-meta-categories">' . $categories . '</div>';
        endif; ?>
        <h1 class="entry-title nasa-title-single-post"><?php the_title(); ?></h1>
        <div class="entry-meta">
            <?php elessi_posted_on(); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php
        the_content();
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'elessi-theme'),
            'after' => '</div>',
        ));
        ?>
    </div>

    <?php if ($tags || $shares) : ?>
        <footer class="entry-meta footer-entry-meta single-footer-entry-meta">
            <div class="row">
                <div class="columns large-7 medium-7 nasa-min-height rtl-right">
                    <?php if ($tags) : ?>
                        <div class="nasa-meta-tags rtl-text-right">
                            <?php echo $tags;?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <?php if ($shares) : ?>
                    <div class="columns large-5 medium-5 nasa-meta-social mobile-margin-top-20 rtl-left">
                        <?php echo $shares;?>
                    </div>
                <?php endif; ?>
            </div>
        </footer>
    <?php endif; ?>

</article>

<?php do_action('nasa_after_content_single_post'); ?>

<div class="nasa-clear-both"></div>

<?php
if (comments_open() || '0' != get_comments_number()):
    comments_template();
endif;

do_action('nasa_after_single_post');
