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
$inital_page = ($page_number - 1) * $limit;
//data de las columnas por pagina
$sql = "SELECT image_url FROM cards";
$resultado = mysqli_query($conn, $sql);
$total_rows = mysqli_num_rows($resultado);

//numero de paginas requeridas
$total_pages = ceil($total_rows / $limit);







////////////BUSQUEDA LIVE//////////////////
if (isset($_POST['input'])) {
    $input = addslashes($_POST['input']);
    $query = "SELECT * FROM cards WHERE name LIKE '{$input}%'" . $inital_page . ',' . $limit;
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result)>0) {
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
    }else{
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
}
///////////////////////////////////////////


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
            </form>

            <form action="" method="get">
                <select name="type" id="type">
                    <option value="" disabled selected hidden>Orden</option>
                    <option value="">nombre de carta</option>
                    <option value="">color</option>
                    <option value="">card type</option>
                    <option value="">rareza</option>
                    <option value="">poder</option>
                    <option value="">coste</option>
                    <option value="">stage</option>
                    <option value="">id</option>
                    <option value="">evolution cost</option>
                    <option value="">play cost</option>
                </select>
            </form>
            <form action="" method="get">
                <select name="asce" id="asc">
                    <option value="" disabled selected hidden>Ascendiente</option>
                    <option value="bt1">Ascendiente</option>
                    <option value="">Descendiente</option>
                </select>
            </form>
        </form>
        <div class="search">
            <form action="" method="get">
                <input type="text" placeholder="   CARD NAME..." name="search" id="search">

            </form>

        </div>

    </div>
    <div class="cards">
        <div class="card" id="card">
            <?php
            //datos de la select por pagina
            
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
                            url: "index.php",
                            method: "POST",
                            data: {
                                input: input
                            },
                            fuccess: function($data) {
                                $("#card").html(data);
                            }
                        });
                    }
                });
            });
        </script>
        <script src="index.js"></script>
</body>

</html>