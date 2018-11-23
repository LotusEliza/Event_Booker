
<?php

class eventController
{
    public function action($params)
    {
        //vd($params);
        //if (isset($_POST['title']) && isset($_POST['description'])){
        //exit ('6uijj765rf6g7h');
        if (count($params) > 0){
            if ($params[0] == "colors"){
                $this->eventsByMonth($params[1]);
            } else if ($params[0] == "day") {
                $this->eventsByDay($params[1]);
            }
        }
        if (isset($_POST['eventSubmit'])){
            $this->createEvent();
        }
    }

    private function eventsByDay($date){
        $model = new EventModel();
        $events = $model -> dayEvents($date);
        echo json_encode(['events' => $events]);
    }

    private function eventsByMonth($date){ // passing $params[0]
        $parts = (explode("-",$date));
        if (count($parts) != 2){
            return;
        }
        $year = $parts[0];
        $month = $parts[1];
        $model = new EventModel();
        $dates = $model -> colorDays($month, $year);
        echo json_encode(['events' => $dates]);
        //vd($dates);
//SELECT DISTINCT `date` FROM `events` WHERE `date` BETWEEN '2017-08-01' AND '2017-08-31' 
        
    }

    private function createEvent(){
        $title = filter_input(INPUT_POST,'title', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST,'description', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST,'date', FILTER_SANITIZE_STRING);
        //exit ($title.'***'.$description.'***'.$date);

        $model = new EventModel();

        if ($model -> event($date, $title, $description) === true)
        {
            echo 'ok';
        }
    }
}

?>


