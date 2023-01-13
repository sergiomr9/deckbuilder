<?php 
    require_once('cab.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="cab.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>
        <div class="selector">
            
            <form action="" method="get">
                <select name="bt" id="bt">
                    <option value="" disabled selected hidden>Expansiones</option>
                    <option value="bt1">BT1.0</option>
                    <option value="">BT1.5</option>
                    <option value="">BT04</option>
                    <option value="">BT05</option>
                    <option value="">BT06</option>
                    <option value="">BT07</option>
                    <option value="">BT08</option>
                    <option value="">BT09</option>
                    <option value="">BT10</option>
                    <option value="">EX01</option>
                    <option value="">EX02</option>
                    <option value="">EX03</option>
                </select>
                <select name="starter" id="starter">
                    <option value="" disabled selected hidden>Starter deck</option>
                    <option value="bt1">ST01</option>
                    <option value="">ST02</option>
                    <option value="">ST03</option>
                    <option value="">ST04</option>
                    <option value="">ST05</option>
                    <option value="">ST06</option>
                    <option value="">ST07</option>
                    <option value="">ST08</option>
                    <option value="">ST09</option>
                    <option value="">ST10</option>
                    <option value="">ST11</option>
                    <option value="">ST12</option>
                    <option value="">ST13</option>
                    <option value="">ST14</option>
                </select>
                <select name="type" id="type">
                    <option value="" disabled selected hidden>Orden</option>
                    <option value="bt1">nombre de carta</option>
                    <option value="">color</option>
                    <option value="">card type</option>
                    <option value="">rareza</option>
                    <option value="">poder</option>
                    <option value="">coste</option>
                </select>
                <select name="asce" id="asc">
                    <option value="" disabled selected hidden>Ascendiente</option>
                    <option value="bt1">Ascendiente</option>
                    <option value="">Descendiente</option>
                </select>
            </form>
            <div class="search">
                <form action="" method="get">
                    <input type="text" placeholder="   CARD NAME..." name="search">
                </form>
            </div>
            
        </div>
        <div class="cards">
            <div class="card">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
            </div>
        </div>
        <script src="cab.js"></script>
    </body>
</html>
