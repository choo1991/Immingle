$(document).ready(function(){
    $.get('countries.json', function(countries){
        $.each(countries, function(index, value){
            var country = $("<option>").text(value.country).attr("value",value.code);
            $('#country').append(country);
        });
    });
    $.get('languages.json',function(languages){
        $.each(languages, function(index, value){
            var language= $("<option>").text(value.name).attr("value",value.code);
            $('#language').append(language);
        });
    });
});