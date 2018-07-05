   $(document).ready(function() {
      var p = $(".staticHeader").offset().top;

      $(".owl-carousel").owlCarousel({
          loop:true,
          margin: 20,
          nav: true,
          responsive:{
            0:{
                items:1,
                nav:true
            },
            735:{
                items:2,
                nav:true
            },
            992:{
                items:3,
                nav:true
            }
          }
      });

      $('html').on('click', '.remove__custom', function(event) {
        var id = $(this).attr('data-product_id');
        $(this).prev().find('.woocommerce-Price-currencySymbol').remove();
        var price = $(this).prev().text().replace(" ", "");
        $('#cart-popup .cart-collaterals .itog .woocommerce-Price-amount .woocommerce-Price-currencySymbol').remove();
        var total = $('#cart-popup .cart-collaterals .itog .woocommerce-Price-amount').text().replace(" ", "");
        total = total*1 - price*1;
        $.ajax({
            type: "POST",
            url: 'http://html.techlab24.ru//wp-admin/admin-ajax.php',
            data: {action : 'remove_item_from_cart','product_id' : id},
            success: function (res) {
                if (res) {
                    $('.remove__custom[data-product_id = ' + id +']').parent().parent().remove();
                    $('#cart-popup .cart-collaterals .itog .woocommerce-Price-amount').html(total + '<span class="woocommerce-Price-currencySymbol">&nbsp;руб.</span>');
                    $('.open-popup-link .woocommerce-Price-amount').html(total + '<span class="woocommerce-Price-currencySymbol">&nbsp;руб.</span>');
                    console.log(total + '-' + price);
                }
            }
          });
        return false;
      });

      $(window).scroll(function(){
          if($(this).scrollTop()>p){
              $('.staticHeader').addClass('fixed');
          }
          else if ($(this).scrollTop()<p){
              $('.staticHeader').removeClass('fixed');
          }
      });

      $("a[href*='#']").bind("click", function(e){
        var anchor = $(this);
        $('html, body').stop().animate({
          scrollTop: $(anchor.attr('href')).offset().top
        }, 500);
        e.preventDefault();
        return false;
      });

      $('#send_order').click(function(event) {
        var text = '';
        $('#ajax_form tr.cart_item').each(function(index, el) {
          text += $(this).find('td.product-name a').html()+'++';
          text += $(this).find('td.product-quantity input').val()+'++';
          text += $(this).find('td.product-subtotal .woocommerce-Price-amount').html() + '|';
        });
        $('#products').val(text);
      });

      //Иницилизация и отправка плагина AjaxForm отправки даных из форм
      $('form').ajaxForm(function(){
        //$("a[title='Close']").trigger("click");
        $('form').clearForm();
        $(".fancybox-close-small").trigger("click");
        $("#thanks_link").trigger("click");
      });

   });