<?php
    require "files/functions.php";
    $con = connect('hotelreservation');
    $query = "SELECT * FROM Room";
    $counter = 0;
    $city = $_POST['city'];
    $type = $_POST['type'];
    $rating = $_POST['rating'];
    $minPrice = $_POST['maxPrice'];
    $maxPrice = $_POST['minPrice'];
    if($city != 'ALL'){
        if($counter == 0){
            $query = "$query WHERE city = '$city'";
            $counter++;
        }
        else $query ="$query AND city = '$city'";
    }
    if($type != "ANY"){
        if($counter == 0){
            $query = "$query WHERE type = '$type'";
            $counter++;
        }
        else $query = "$query AND type = '$type'";
    }
    if(!isEmpty($rating)){
        if($counter == 0){
            $query = "$query WHERE rating = $rating";
            $counter++;
        }
        else $query = "$query AND rating = $rating";
    }
    if(!isEmpty($minPrice)){
        if($counter == 0){
            $query = "$query WHERE price <= $minPrice";
            $counter++;
        }
        else $query = "$query AND price <= $minPrice";
    }
    if(!isEmpty($maxPrice)){
        if($counter == 0){
            $query = "$query WHERE price >= $maxPrice";
            $counter++;
        }
        else $query = "$query AND price >= $maxPrice";
    }
    // echo $query;
    $i = 0;
    $result = mysqli_query($con, $query);
    echo "<table border='3'>";
    while($array = mysqli_fetch_assoc($result)){
        echo "<tr>";
        $city = $array['City'];
        echo "<td>$city</td>";
        echo "<tr>";
    }
    echo "</table>";
    // $result = howManyRows($query, $con);
    // if($result == 1) header("location: proj-it/test.php");
    // else header("location: main.php");
?>