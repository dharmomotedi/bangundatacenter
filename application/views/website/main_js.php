
<script src="<?php echo $this->config->item('website_source'); ?>js/jquery.js"></script>
<script src="<?php echo $this->config->item('website_source'); ?>js/plugins.js"></script>
    <!--Template functions-->
<script src="<?php echo $this->config->item('website_source'); ?>js/functions.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

    <script>
      var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?72521';
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = url;
      var options = {
        enabled: true,
        chatButtonSetting: {
          backgroundColor: '#0357A5',
          ctaText: "let's talk free!",
          borderRadius: '15',
          marginLeft: '0',
          marginBottom: '30',
          marginRight: '50',
          position: 'right',
        },
        brandSetting: {
          brandName: 'BangunDataCenter by NPS Pemuda',
          brandSubTitle: 'IT Solution Provider',
          brandImg: 'https://alfinagamulya.github.io/bangundatacenter/img/logo_title.svg',
          welcomeText: 'Hello!\n\nAda yang bisa kami bantu ?\n',
          messageText: 'Hello, Saya ingin menanyakan tentang..... Terima kasih',
          backgroundColor: '#0357A5',
          ctaText: "Let's Talk Free",
          colorText:'#0357A5',
          borderRadius: '15',
          autoShow: true,
          phoneNumber: '628111444735',
        },
      };
      s.onload = function () {
        CreateWhatsappChatWidget(options);
      };
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    </script>
