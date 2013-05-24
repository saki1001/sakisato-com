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
            
        } else {
            var redirect = true;
            fadeOutPage(redirect, turl);
            return false;
        }
        
        $j('a').bind('click', fadeOutRedirect);
    };
    
    // Fade in content onload
    fadeInPage();
    
    $j('a').bind('click', fadeOutRedirect);
    
});