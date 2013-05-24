$j(document).ready(function() {
    
    // Bind the submit event for your form
    var submitSearch = function(e) {
        
        if (e.which == 13) {
            
            $j('#s').unbind('keypress', submitSearch);
            
            // Get the search term
            var term = $j('#s').val();
                
            // Make sure the user searched for something
            // if ( term ){
            //     
            //     $j.get( '/', { s: term }, function( data ){
            //     
            //         // Place the fetched results inside the #content element
            //         $j('.browse-posts').html(data);
            //     });
            // }
            
            $j.get(search.php,{search_string:term},
                function(data){
                    if(data.length>0){
                        $j('.browse-posts').html(data);
                    }
            });
            
            $j('#s').bind('keypress', submitSearch);
            
            return false;
        }
        
    };
    
    $j('#s').bind('focus', clearOnFocus);
    $j('#s').bind('keypress', submitSearch);
});