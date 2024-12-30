<?php 
$uri = urldecode( parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ); 
// if ($uri !== '/' && file_exists(DIR.'/public'.$uri)) { return false; } 
require_once 'public/index.php';
/*
API Key:	6713ee32e6d50546465261hgua3b298
Geocoding Plan:	Free - 1 Request/Second
Current Usage:	0 Requests

Geoapify
api key : 39ba4854eebc44dd998845119a536408
https://api.geoapify.com/v1/geocode/autocomplete?text=Mosco&apiKey=39ba4854eebc44dd998845119a536408

javascript fetch 
var requestOptions = {
  method: 'GET',
};

fetch("https://api.geoapify.com/v1/geocode/autocomplete?text=Mosco&apiKey=39ba4854eebc44dd998845119a536408", requestOptions)
  .then(response => response.json())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));

curl
curl --location--request GET 'https://api.geoapify.com/v1/geocode/autocomplete?text=Mosco&apiKey=39ba4854eebc44dd998845119a536408'

$(document).ready(function() {
    const apiKey = 'your_api_key'; // Replace with your actual API key

    $('#address-input').on('input', function() {
        const inputText = $(this).val();

        if (inputText.length < 3) { // Start fetching after 3 characters
            $('#suggestions').hide();
            return;
        }

        const requestOptions = {
            method: 'GET',
        };

        fetch(`https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(inputText)}&apiKey=${apiKey}`, requestOptions)
            .then(response => response.json())
            .then(result => {
                $('#suggestions').empty(); // Clear previous suggestions
                if (result.features && result.features.length) {
                    result.features.forEach(feature => {
                        $('#suggestions').append(`<li class="list-group-item suggestion">${feature.properties.formatted}</li>`);
                    });
                    $('#suggestions').show();
                } else {
                    $('#suggestions').hide();
                }
            })
            .catch(error => console.log('error', error));
    });

    // Event handler for selecting a suggestion
    $(document).on('click', '.suggestion', function() {
        $('#address-input').val($(this).text()); // Set the input value
        $('#suggestions').hide(); // Hide suggestions
    });

    // Hide suggestions when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#address-input').length) {
            $('#suggestions').hide();
        }
    });
});
*/
?>
