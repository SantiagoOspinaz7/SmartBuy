$('#login').submit(function(e){
e.preventDefault();
var user = $.trin($("#user").val());
var password =$.trin($("#password").val());
alert(password);

});