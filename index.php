<?php 

## Data Indexes:
## 0 : Movie Title
## 1 : Format
## 2 : Dine In (0 no, 1 yes)
## 3 : Closed Captioning (0 no, 1 yes)
## 4 : Audio Description
## 5 : Spanish Spoken with no Subtitles
## 6+: Times

$dataArray = array();

if (($handle = fopen("data/movies1.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, "~")) !== FALSE) {
        $dataArray[] = $data;
    }
    fclose($handle);
}

## Extract the unique list of titles

$titleList = array();
for($i = 0; $i < count($dataArray); $i ++) {
    $str = $dataArray[$i][0];
    if(in_array($str, $titleList) != true) {
        array_push($titleList, $str);
    }
}
sort($titleList);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <script src="https://use.fontawesome.com/12442888a1.js"></script>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <nav class="nav-bar">
        <div class="nav-left">
            <a href="" class="nav-item">MovieDB</a>
        </div>
        <div class="nav-right">
            <a href="" class="nav-item">Showtimes</a>
            <a href="" class="nav-item">About</a>
        </div>
    </nav>

    <div class="app">
        <!-- Filter Bar -->
        <div class="filter-bar">
            <p class="heading">SHOWTIMES</p>
        </div>


        <div class="results-grid" id="movie-list">
            <!-- Print out the List of Movies -->
            <?php
                for($i = 0; $i < count($dataArray); $i ++) {
                    echo "<div class='col-one'>";
                    echo "<img src=" . "img/" . str_replace(":", "", str_replace(" ","-",$dataArray[$i][0])) . ".jpg" . " alt=" . $dataArray[$i][0] . " class='poster-img'>";
                    echo "</div>";
                    echo "<div class='col-two'>";
                    echo "<button class='purchase-btn' id=" . $i . ">Purchase</button>";
                    echo "<h5>" . $dataArray[$i][0] . "<small>" . $dataArray[$i][1] . "</small></h5>";
                    echo "<h6>";
                    for($j = 6; $j < count($dataArray[$i]); $j ++) {
                        echo $dataArray[$i][$j] . " | ";
                    }
                    echo "</h6>";
                    echo "<hr>";
                    echo "<span class='tag-span'>";
                    if($dataArray[$i][2] == "1") {
                        echo "<p>Dine-In Full Service</p>";
                    }
                    if($dataArray[$i][3] == "1") {
                        echo "<p>Closed Caption</p>";
                    }
                    if($dataArray[$i][4] == "1") {
                        echo "<p>Audio Description</p>";
                    }
                    if($dataArray[$i][5] == "1") {
                        echo "<p>Spanish Spoken with No Subtitles</p>";
                    }
                    echo"</span>";
                    echo "</div>";
                }
            ?>
        </div>

        <!-- Purchase Pages -->
        
        <?php
        for($i = 0; $i < count($dataArray); $i ++) {
            echo "<div class='purchase-page' id=" . "purchase-" . $i . ">";
            echo "<div class='results-grid'>";
            echo "<div class='col-one'>";
            echo "<img src=" . "img/" . str_replace(":", "", str_replace(" ","-",$dataArray[$i][0])) . ".jpg" . " alt=" . $dataArray[$i][0] . " class='poster-img'>";
            echo "</div>";
            echo "<div class='col-two'>";
            echo "<button class='return-btn' id=" . $i . ">Return</button>";
            echo "<h5>" . $dataArray[$i][0] . "<small>" . $dataArray[$i][1] . "</small></h5>";
            echo "<h6>";
            for($j = 6; $j < count($dataArray[$i]); $j ++) {
                echo $dataArray[$i][$j] . " | ";
            }
            echo "</h6>";
            echo "<hr>";
            echo "<span class='tag-span'>";
            if($dataArray[$i][2] == "1") {
                echo "<p>Dine-In Full Service</p>";
            }
            if($dataArray[$i][3] == "1") {
                echo "<p>Closed Caption</p>";
            }
            if($dataArray[$i][4] == "1") {
                echo "<p>Audio Description</p>";
            }
            if($dataArray[$i][5] == "1") {
                echo "<p>Spanish Spoken with No Subtitles</p>";
            }
            echo "</span>";
            echo "<hr>";
            echo "<h6>$12.99 / ticket</h6>";
            echo "<p class='ticket-input'>";
            echo "<label for='ticketno'>#</label>";
            echo "<input type='number' id='ticketno'>";
            echo "</p>";
            echo "<button class='cart-btn'>Add to Cart</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>

    </div>

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>

</html>