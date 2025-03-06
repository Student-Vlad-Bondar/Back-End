<?php
namespace Models;

use Interfaces\CleaningInterface;

class Programmer extends Human implements CleaningInterface {
    private $languages = [];
    private $experience;

    public function __construct($height, $weight, $age, $experience, array $languages = []) {
        parent::__construct($height, $weight, $age);
        $this->experience = $experience;
        $this->languages = $languages;
    }

    public function getExperience() { return $this->experience; }
    public function setExperience($experience) { $this->experience = $experience; }

    public function getLanguages() { return $this->languages; }
    public function addLanguage($language) {
        if (!in_array($language, $this->languages)) {
            $this->languages[] = $language;
        }
    }

    protected function notifyBirth() {
        return "Програміст повідомляє: Народження дитини!";
    }

    public function cleanRoom() {
        return "Програміст прибирає кімнату";
    }
    public function cleanKitchen() {
        return "Програміст прибирає кухню";
    }

    public function __toString() {
        return "Програміст: Досвід - {$this->experience} років, Мови - " . implode(", ", $this->languages);
    }
}