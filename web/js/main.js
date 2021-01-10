$( "#user-phone" ).change(function() {
    if (($("#user-phone" ).val()).length!=11) {
        alert('Телефон должен содержать 11 цифр!');
        $("#user-phone" ).focus();
    }
});
$( "#user-email" ).focusout(function() {
    $.post( "/index.php?r=site%2Fgetemail", { email: $("#user-email" ).val() })
                    .done(function( data ) {
                          if (data>0) {
                            alert('Такой email уже есть!');
                            $("#user-email" ).focus();
                          }
                    });
});
$("#user-phone").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
            if ($(this).val().length>11) {
                $(this).val($(this).val().slice(0, -1));
            }
        });

$('#createuser-form').on('submit', function() {
     if (($("#user-name" ).val()).length==0) {
        alert('Имя не заполнено!');
        $("#user-name" ).focus();
        return false; 
     }
     else
     {
        if (($("#user-password" ).val()).length==0)
        {
            alert('Пароль не может быть пустым!');
            $("#user-password" ).focus();
            return false; 
        }
        else
        {
            if (($("#user-phone" ).val()).length!=11)
            {
                alert('Телефон должен содержать 11 цифр!');
                $("#user-phone" ).focus();
                 return false; 
            }
            else
            {
                var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                if(!pattern.test($("#user-email" ).val()))
                {
                    alert('Неверный email!');
                    $("#user-email" ).focus();
                    return false; 
                }
            }
        }
     }
});
