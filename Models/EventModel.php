<?php

/**
 * Created by PhpStorm.
 * User: lotus
 * Date: 7/18/17
 * Time: 7:35 PM
 */

class EventModel
{
    public function event($date, $title, $description){
        
        global $gdb;
        $q = "INSERT INTO `events` (`date`, `title`, `description`) VALUES (?, ?, ?)";
        $stmt = $gdb->prepare($q);
        

        if (!$stmt){
            echo ('Statement error: ' . $gdb->error);
            return false;
        }

        $ok = $stmt->bind_param('sss',$date, $title, $description);
        if (!$ok){
            echo ('bind_param error: ' . $gdb->error);
            return false;
        }

        $ok = $stmt->execute();
        if (!$ok){
            echo ('execute error: ' . $gdb->error);
            return false;
        }

        return true;
    }

    public function colorDays($month, $year){
        global $gdb;

        $start = $year.'-'.$month.'-01';
        $date = date_create($start);
        $end = date_format($date, 'Y-m-t');


        $q ="SELECT DISTINCT `date` FROM `events` WHERE `date` BETWEEN '{$start}' AND '{$end}'";
        $stmt = $gdb->prepare($q);
        if (!$stmt){
            echo ('Statement error: ' . $gdb->error);
            return [];
        }
        if (!$stmt->execute()){
            echo ('Statement error: ' . $gdb->error);
            return [];
        }
        $stmt->bind_result($date);
        $dates=[];
        while ($stmt->fetch()) {
            $parts = (explode("-",$date));
            $date = intval($parts[2]);
            $dates[]=$date;
        }
        
        return $dates;
    }

    public function dayEvents($day){
        global $gdb;
        $q ="SELECT * FROM `events` WHERE `date`='{$day}'";
        $stmt = $gdb->prepare($q);
        if (!$stmt){
            echo ('Statement error: ' . $gdb->error);
            return [];
        }
        if (!$stmt->execute()){
            echo ('Statement error: ' . $gdb->error);
            return [];
        }
        $stmt->bind_result($id, $date, $title, $description);
        $events=[];
        while ($stmt->fetch()) {
            $events[]=[$id, $date, $title, $description];
        }

        return $events;
    }

}
