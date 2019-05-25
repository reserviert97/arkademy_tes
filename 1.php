<?php

function biodata()
{
    $name = "Nurlatif Ardhi Pratama";
    $hobbies = ['Gaming', 'Reading', 'Coding'];
    $is_married = false;
    $school = new School("SMAS Daarul Qur'an", "STMIK IKMI CIREBON");
    $skills = [
        [
            'name' => 'a',
            'score' => 'b',
        ]
    ];
}



class School  
{
    public function __construct($sma, $univ) {
        $this->highSchool = $sma;
        $this->university = $univ;
    }
    public $highSchool;
    public $university;
}


?>