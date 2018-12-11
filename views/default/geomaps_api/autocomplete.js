define(function (require) {
    var elgg = require('elgg');
    var $ = require('jquery');
    require('geomaps_autocomplete_js');

    $(document).ready(function () {
        initAutocomplete();
    });
    
    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
            
        autocomplete.addListener('place_changed', function () {});

//        // When the user selects an address from the dropdown, populate the address fields in the form.
//        autocomplete.addListener('place_changed', fillInAddress);
        
    }

    // prevent form submitted when press enter to autocomplete
    $("#autocomplete").keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

});
