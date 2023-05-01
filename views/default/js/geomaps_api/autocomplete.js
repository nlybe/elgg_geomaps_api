define(function (require) {
    var elgg = require('elgg');
    var $ = require('jquery');
    require('geomaps_autocomplete_js');

    $(function() {
        window.addEventListener('load', (event) => { initAutocomplete(); });
        initAutocomplete();
    });
    
    // deprecated as we can't have more autocomplete input at the same form ////////////////////////
    // function initAutocomplete() { 
    //     // Create the autocomplete object, restricting the search to geographical location types.
    //     autocomplete = new google.maps.places.Autocomplete(
    //         /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
    //         {types: ['geocode']}
    //     );
            
    //     autocomplete.addListener('place_changed', function () {});
    // }
    ////////////////////////////////////////////////////////////////////////////////////////////////

    function initAutocomplete() {                
        var els = document.getElementsByClassName("geomaps_api_autocomplete");
        Array.prototype.forEach.call(els, function(el) {
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(el),
                {types: ['geocode']}
            );
                
            autocomplete.addListener('place_changed', function () {});
        });     
    }

    // prevent form submitted when press enter to autocomplete
    $(".geomaps_api_autocomplete").on( "keydown", function( event ) {
        if (event.key === 'Enter') {
            event.preventDefault();
            return false;
        }
    });

});
