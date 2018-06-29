<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

<style>
.wp-post-image
/* картинка на странице */
.minimized {
  width: 300px;
  cursor: pointer;
  border: 1px solid #FFF;
}
 
.wp-post-image:hover {
  border: 1px solid yellow;
}
 
/* увеличенная картинка */
#magnify {
  display: none;
 
  /* position: absolute; upd: 24.10.2016 */
  position: fixed;
  max-width: 600px;
  height: auto;
  z-index: 9999;
}
 
#magnify img {
  width: 100%;
}
 
/* затемняющий фон */
#overlay {
  display: none;
 
  background: #000;
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  opacity: 0.5;
  z-index: 9990;
}
 
/* кнопка закрытия */
#close-popup {
  width: 30px;
  height: 30px;
 
  background: #FFFFFF;
  border: 1px solid #AFAFAF;
  border-radius: 15px;
  cursor: pointer;
  position: absolute;
  top: 15px;
  right: 15px;
}
 
#close-popup i {
  width: 30px;
  height: 30px;
  background: url(https://codernote.ru/files/cross.png) no-repeat center center;
  background-size: 16px 16px;
  display: block;
}
 
@keyframes rota {
 25% { transform: rotate(360deg); }
}
 
#close-popup:hover {
  animation: rota 4s infinite normal;
  -webkit-animation-iteration-count: 1;
  animation-iteration-count: 1;
}
</style>
<link rel="stylesheet" href="/main.css">
    <?php wp_head(); ?>
</head>
<body>
    <header style="background-image: url(/wp-content/uploads/2017/09/EXO250_1920_1080-e1511035945270.jpg);">
        <div class="container">

            <div class="row">
                <div class="col-md-2 col-sm-2 col-sm-push-5 col-md-pull-5">
                    <a href="" rel="home" class="logo">
                            <img src="<?php the_field('logotype'); ?>" />
                    </a>
                </div>
                <div class="col-md-5 col-sm-5 col-sm-pull-2 col-md-pull-2 col-xs-6">
                    <div class="block__left">
                        <span class="socials__item">
                            <span><?php the_field('pr_time'); ?></span>
                            
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-6">
                    <div class="socials">
                        <a href="#" class="socials__item socials__item__email"><img src="/app/img/mail-icon.png" alt="Email"></a>
                        <a href="https://vk.com/shpakshenprodakshen" class="socials__item socials__item__vk"><img src="/app/img/vk-icon.png" alt="VK"></a>

<div class="s-header__basket-wr woocommerce">
    <?php
    global $woocommerce; ?>
    <a href="<?php echo $woocommerce->cart->get_cart_url() ?>" class="basket-btn basket-btn_fixed-xs">
        <span class="basket-btn__label">Корзина</span>
        <span class="basket-btn__counter">(<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>)</span>
    </a>
</div>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <script type="text/javascript">
        function myFunction(x) {
            x.classList.toggle("change");
        }
    </script>