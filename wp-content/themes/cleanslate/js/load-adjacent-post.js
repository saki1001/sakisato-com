$j(document).ready(function() {
    
    var ajaxRequest = function(postDate) {
        var date = new Date();
        var requestStart = date.getTime();
        
        $j.ajax({
            type: 'GET',
            url: 'wp-content/themes/cleanslate/php/get-adjacent-post.php',
            data: {
                post_date : postDate
            },
            dataType: 'html',
            success: function(data){
                var date = new Date();
                var requestFinish = date.getTime();
                var timeSpent = requestFinish - requestStart;
                
                var loadData = function() {
                    $j('#content').html(data);
                };
                
                // Dont Fade In until ready to load data
                if ( timeSpent >= 500 ) {
                    loadData();
                    fadeInPage();
                } else {
                    var timeLeft = 500 - timeSpent;
                    setTimeout(loadData, timeLeft);
                    setTimeout(fadeInPage, timeLeft);
                }
            },  
            error: function(jqXHR, textStatus, errorThrown) {
                alert(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
            }
        });
        
    };
    
    var getAdjacentPost = function() {
        $j(this).unbind('click', getAdjacentPost);
        
        // Fade Out animation
        var redirect = false;
        var turl = $j(this).attr('href');
        fadeOutPage(redirect, turl);
        
        // Make ajax request, includes Fade In
        var postId = $j(this).attr('data-id');
        var postDate = $j(this).attr('data-post-date');
        setTimeout(ajaxRequest(postDate), 1000);
        
        // Rebind click handler
        $j(this).live('click', getAdjacentPost);
        
        return false;
    };
    
    $j('#prev-link').live('click', getAdjacentPost);
    $j('#next-link').live('click', getAdjacentPost);
    
});