$(document).ready ( function () {
    setTimeout(realTime, 2000);
});
function realTime() {

    $.ajax({

        type: 'POST',
        url: url_messageGet,
        data: {'_token': $('input[name=_token]').val()},

        success: function (data) {
            $('#message').replaceWith('<ul class="media-list" id="message"></ul>');
            for (var i = 0; i < data.length; i++) {
                $('#message').prepend('<li class="media"><div class="media-body"><div class="media"><a class="pull-left" href="#"> <img class="media-object img-circle " src="mm.png"/></a>' +
                    '  <div class="media-body" >' + data[i].message + ' <br /> <small class="text-muted">' + data[i].from_name + ' | ' + data[i].created_at + '</small> <hr /> </div>' +
                    ' </div> </div> </li>');
            }
        }


    });
    setTimeout(realTime, 2000);

}
$(document).ready ( function () {

    $("#send").click ( function () {

        $.ajax({

            type:'POST',
            url:url_message,
            data:{
                '_token':$('input[name=_token]').val(),
                'from_name':$('input[name=fron_name]').val(),
                'message':$('input[name=message]').val(),

            },
            success: function(data){

                $('#message').prepend('<li class="media"><div class="media-body"><div class="media"><a class="pull-left" href="#"> <img class="media-object img-circle " src="mm.png"/></a>' +
                    '  <div class="media-body" >'+ data.message +' <br /> <small class="text-muted">'+ data.from_name+' | '+ data.created_at +'</small> <hr /> </div>' +
                    ' </div> </div> </li>');
            }

        });
        $('input[name=message]').val();
    });
});