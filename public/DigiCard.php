<?php

    class DigiCard extends Card 
    {
        private $stage;
        private $digi_type;
        private $attribute;
        private $level;
        private $evolution_cost;
        private $sourceeffect;

        
        /*///// json -> de esto no estoy muy seguro////////////////////////////////////
        //private array $json_digi = json_decode(file_get_contents('digimon.json'), true);
        public function setJsonData($json_digi){
            $this->json_data = $json_digi;
        }
        public function getJsonData(){
            return $this->json_digi;
        }
        /////////////////////////////////////////////////////////////*/
        public function setStage($stage){
            $this->stage = $stage;
        }
        public function getStage(){
            return $this->stage;
        }
        public function setDigi_type($digi_type){
            $this->digi_type = $digi_type;
        }
        public function getDigi_type(){
            return $this->digi_type;
        }
        public function setAttribute($attribute){
            $this->attribute = $attribute;
        }
        public function getAttribute(){
            return $this->attribute;
        }
        public function setLevel($level){
            $this->level = $level;
        }
        public function getLvel(){
            return $this->level;
        }
        public function setEvolution_cost($evolution_cost){
            $this->evolution_cost = $evolution_cost;
        }
        public function getEvolution_cost(){
            return $this->evolution_cost;
        }
        public function setSourceEffect($sourceeffect){
            $this->sourceeffect = $sourceeffect;
        }
        public function getSourceEffect(){
            return $this->sourceeffect;
        }

        
       
    }
    

?>