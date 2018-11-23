<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="js/calendar.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <div id="header" class="col-md-offset-3">
            <button id="prevMonth">&lt;</button>
            <span id="currentDate">123</span>
            <button id="nextMonth">&gt;</button>
        </div>
        <div class="container" id="days-of-week">
            <div class="row">
                <div class="col-md-1">Пн</div>
                <div class="col-md-1">Вт</div>
                <div class="col-md-1">Ср</div>
                <div class="col-md-1">Чт</div>
                <div class="col-md-1">Пт</div>
                <div class="col-md-1">Сб</div>
                <div class="col-md-1">Вс</div>
            </div>
        </div>
        <div id="calendar" class="container">

        </div>
        
        
        <!-- Modal -->
        <div id="createEvent" class="modal fade" role="dialog">
            <div class="modal-dialog">

                mkb  m m ,
                <!-- Modal content-->
                <div class="modal-content">
                    <form id="createEventForm" method="POST" action="/event">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Create Event for <span id="createEventDate"></span></h4>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="createEventTitle">Event title</label>
                                    <input type="text" name="title" class="form-control" id="createEventTitle" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label for="createEventDescription">Description</label>
                                    <textarea name="description" class="form-control" id="createEventDescription" placeholder="Description"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="event-submit" class="btn btn-success">Create</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    
    </body>
</html>























<!--    <div class="row">-->
<!--        <div class="col-xs-3">-->
<!--            <div id="panel1" class="panel panel-primary">-->
<!--                <div class="panel-heading">-->
<!--                    #panel1-->
<!--                </div>-->
<!--                <div class="panel-body>">content-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="col-xs-3">-->
<!--            <div id="panel2" class="panel panel-primary">-->
<!--                <div class="panel-heading">-->
<!--                    #panel2-->
<!--                </div>-->
<!--                <div class="panel-body>">content-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="col-xs-3">-->
<!--            <div id="panel3" class="panel panel-primary">-->
<!--                <div class="panel-heading">-->
<!--                    #panel3-->
<!--                </div>-->
<!--                <div class="panel-body>">content-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="col-xs-3">-->
<!--            <div id="panel4" class="panel panel-primary">-->
<!--                <div class="panel-heading">-->
<!--                    #panel4-->
<!--                </div>-->
<!--                <div class="panel-body>">content-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--    <script>-->
<!--        $(document).ready(function(){-->
<!--            $('#panel1').hide(300).show(1000);-->
<!--            $('#panel2').slideUp(1000).delay(1000).slideDown(1000);-->
<!--        });-->
<!--    </script>-->


