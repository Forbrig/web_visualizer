// script to show files with fancybox
$('[data-fancybox="allfiles"]' || '[data-fancybox = "images"]' || '[data-fancybox="pdfs"]').fancybox({
  buttons : [
    'slideShow',
    'share',
    'zoom',
    'fullScreen',
    'close'
  ],
  thumbs : {
    autoStart : true
  }
});
