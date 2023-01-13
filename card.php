<?php

    class Card 
    {


        //private $json_data = file_get_contents("digimon.json");
        //json_decode($json_data, true);

        private $json_data = json_decode(file_get_contents('data.txt'), true);
        private $name;
        private $type;
        private $color;
        private $play_cost;
        private $cardrarity;
        private $artist;
        private $dp;
        private $cardnumber;
        private $maineffect;
        private $set_name;
        private array $card_sets;
        private $image_url;

        public function setJsonData($json_data){
            $this->json_data = $json_data;
        }
        public function getJsonData(){
            return $this->json_data;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function getName(){
            return $this->name;
        }
        public function setType($type){
            $this->type = $type;
        }
        public function getType(){
            return $this->type;
        }
        public function setColor($color){
            $this->color = $color;
        }
        public function getColor(){
            return $this->color;
        }
        public function setPlay_cost($play_cost){
            $this->play_cost = $play_cost;
        }
        public function getPlay_cost(){
            return $this->play_cost;
        }
        public function setCardRarity($cardrarity){
            $this->cardrarity = $cardrarity;
        }
        public function getCardRarity(){
            return $this->cardrarity;
        }
        public function setArtist($artist){
            $this->artist = $artist;
        }
        public function getArtist(){
            return $this->artist;
        }
        public function setDp($dp){
            $this->dp = $dp;
        }
        public function getDp(){
            return $this->dp;
        }
        public function setCardNumber($cardnumber){
            $this->cardnumber = $cardnumber;
        }
        public function getCardNumber(){
            return $this->cardnumber;
        }
        public function setMainEffect($maineffect){
            $this->maineffect = $maineffect;
        }
        public function getMainEffect(){
            return $this->maineffect;
        }
        
        public function setSet_name($set_name){
            $this->set_name = $set_name;
        }
        public function getSet_name(){
            return $this->set_name;
        }
        public function setCard_sets($card_sets){
            $this->card_sets = $card_sets;
        }
        public function getCard_sets(){
            return $this->card_sets;
        }
        public function setImage_url($image_url){
            $this->image_url = $image_url;
        }
        public function getImage_url(){
            return $this->image_url;
        }
    }

    
?>