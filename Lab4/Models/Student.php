<?php
namespace Models;

use Interfaces\CleaningInterface;

class Student extends Human implements CleaningInterface {
    private $university;
    private $course;

    public function __construct($height, $weight, $age, $university, $course) {
        parent::__construct($height, $weight, $age);
        $this->university = $university;
        $this->course = $course;
    }

    public function getUniversity() { return $this->university; }
    public function setUniversity($university) { $this->university = $university; }

    public function getCourse() { return $this->course; }
    public function setCourse($course) { $this->course = $course; }

    public function nextCourse() {
        $this->course++;
    }

    protected function notifyBirth() {
        return "Студент повідомляє: Народження дитини!";
    }


    public function cleanRoom() {
        return "Студент прибирає кімнату";
    }
    public function cleanKitchen() {
        return "Студент прибирає кухню";
    }

    public function __toString() {
        return "Студент: Університет - {$this->university}, Курс - {$this->course}";
    }
}