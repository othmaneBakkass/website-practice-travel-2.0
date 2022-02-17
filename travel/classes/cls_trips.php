<?php

//include necessary classes
include_once "dataAccess.php";

class Trips
{

    //get all the trips from database 
    public static function fetchAllTrips()
    {
        $query = "SELECT * FROM trips";
        $stmt = Dataaccess::selection($query);
        return $stmt;
    }

    //get trip By name

    public static function getTripByName($name)
    {
        $query = "SELECT * FROM trips WHERE tripName LIKE '%$name%'";
        if (Dataaccess::check($query)) {
            $stmt = Dataaccess::selection($query);
            return $stmt;
        } else {
            return false;
        }
    }

    //get trip By id
    public static function getTripByID($id)
    {
        $query = "SELECT * FROM trips WHERE tripId = $id ";
        if (Dataaccess::check($query)) {
            $stmt = Dataaccess::selection($query);
            return $stmt;
        } else {
            return false;
        }
    }
}
