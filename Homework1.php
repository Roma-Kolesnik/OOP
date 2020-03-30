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
        $available_families = ['Hare', 'Squirrel', 'Mouse', 'Felidae', 'Сanine',
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

    public function __construct($type, $class, $family, $kind){
        $this->setType($type);
        $this->setClass($class);
        $this->setFamily($family);
        $this->setKind($kind);
    }

}

class Mammal extends Animal{
   private $subclass;

   public function getSubclass(){
       return $this->subclass;
   }

    public function setSubclass($subclass){
        $available_subclass = [
            "Prototheria", "Monotremata", "Theria", "Metatheria", "Eutheria"
        ];
        if(is_string($subclass) && in_array($subclass, $available_subclass)){
            $this->subclass = $subclass;
            return true;
        }else {
            return false;
        }
    }
    public function __construct($subclass){
        $this->setSubclass($subclass);
    }
}


class Cat extends Mammal {
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

    public function getInfo(){
        return
            "Our animal has type ". $this->getType().', '.
            "class is". $this->getClass().", ".
            "subclass of mammal is ".$this->getSubclass().', '.
            'from family'. $this->getFamily().", ".
            "and it has kind of ". $this->getKind().". ".
            "The name of cat is " . $this->getNickname(). ', '.
            'it is '.$this->getAge() .' years old, '.
            'color is '.$this->getColor(). ', '.
            'breed is '.$this->getBreed().'.';
    }

    public function __construct($nickname, $color, $breed, $age){
        $this->setNickname($nickname);
        $this->setColor($color);
        $this->setBreed($breed);
        $this->setAge($age);
    }

}




$animal = new Animal("Chordata", "Mammalia", "Felidae", "Cat");
$mammal = new Mammal("Theria");
$murzik = new Cat("Murzik", "brown", "Abyssinian", 5);
echo $murzik->getInfo();




?>