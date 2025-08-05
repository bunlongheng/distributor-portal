/*jslint  browser: true, white: true, plusplus: true */
/*global $, countries */

$(function () {
    'use strict';

    var countriesArray = $.map(countries, function (value, key) { return { value: value, data: key }; });

    // Setup jQuery ajax mock:
    $.mockjax({
        url: '*',
        responseTime: 2000,
        response: function (settings) {
            var query = settings.data.query,
                queryLowerCase = query.toLowerCase(),
                re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi'),
                suggestions = $.grep(countriesArray, function (country) {
                     // return country.value.toLowerCase().indexOf(queryLowerCase) === 0;
                    return re.test(country.value);
                }),
                response = {
                    query: query,
                    suggestions: suggestions
                };

            this.responseText = JSON.stringify(response);
        }
    });

    // Initialize ajax autocomplete:
    $('#autocomplete-ajax').autocomplete({
        // serviceUrl: '/autosuggest/service/url',
        lookup: countriesArray,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            $('#selction-ajax').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('You selected: none');
        }
    });

    // Initialize autocomplete with local lookup:
    $('#autocomplete').devbridgeAutocomplete({
        lookup: countriesArray,
        minChars: 0,
        onSelect: function (suggestion) {
            var country_name = suggestion.value;
            
            $('#selection').html('<b>' + country_name + '</b>');



            $('#selection').html('<img width="33px" height="33px" src="/img/flags_3/flags/48/' + country_name + '.png">');


           

        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Sorry, no matching results',
    });

    $('#autocomplete_2').devbridgeAutocomplete({
        lookup: countriesArray,
        minChars: 0,
        onSelect: function (suggestion) {
            var country_name = suggestion.value;
            
            $('#selection_2').html('<b>' + country_name + '</b>');



            $('#selection_2').html('<img width="33px" height="33px" src="/img/flags_3/flags/48/' + country_name + '.png">');


           

        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Sorry, no matching results',
    });

    $('#autocomplete_3').devbridgeAutocomplete({
        lookup: countriesArray,
        minChars: 0,
        onSelect: function (suggestion) {
            var country_name = suggestion.value;
            
            $('#selection_3').html('<b>' + country_name + '</b>');



            $('#selection_3').html('<img width="33px" height="33px" src="/img/flags_3/flags/48/' + country_name + '.png">');


           

        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Sorry, no matching results',
    });

    $('#autocomplete_4').devbridgeAutocomplete({
        lookup: countriesArray,
        minChars: 0,
        onSelect: function (suggestion) {
            var country_name = suggestion.value;
            
            $('#selection_4').html('<b>' + country_name + '</b>');



            $('#selection_4').html('<img width="33px" height="33px" src="/img/flags_3/flags/48/' + country_name + '.png">');


           

        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Sorry, no matching results',
    });


    
    // Initialize autocomplete with custom appendTo:
    $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray,
        appendTo: '#suggestions-container'
    });

    // Initialize autocomplete with custom appendTo:
    $('#autocomplete-dynamic').autocomplete({
        lookup: countriesArray
    });
});