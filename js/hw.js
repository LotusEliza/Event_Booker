/**
 * Created by lotus on 9/12/17.
 */

$(document).ready(function () {
    // $('.clk').click(function () {
    //     var bgc = $(this).css('background-color');
    //     $('.middle').css('background-color', bgc);
    // });

    $('.clk').click(function() {
        var bgc = $(this).css('background-color');
        $('.middle').css({
            transition : 'background-color 1s ease-in-out',
            "background-color": bgc
        });
    });

});