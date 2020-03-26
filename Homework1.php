<?php

class Animal{
    private $type, $class, $family, $kind;

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $available_types = ['Spongia', 'Plathelmintes', 'Mollusca', 'Arthropoda', 'Chordata'];
        if(is_string($type) && in_array($type, $available_types)){
            $this->type = $type;
            return true;
        }else {
            return false;
        }
    }

    public function getClass(){
        return $this->class;
}

    public function setClass($class){
        $available_classes = [
            'Crustacea', 'Arachnida', 'Insécta', 'Mammalia', 'Aves',
            'Reptilia', 'Amphibia', 'Pisces'
        ];
        if(is_string($class) && in_array($class, $available_classes)){
            $this->class = $class;
            return true;
        }else{
            return false;
        }
    }

    public function getFamily(){
        return $this->family;
    }

    public function setFamily($family){
        $available_families = ['Hare', 'Squirrel', 'Mouse', 'Feline', 'Сanine',
            'Bear'];
        if(is_string($family) && in_array($family, $available_families)){
            $this->family = $family;
            return true;
        }else{
            return false;
        }
    }

    public function getKind(){
        return $this->kind;
    }

    public function setKind($kind){
        $available_kind = [
          'Rabbit', 'Dog', 'Fox', 'Cat', 'Monkey', 'Spider', 'Goat', 'Pig', 'Cow', 'Bird'
        ];
        if(is_string($kind) && in_array($kind, $available_kind)){
            $this->kind = $kind;
            return true;
        }else {
            return false;
        }
    }
}

class Mammal extends Animal{

}


class Cat extends Mammal{
    private $color, $nickname, $breed, $age;

    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $colors_available = ['grey', 'black', 'white', 'brown'];
        if(!empty($color) && is_string($color) && in_array($color, $colors_available)) {
            $this->color = $color;
            return true;
        } else {
            return false;
        }
    }

    public function getNickname(){
        return $this->nickname;
    }

    public function setNickname($nickname){
        if (is_string($nickname)) {
            $this->nickname = $nickname;
            return true;
        }else{
            return false;
        }
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        if (is_numeric($age)) {
            $this->age = $age;
            return true;
        }else{
            return false;
        }
    }
    public function getBreed(){
        return $this->breed;
    }

    public function setBreed($breed){
        if(is_string($breed)){
            $this->breed = $breed;
            return true;
        }else{
            return false;
        }
    }

    /*
    public function __construct($color, $nickname, $breed, $age){
        $this->color = $color;
        $this->nickname = $nickname;
        $this->breed = $breed;
        $this->age = $age;
    }
    */
    public function getInfo(){
        return "The name of cat is " . $this->getNickname(). ', '.
            'it is '.$this->getAge() .' years old, '.
        'color is '.$this->getColor(). ', '.
            'breed is '.$this->getBreed().'.';
    }
}





$murzik = new Cat;
$murzik->setNickname('Murzik');
$murzik->setAge(5);
$murzik->setColor('brown');
$murzik->setBreed('Abyssinian');
echo $murzik->getInfo();

























































?>