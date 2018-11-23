/**
 * Created by lotus on 8/3/17.
 */

var monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

var currentDate = new Date();
var currentDay = 1;

function daysInThisMonth(d) {
    return new Date(d.getFullYear(), d.getMonth()+1, 0).getDate();
}

//***************************************************
function createCalendar() {
    $.getJSON('event/colors/' + currentDate.getFullYear() + '-' + (currentDate.getMonth()+1), function (data) {
        console.log(data);
        currentDate.setDate(1);
        console.log("curdate "+currentDate);
        console.log("curdate "+currentDate.getMonth());
        //console.log(daysInThisMonth(currentDate));
        var dayWeek = currentDate.getDay();

        if (dayWeek == 0){
            dayWeek = 7;  //dly russian calendar
        }

        console.log("dayweek "+dayWeek);
        var lastDay = daysInThisMonth(currentDate); //to know how many days in this month
        console.log("lastday "+lastDay);

        var calendarString = '';
        var day = 1;
        var i;


        //**************************************************************
        //lets create first week
        calendarString += '<div class="row">';
        for(i = 1; i < 8; i++){
            if (i >= dayWeek)
                calendarString += '<div class="col-md-1"> ' + createLink(day++, data.events) + '</div>';
            else
                calendarString += '<div class="col-md-1"></div>'; //skipping days of prev month
        }
        calendarString += '</div>';


        //*****************************************************************
        //and other weeks
        calendarString += '<div class="row">';
        i=1;
        for(;;){
            if (day > lastDay){
                break;
            }
            calendarString += '<div class="col-md-1"> ' + createLink(day++, data.events) + '</div>';
            if (i++%7==0)
            {
                calendarString += '</div>';
                calendarString += '<div class="row">';
            }
        }
        calendarString += '</div>';

        var c = $(calendarString);//creates an object in DOM(document object model)
        $('#calendar').html(c); //put it into div id=calendar

        //show name of month in a calendar header with arrows
        $("#currentDate").text(monthNames[currentDate.getMonth()] + ' ' + currentDate.getFullYear());


        $(".event").click(function () { // click handler po dniam calendara(class event)
            currentDay = $(this).text();
            $('#createEventDate').text(currentDay + ' ' + monthNames[currentDate.getMonth()] + ' ' + currentDate.getFullYear());
            //alert(day);
            // currentDate.getFullYear() + "/" + currentDate.getMonth() + "/" + currentDay
            $('#createEvent').modal(); //okoshko modal//????????????????????????????????????????????????????????
        });
    });

}

//*********************************************************************************************
$(document).ready(function () {
    //$("#createEvent").remove();

    $("#createEventForm").submit(function (a) { //a - sobitie brauzera (sama forma otpravliaet pri submite)
        console.log('submitted');

        var title = $("#createEventTitle").val(); //get a value from an input text
        console.log(title);
        var description = $("#createEventDescription").val();
        console.log(description);

        var m = currentDate.getMonth()+1;

        var params = {
            title: title,
            description: description,
            eventSubmit: true,
            date: currentDate.getFullYear() + "/" + m + "/" + currentDay
        };
        console.log(params);
        // params.title = title;
        // params.description = description;
        // params.eventSubmit = true;
        // params.date = currentDate.getFullYear() + "/" + currentDate.getMonth() + "/" + currentDay;


        //***********************|||||||||||||||AJAX|||||||||||||||||||||||

        
        $.post("/event", //send background post request to /event router
                params,
                function( data ) { //data soderjit tekst otveta ot servera (callback function)
                $('#createEvent').modal('toggle'); // hide(toggle) modal window
        });

        a.preventDefault(); //prevent submition of a form
    });

    createCalendar();
//console.log('document is ready');

    //************************************************************************************
    $("#prevMonth").click(function () {
        var prvm = currentDate.getMonth() - 1;
        currentDate.setMonth(prvm);
        console.log(currentDate);
        createCalendar();
    });

    $("#nextMonth").click(function () {
        var nxtm = currentDate.getMonth() + 1;
        currentDate.setMonth(nxtm);
        console.log(currentDate);
        createCalendar();
    });
    
});

function createLink(day, days) {
    for (var i=0; i<days.length; i++)
    {
        if(day == days[i]){
            return "<a href='#' class='event text-success'>" + day + "</a>";
        }
    }
    return "<a href='#' class='event'>" + day + "</a>";
}



