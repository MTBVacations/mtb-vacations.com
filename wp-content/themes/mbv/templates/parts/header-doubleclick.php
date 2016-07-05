<?php if(is_page(2)): ?>
  <script type='text/javascript'>
    var googletag = googletag || {};
    googletag.cmd = googletag.cmd || [];
    (function() {
      var gads = document.createElement('script');
      gads.async = true;
      gads.type = 'text/javascript';
      var useSSL = 'https:' == document.location.protocol;
      gads.src = (useSSL ? 'https:' : 'http:') +
        '//www.googletagservices.com/tag/js/gpt.js';
      var node = document.getElementsByTagName('script')[0];
      node.parentNode.insertBefore(gads, node);
    })();
  </script>

  <script type='text/javascript'>
    googletag.cmd.push(function() {
      googletag.defineSlot('/49735501/homepage-after-scroll', [[120, 20], [468, 60], [300, 100], [728, 90]], 'div-gpt-ad-1467756880025-0').addService(googletag.pubads());
      googletag.defineSlot('/49735501/homepage-first-column', [[480, 320], [250, 250]], 'div-gpt-ad-1467756880025-1').addService(googletag.pubads());
      googletag.defineSlot('/49735501/homepage-second-column', [[480, 320], [250, 250]], 'div-gpt-ad-1467756880025-2').addService(googletag.pubads());
      googletag.defineSlot('/49735501/homepage-third-column', [[480, 320], [250, 250]], 'div-gpt-ad-1467756880025-3').addService(googletag.pubads());
      googletag.pubads().enableSingleRequest();
      googletag.enableServices();
    });
  </script>
<?php endif; ?>