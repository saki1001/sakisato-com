var $j = jQuery.noConflict();

// Clear fields on focus
var clearOnFocus = function() {
    $j(this).val('');
};

var fadeInPage = function() {
    $j('#content').show()
        .animate({
            opacity: 1
        }, 500, function(){
            $j('#content').css({
                opacity : 1
            });
        });
};

var fadeOutPage = function(redirect, turl) {
    $j('#content').animate({opacity: 0}, 500, function() {
        if ( redirect === true ) {
            window.location.href = turl;
        }
    });
};

$j(document).ready(function(){
    
    // Decide how to fade out content
    var fadeOutRedirect = function(){
        
        var turl = $j(this).attr('href');
        
        if ( window.location.href === turl ) {
            // do nothing
            return false;
            
        } else if ( turl === '#' ) {
            // all animation performed in load-adjacent-post.js
            // NO RETURN FALSE, needs to perform AJAX
            
        } else if ( $j(this).attr('target') === '_blank' ) {
            // do nothing
            
        } else {
            var redirect = true;
            fadeOutPage(redirect, turl);
            return false;
        }
        
        $j('a').bind('click', fadeOutRedirect);
    };
    
    // Fade in content onload
    fadeInPage();
    
    // Resize Browse Thumbs
    var resizeThumbs = function () {
        var thumbWidth = $j('#content .thumb').width();
        $j("#content .thumb").height(thumbWidth);
    };
    
    // Call on window resize
    $j(window).resize(function(){
        resizeThumbs();
    });
    
    // Call on page load
    resizeThumbs();
    
    // Target your .container, .wrapper, .post, etc.
    $j('#content').fitVids();
    
    // $j('a').bind('click', fadeOutRedirect);
    
});