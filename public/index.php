<?php
require_once('cab.php');
require_once('../src/init.php');

//paginar los resultados de la consulta

//

//data de las columnas por pagina
$sql = "SELECT image_url FROM cards";
$resultado = mysqli_query($conn, $sql);
$total_rows = mysqli_num_rows($resultado);

//numero de paginas requeridas
$total_pages = ceil($total_rows / $limit);


$expansion = "";
$orden = "";
$asc = "";
//busquedas del formulario
if (isset($_GET['enviar'])) {
    if (isset($_GET['set_name'])) {
        $expansion = $_GET['set_name'];
    }
    if (isset($_GET['type'])) {
        $orden = $_GET['type'];
    }
    if (isset($_GET['asce'])) {
        $asc = $_GET['asce'];
    }
}



////////////BUSQUEDA LIVE//////////////////

/////////////////////////////////////////


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="selector">

        <form action="" method="get">

            <form action="" method="get">
                <select name="set_name" id="set_name">
                    <option value="" disabled selected hidden>Expansiones</option>
                    <?php
                    $sqlExpansion = mysqli_query($conn, "SELECT DISTINCT set_name FROM cards ORDER BY card_sets");
                    while ($row = mysqli_fetch_array($sqlExpansion)) {
                        echo '<option>"' . $row['set_name'] . '</option>';
                    }
                    ?>
                </select>

                <select name="type" id="type">
                    <option value="" disabled selected hidden>Orden</option>
                    <option value="cardname">nombre de carta</option>
                    <option value="cardcolor">color</option>
                    <option value="cardtype">card type</option>
                    <option value="cardrarity">rareza</option>
                    <option value="cardpower">poder</option>
                    <option value="cardstage">stage</option>
                    <option value="cardid">id</option>
                    <option value="cardevocost">evolution cost</option>
                    <option value="cardplaycost">play cost</option>
                </select>


                <select name="asce" id="asc">
                    <option value="" disabled selected hidden>Ascendiente</option>
                    <option value="asc">Ascendiente</option>
                    <option value="desc">Descendiente</option>
                </select>
                <input type="submit" value="aplicar filtros" name="enviar">
            </form>
            <div class="search">
                <form action="" method="post">
                    <input type="text" placeholder="   CARD NAME..." name="search" id="search">

                </form>

            </div>

    </div>
    <div class="cards">
        <div class="card" id="card">
            <?php
            //datos de la select por pagina
            if (isset($_POST['input'])) {
                $input = $_POST['input'];
                $sql = "SELECT * FROM cards WHERE name LIKE'{$input}%' LIMIT " . $inital_page . ',' . $limit;
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $id = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<img src="' . $row['image_url'] . '" width="242" height="351" id="imageButton" class="open-modal" data-name="' . $row['name'] . '" data-open="modal-' . $id . '" onclick="buttonClicked()">';
                        echo '<div class="modal" id="modal-' . $id . '">
                                     <div class="modal-dialog">
                                         <header class="modal-header">
                                             <button class="close-modal">X</button>
                                             "' . $row['name'] . '"
                                             <img src="' . $row['image_url'] . '" width="242" height="351" >
                                             "' . $row['maineffect'] . '"
                                             "' . $row['sourceeffect'] . '"
                                         </header>
                                     </div>
                                   </div>';
                        $id++;
                    }
                }
            } else {

                $sql = "SELECT * FROM cards LIMIT " . $inital_page . ',' . $limit;
                $result = mysqli_query($conn, $sql);
                $id = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo '<img src="' . $row['image_url'] . '" width="242" height="351" id="imageButton" class="open-modal" data-name="' . $row['name'] . '" data-open="modal-' . $id . '" onclick="buttonClicked()">';
                    echo '<div class="modal" id="modal-' . $id . '">
                                    <div class="modal-dialog">
                                        <header class="modal-header">
                                            <button class="close-modal">X</button>
                                            "' . $row['name'] . '"
                                            <img src="' . $row['image_url'] . '" width="242" height="351" >
                                            "' . $row['maineffect'] . '"
                                            "' . $row['sourceeffect'] . '"
                                        </header>
                                    </div>
                                  </div>';
                    $id++;
                }
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

                if ($page_number >= 2) {
                    echo "<a href='index.php?page=" . ($page_number - 1) . "'>  Prev </a>";
                    echo "<a href='index.php?page='1'>1</a>";
                }

                if ($page_number < 3) {
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i == $page_number) {
                            echo "<a class = 'active' href='index.php?page="  . $i . "'>" . $i . " </a>";
                        } else {
                            echo "<a href='index.php?page=" . $i . "'> " . $i . " </a>";
                        }
                    }
                } elseif ($page_number >= $total_pages - 2) {
                    for ($i = $total_pages - 4; $i <= $total_pages; $i++) {
                        if ($i == $page_number) {
                            echo "<a class = 'active' href='index.php?page="  . $i . "'>" . $i . " </a>";
                        } else {
                            echo "<a href='index.php?page=" . $i . "'> " . $i . " </a>";
                        }
                    }
                } else {
                    for ($i = $page_number - 2; $i <= $page_number + 2; $i++) {
                        if ($i == $page_number) {
                            echo "<a class = 'active' href='index.php?page="  . $i . "'>" . $i . " </a>";
                        } else {
                            echo "<a href='index.php?page=" . $i . "'> " . $i . " </a>";
                        }
                    }
                }

                if ($page_number < $total_pages) {
                    echo "<a href='index.php?page=" . ($page_number + 1) . "'>  Next </a>";
                }
                ?>

            </div>




        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#search").keyup(function() {
                    var input = $(this).val();
                    //alert(input);
                    if (input != "") {
                        $.ajax({
                            url:'busqueda.php',
                            method: "POST",
                            data: {
                                input: input
                            },
                            success: function($data) {
                                $("#card").html($data);
                                console.log($data);
                                // fetch('dbc.php')
                                // .then(res => res.json())
                                // .then(dato =>{
                                //     //$("#card").html(dato);
                                //     console.log(dato);
                                    

                                //     let cartas = '';

                                //     dato.forEach(carta => {
                                //         cartas+= `
                                //         <img src="' ${carta.image_url}'" width="242" height="351" id="imageButton" class="open-modal" data-name="'${carta.name}'" data-open="modal-' . $id . '" onclick="buttonClicked()">
                                //         <div class="modal" id="modal-' . $id . '">
                                //                     <div class="modal-dialog">
                                //                         <header class="modal-header">
                                //                             <button class="close-modal">X</button>
                                //                             "'${carta.name}'"
                                //                             <img src="'${carta.image_url}'" width="242" height="351" >
                                //                             "'${carta.maineffect}'"
                                //                             "'${carta.sourceeffect}'"
                                //                         </header>
                                //                     </div>
                                //                 </div>
                                        
                                //         `;
                                //     });

                                //     document.getElementById('card').innerHTML = cartas;
                                //});
                            }
                        });
                    }
                });
            });

        </script>
        <script src="index.js"></script>
</body>

</html>