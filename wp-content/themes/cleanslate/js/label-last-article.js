// For inserting as Infinite Scroll Callback
// var $j = jQuery.noConflict();
// $j.getScript("http://localhost:8888/dutch-innovation/wp-content/themes/cleanslate/js/label-last-article.js", function(data, textStatus, jqxhr) {});

var labelLastArticle = function() {
    $j('#articles article.last').removeClass('last');
    $j('#articles article').last().addClass('last');
};

labelLastArticle();