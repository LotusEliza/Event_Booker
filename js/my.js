/**
 * Created by lotus on 9/12/17.
 */

$(document).ready(function () {
    $('button').click(function () {
        var bgc = $(this).css('background-color');
        $('.jumbotron').css('background-color', bgc);
    });
   //alert('123');
});