$(document).ready(function() {
    $('.table-hover tbody tr').hover(
        function(){$(this).find('.actions').removeClass('hide').addClass('show')},
        function(){$(this).find('.actions').addClass('hide').removeClass('show')}
    )
});