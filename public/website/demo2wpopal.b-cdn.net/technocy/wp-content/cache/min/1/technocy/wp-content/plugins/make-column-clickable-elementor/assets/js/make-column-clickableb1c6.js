jQuery(function($){$(document).on('click','body:not(.elementor-editor-active) .make-column-clickable-elementor',function(e){var wrapper=$(this),url=wrapper.data('column-clickable');if(url){if($(e.target).filter('a, a *, .no-link, .no-link *').length){return!0}
if(url.match("^#elementor-action")){var hash=url;var hash=decodeURIComponent(hash);if(hash.includes("elementor-action:action=popup:open")||hash.includes("elementor-action:action=lightbox")){if(0===wrapper.find('#make-column-clickable-open-dynamic').length){wrapper.append('<a id="make-column-clickable-open-dynamic" style="display: none !important;" href="'+url+'">Open dynamic content</a>')}
wrapper.find('#make-column-clickable-open-dynamic').click();return!0}
return!0}
if(url.match("^#")){var hash=url;$('html, body').animate({scrollTop:$(hash).offset().top},800,function(){window.location.hash=hash});return!0}
window.open(url,wrapper.data('column-clickable-blank'));return!1}})})