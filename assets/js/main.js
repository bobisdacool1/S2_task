$('form').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: "/app/CalculateBottleCount.php",
        method: 'post',
        data: {
            bottleCount: $('#bottle-count').val(),
        },
        success: function( result ) {
            $('.crate-12').html(result['crate-12']);
            $('.crate-6').html(result['crate-6']);
            $('.crate-3').html(result['crate-3']);
        }
    });
});