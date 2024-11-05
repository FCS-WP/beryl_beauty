<?php

//Add gallery video for product
function add_product_video_url_meta_box()
{
  add_meta_box(
    'product_video_url',
    'Video Product',
    'display_product_video_url_meta_box',
    'product',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'add_product_video_url_meta_box');

function display_product_video_url_meta_box($post)
{
  $video_url = get_post_meta($post->ID, '_product_video_url', true);
?>
  <label for="product_video_url">Link Video Product:</label>
  <input type="text" id="product_video_url" name="product_video_url" value="<?php echo esc_url($video_url); ?>" style="width: 100%;" />
  <?php
}

function save_product_video_url_meta_box($post_id)
{
  if (isset($_POST['product_video_url'])) {
    update_post_meta($post_id, '_product_video_url', esc_url($_POST['product_video_url']));
  }
}
add_action('save_post_product', 'save_product_video_url_meta_box');


function display_product_video_on_single_product()
{
  global $post;

  $video_url = get_post_meta($post->ID, '_product_video_url', true);
  if (has_post_thumbnail($post->ID)) :
  ?>
    <?php if (!empty($video_url)) : ?>

      <div data-thumb="<?php echo THEME_URL . '-child/assets/icons/thumb-video.png'; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image product-video" style="width: 496px; margin-right: 0px; float: left; display: block;">
        <a data-elementor-open-lightbox="no">
          <video width="100%" height="100%" controls="false" loop="true" autoplay="true">
            <source src="<?php echo $video_url; ?>" type="video/mp4">
          </video>
        </a>
        <?php ?>
      </div>
    <?php endif; ?>

  <?php endif; ?>
  <?php

}
add_action('woocommerce_product_thumbnails', 'display_product_video_on_single_product', 0, 0);


add_filter('woocommerce_single_product_image_thumbnail_html', function ($html, $post_thumbnail_id) {
  global $post;

  $video_url = get_post_meta($post->ID, '_product_video_url', true);
  if (! $post_thumbnail_id) : ?>
    <div class="woocommerce-product-gallery__image--placeholder">
      <video width="100%" height="100%" controls="false" loop="true" autoplay="true">
        <source src="<?php echo $video_url; ?>" type="video/mp4">
      </video>
    </div>
    <?php return; ?>
  <?php endif; ?>
<?php
  return $html;
}, 10, 2);
