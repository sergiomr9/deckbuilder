<?php 

require_once('../src/init.php');

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    <script>var modal;
var btn = document.querySelectorAll('.open-modal');
btn.forEach(function (el) {
    el.addEventListener('click', function () {
        modal = document.getElementById(this.dataset.open);
        modal.style.display = "block";
    });
});
var span = document.getElementsByClassName("close-modal");
for (let i = 0; i < span.length; i++) {
    span[i].onclick = function () {
        modal.style.display = "none";
    }
}
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}</script>
</body>
</html>