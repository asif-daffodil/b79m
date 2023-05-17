<?php 

    // indexed array
    $persons = array("Kaka", "Mama", "Dada");
    $students = ["Abdullah", "Shefa"];

    // echo $persons;
    print_r($persons);

    echo "<pre>";
    print_r($persons);
    echo "</pre>";

    echo $persons[0].", ".$persons[1].", ".$persons[2];

    echo "<br>";

    for ($i=0; $i < count($persons); $i++) { 
        if($i < (count($persons) - 1)){
            $coma = ", ";
        }else{
            $coma = ".";
        }
        echo $persons[$i].$coma;
    }
    echo "<br>";
    //associative array
    $abdullah = ["name" => "Abdulla Al Nadim", "age" => 20, "city" => "Narshindi"];
    print_r($abdullah);
    echo "<pre>";
    print_r($abdullah);
    echo "</pre>";
    echo $abdullah["name"];
    echo "<br>";

    foreach($abdullah as $key => $val){
        echo ucfirst($key).": ".$val."<br>";
    }


    // multidimontionl array

    $myStudents = [
        ["Kamla", "Dhaka", 20],
        ["Jamal", "Khulna", 30],
        ["Tomal", "Bogura", 40]
    ];
    echo "<pre>";
    print_r($myStudents);
    echo "</pre>";

    echo $myStudents[2][1];
?>