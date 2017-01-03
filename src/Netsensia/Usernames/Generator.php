<?php

namespace Netsensia\Usernames;

class Generator
{
    private $adjectives = ['Amazing','Awesome','Big','Bouncy','Brave','Crazy','Cunning','Curly','Dangerous','Elastic','Fantastic','Fast','Ferocious','Fierce','Fluffy','Flying','Grumpy','Hungry','Intrepid','Invisible','Jolly','Juicy','Quick','Master','Restless','Super','Young','King'];
    private $animals = ['Badger','Cobra','Dolphin','Donkey','Eagle','Falcon','Fox','Hamster','Lion','Kangaroo','Koala','Giraffe','Gorilla','Lynx','Monkey','Mouse','Osprey','Owl','Ox','Panther','Penguin','PolarBear','Puma','Rhino','Shark','Squirrel','Starfish','Tiger','Turtle','Velociraptor','Whale','Zebra'];
    private $buildings = ['Tower','Skyscraper','House','Palace','Castle'];
    private $fruits = ['Strawberry','Apple','Orange','Lime','Banana','Mango'];
    private $colours = ['Red','Yellow','Green','Blue','Mauve','Orange','Purple','Turqouise','Pink','Scarlet'];
    
    private function randomElement($array) {
        return $array[rand(0, count($array))];    
    }
    
    public function generate($parts)
    {
        if ($parts < 1) {
            $parts = 1;
        }
        
        if ($parts > 3) {
            $parts = 3;
        }
        
        $nouns = array_merge(
            $this->animals,
            $this->buildings,
            $this->fruits
        );
        
        switch ($parts) {
            case 1: 
                return $this->randomElement($nouns);
            case 2: 
                return 
                    $this->randomElement($this->adjectives) . ' ' .
                    $this->randomElement($nouns);
            case 3:
                return
                    $this->randomElement($this->adjectives) . ' ' .
                    $this->randomElement($this->colours) . ' ' .
                    $this->randomElement($nouns);
        }        
    }
}
