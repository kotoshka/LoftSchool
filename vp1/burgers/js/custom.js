$(".order__form-button").click(function (e) {
    e.preventDefault();
    var data = $('#order-form').serialize();
    $.ajax({
        method: 'post',
        data: data,
        url: "ajax/ajax.php",
        dataType: 'json',
        success: function(data){
            if(data['status'] === 'error') {
                $('.error-text').append(data['text']);
            } else {
                $('.error-text').html('');
                $('.order__form').html(data['text']);
            }
        }
    });
});