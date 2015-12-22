$(function(){
    $('button').on('click', function(){
        var button_id = $(this).attr('id');
        var nickname = $('#nickname').attr('value');
        $.ajax({
            type: 'post',
            url: url,
            data: {'nickname': nickname},
            dataType: 'json',

            success: function(data){
                $('#check_result').html( data );
            }
        });
    });
});
