<?php

use function PHPSTORM_META\type;

const LONG_TOKEN=64;
const PAGE_NUMBER = 12;

require("config.example.php");

//require('../vendor/autoload.php');

require("DWESBaseDatos.php");
require("Mailer.php");

 $DB=DWESBaseDatos::obtenerInstancia();
//  $DB->inicializa(
//      $CONFIG['db_name'],
//      $CONFIG['db_user'],
//      $CONFIG['db_pass'],
//  );
 $servername = 'localhost';
 $username = 'deckbuilder';
 $password = 'deckbuilder';
 $database = 'deckbuilder';
 $conn = mysqli_connect($servername, $username, $password, $database);

//  function cleanData(&$data){
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//   return $data;
// }

     $json_data = file_get_contents("../digimon.json");
    
     $cartas = json_decode($json_data, JSON_OBJECT_AS_ARRAY);
     
    
     
    //  foreach($cartas as $carta => $value){
    //    foreach ($value as $clave => $valor) {
    //      if (gettype($valor)!='array') {
    //        $value = cleanData($valor);
    //        }else{
    //          foreach ($valor as $card_sets=>$set) {
    //            $card_sets = cleanData($set);
    //            $valor = $card_sets;
    //          }  
    //        }
    //   }
     if (!isset($_COOKIE['insertado'])) {
        $sql = "INSERT INTO cards (
          name,
          type,
          color,
          stage,
          digi_type,
          attribute,
          level,
          play_cost,
          evolution_cost,
          cardrarity,
          artist,
          dp,
          cardnumber,
          maineffect,
          sourceeffect,
          set_name,
          card_sets,
          image_url
        )
        VALUES";
        //cleanData($cartas);
        foreach ($cartas as $carta) {
          $name = addslashes($carta["name"]);
          $type = addslashes($carta["type"]);
          $color = addslashes($carta["color"]);
          $stage = addslashes($carta["stage"]);
          $digi_type = addslashes($carta["digi_type"]);
          $attribute = addslashes($carta["attribute"]);
          if(is_null($carta["level"])){
          $level = 0; 
          }else{
          $level = $carta["level"];
          }
          
          if(is_null($carta["play_cost"])){
          $play_cost = 0; 
          }else{
          $play_cost = $carta["play_cost"];
          }
  
          if(is_null($carta["evolution_cost"])){
          $evolution_cost = 0; 
          }else{
          $evolution_cost = $carta["evolution_cost"];
          }
  
          $cardrarity = addslashes($carta["cardrarity"]);
          $artist = addslashes($carta["artist"]);
  
          if(is_null($carta["dp"])){
          $dp = 0; 
          }else{
          $dp = $carta["dp"];
          }
          $cardnumber = addslashes($carta["cardnumber"]);
          $maineffect = addslashes($carta["maineffect"]);
          $sourceeffect = addslashes($carta["sourceeffect"]);
          $set_name = addslashes($carta["set_name"]);
          $card_sets = addslashes(implode(",",$carta['card_sets']));
          $image_url = addslashes($carta["image_url"]);
          $sql .= "
          (
              '$name',
              '$type',
              '$color',
              '$stage',
              '$digi_type',
              '$attribute',
              '$level',
              '$play_cost',
              '$evolution_cost',
              '$cardrarity',
              '$artist',
              '$dp',
              '$cardnumber',
              '$maineffect',
              '$sourceeffect',
              '$set_name',
              '$card_sets',
              '$image_url'
          ),";
        
        
        }
        
        $sql = substr($sql ,0,-1);
        mysqli_query($conn,$sql);
        setcookie('insertado','insertado',time()+60*60*24*30);
     }else{
        setcookie('insertado','insertado',time()+60*60*24*30);
     }
    // }
     
    
 


//politica de cookies

session_start();

?>