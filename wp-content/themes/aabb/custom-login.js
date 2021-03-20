$(function (jQuery) {
    
    function redirectLogin(){
        let searchParams = new URLSearchParams(window.location.search);
        if (searchParams.has('redirect')) {
            $('input[name="redirect_to"]').val(searchParams.get('redirect'));
        }
    }

    $(document).ready(function () {
        redirectLogin();
        jQuery('#nav a:first-child').mouseover(function(){
            jQuery(this).attr('href', '/registre-se/');
        });
            
        
    });
})