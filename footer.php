        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/popup_img.js"></script>

<footer style="background-image: url(/wp-content/uploads/2017/09/EXO250_1920_1080-e1511035945270.jpg);">
    <div class="container">

        <div class="row">
            <div class="col-md-2 col-sm-2 col-sm-push-5 col-md-pull-5 col-xs-12">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                    <img src="<?php the_field('logotype'); ?>" />
                </a>
            </div>
            <div class="col-md-5 col-sm-5 col-sm-pull-2 col-md-pull-2 col-xs-6">
                <div class="block__left">
                    <span class="socials__item">
                        <span><?php the_field('pr_time'); ?></span>
                    </span>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-6">
                <div class="socials">
                        <a data-fancybox data-src="#cart-popup" href="javascript:;" class="open-popup-link cart-customlocation cart__item cart-contents cart-contents">
                          <span>Ваша корзина:</span>
                          <strong>
                            <span class="woocommerce-Price-amount amount"><?php echo WC()->cart->cart_contents_total; ?>
                              <span class="woocommerce-Price-currencySymbol"> руб.</span>
                            </span>
                          </strong>
                        </a>
                </div>
            </div>
        </div>

    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <span><?php the_field('copyright'); ?></span>
                    <a href="mailto:<?php the_field('link_social', 'option'); ?>"><img src="/app/img/footer-soc2.png" alt="Email"></a>
                    <a href="<?php the_field('link_social', 'option'); ?>" target="_blank"><img src="/app/img/footer-soc1.png" alt="VK"></a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="block__thank_you1 block__thank_you">
    <div class="mfp-close-thn"></div>
    <h2><?php the_field('window_thn') ?></h2>
    <p><?php the_field('window_txt') ?></p>
</div>
<div class="block__thank_you2 block__thank_you">
    <div class="mfp-close-thn"></div>
    <h2><?php the_field('window_thn1') ?></h2>
    <p><?php the_field('window_txt1') ?></p>
</div>
<script>
$(function() {
    $(".issues__item").click(function() {
        $(".issues__item").removeClass("issues__item__active");         
        $(this).addClass("issues__item__active");
    })
});
</script>
<?php wp_footer(); ?>


</body>
</html>
