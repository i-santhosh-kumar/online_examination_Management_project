$(document).ready(function() 
{
    $('body').bind('cut copy paste', function(event) {
    event.preventDefault();
    });
});

var el_up = document.getElementsByTagName("body");
document.addEventListener('contextmenu',event => event.preventDefault());