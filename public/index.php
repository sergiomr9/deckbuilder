<?php 
    require_once('cab.php');
    require('../src/init.php');

    //paginar los resultados de la consulta

    //
    $limit = 12;
    //actualizar la pagina activa
    if (isset($_GET["page"])) {
        $page_number = $_GET["page"];
    } else {
        $page_number = 1;
    }
    //coger la pagina incial
    $inital_page = ($page_number-1)* $limit;
    //data de las columnas por pagina
    $sql = "SELECT image_url FROM cards";
    $resultado = mysqli_query($conn,$sql);
    $total_rows = mysqli_num_rows($resultado);

    //numero de paginas requeridas
    $total_pages = ceil($total_rows / $limit);
    

   

    //datos de la select por pagina
    $sql = "SELECT * FROM cards LIMIT ". $inital_page.','.$limit;
    $result = mysqli_query($conn, $sql);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
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
                <!-- <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt="">
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
                <img src= https://images.digimoncard.io/images/cards/ST9-15.jpg width="242" height="351" alt=""> -->
                <?php 
                
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<img src="'.$row['image_url'].'"width="242" height="351" onclick="yourFunction()">';
                    }
                    
                ?>
                
                <div class="Items">    

                    <?php  
                    $limit = 5;
                    $getQuery = "SELECT COUNT(*) FROM cards";     
                    $result = mysqli_query($conn, $getQuery);     
                    $row = mysqli_fetch_row($result);     
                    $total_rows = $row[0];              
                    $total_pages = ceil($total_rows / $limit);

                    if($page_number>=2){   
                        echo "<a href='index.php?page=".($page_number-1)."'>  Prev </a>";   
                    }   

                    if($page_number < 3){
                        for ($i=1; $i<=5; $i++) {   
                            if ($i == $page_number) {   
                                echo "<a class = 'active' href='index.php?page="  .$i."'>".$i." </a>";   
                            }               
                            else  {   
                                echo "<a href='index.php?page=".$i."'> ".$i." </a>";     
                            }   
                        }   
                    }elseif($page_number >= $total_pages - 2){
                        for ($i=$total_pages-4; $i<=$total_pages; $i++) {   
                            if ($i == $page_number) {   
                                echo "<a class = 'active' href='index.php?page="  .$i."'>".$i." </a>";   
                            }               
                            else  {   
                                echo "<a href='index.php?page=".$i."'> ".$i." </a>";     
                            }   
                        }   
                    }else{
                        for ($i=$page_number-2; $i<=$page_number+2; $i++) {   
                            if ($i == $page_number) {   
                                echo "<a class = 'active' href='index.php?page="  .$i."'>".$i." </a>";   
                            }               
                            else  {   
                                echo "<a href='index.php?page=".$i."'> ".$i." </a>";     
                            }   
                        }
                    }

                    if($page_number<$total_pages){   
                        echo "<a href='index.php?page=".($page_number+1)."'>  Next </a>";   
                    }     
                    ?>    

                </div> 

                    
                
            
        </div>
        <script>
            function yourFunction() {
                
            }
        </script>
        <script src="cab.js"></script>
        
    </body>
</html>
