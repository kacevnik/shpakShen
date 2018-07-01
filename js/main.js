   $(document).ready(function() {

      $(".owl-carousel").owlCarousel({
          loop:true,
          margin: 20,
          nav: true,
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