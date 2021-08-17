<?php

require __DIR__.'/printarray.php';

function run($json){
    $object = json_decode($json, true);

    print "Task 1 Get all names, age, city\n";
    $Names = $Age = $City = [];

    foreach ($object["players"] as $player) {
        array_push($Names, $player["name"]);
        array_push($Age, $player["age"]);
        array_push($City, $player["address"]["city"]);
    }
    echo "Names: "; PrintArray($Names);
    echo "Age: "; PrintArray($Age);
    echo "City: "; PrintArray($City);

    print "Task 2 Get all unique names\n";
    $UniqueNames = [];

    foreach ($object["players"] as $player) {
        $newname = $player["name"];
        if (!in_array($newname, $UniqueNames)){
            array_push($UniqueNames, $newname);
        }
    }
    echo "Names: "; PrintArray($UniqueNames);

    print "Task 3 Get the name of Persons with max age\n";
    $MaxAgeNames = [];
    $MaxAge = 0;

    foreach ($object["players"] as $player) {
        $newage = $player["age"];
        $newname = $player["name"];
        if ($newage > $MaxAge) {
            $MaxAgeNames = [$newname];
            $MaxAge = $newage;
        } elseif ($newage == $MaxAge) {
            array_push($MaxAgeNames, $newname);
        }
    }
    echo "Names: "; PrintArray($MaxAgeNames);
}

$input = "{
            \"players\":
            [
                {\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},
                {\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Bangalore\"}},
                {\"name\":\"Dhoni\",\"age\":37,\"address\":{\"city\":\"Ranchi\"}},
                {\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Delhi\"}},
                {\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},
                {\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Mumbai\"}}
            ]
          }";

run($input);