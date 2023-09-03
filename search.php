<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Baad shu?</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap");

      /* the body style just to put the container in the center, you don't need it */
      body {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      /* this is margin 0 and  border box is something i do in every project just to remove bad defaults*/
      * {
        box-sizing: border-box;
        margin: 0;
        font-family: "Roboto", sans-serif;
        font-family: "Roboto";
      }
      .container {
        background-color: #585858a8;
        margin-bottom: 1%;
        display: flex;
        border: 1px solid black;
        align-items: center;
        width: 100%;
        padding: 20px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 8px;
        transition: 0.3s;
      }
      .container:hover{
        background-color: white;
        border: 1px solid black;
      }
      
      .container button{
        background-color:transparent;
        width:150%;
        height:50px;
        border-radius:1vh;
        cursor:pointer;
        transition: 0.3s;
      }
      .container button:hover{
        background-color:white;
        width:160%;
        height:50px;
        border-radius:1vh;
        
      }
      p{
        color: black;
      }
      span, h1{
        color: #FFD700;
      }
      .hotel_img {
        margin-right: 30px;
        width: 80px;
        height: 80px;
      }
      .middle {
        flex: 1;
      }
      .hotelName {
        margin-bottom: 10px;
        font-weight: bold;
        font-size: large;
      }
      .right {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-right: 30px;
      }
      #master{
        background-color:  #000000c7;
        border: 1px solid black;
        box-shadow: 0px 0px 10px 1px;
        overflow:scroll;
        width: 50%;
        height: 90%;
        padding:1%;
      }
      #background{
        position: absolute;
        background-image: url("../images/bg.jpg");
          /* Add the blur effect */
  filter: blur(8px);
  /* Full height */
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: red;
        filter: blur(3px);
        z-index: -1;
      }
    </style>
  </head>
  <body>
    <?php
    require "files/functions.php";
    $con = connect('hotelreservation');
    $query = "SELECT * FROM Room";
    $counter = 0;
    $city = $_POST['city'];
    $hotels = $_POST['hotel'];
    $type = $_POST['type'];
    $rating = $_POST['rating'];
    $minPrice = $_POST['maxPrice'];
    $maxPrice = $_POST['minPrice'];
    if($hotels != 'any'){
      if($counter == 0){
          $query = "$query WHERE hotel = '$hotels'";
          $counter++;
      }
      else $query ="$query AND hotel = '$hotels'";
  }
    if($city != 'any'){
        if($counter == 0){
            $query = "$query WHERE city = '$city'";
            $counter++;
        }
        else $query ="$query AND city = '$city'";
    }
    if($type != "any"){
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
    // if($counter == 0) $query = "$query WHERE Room# NOT IN (SELECT RoomId FROM booking)";
    // else $query = "$query AND Room# NOT IN (SELECT RoomId FROM booking)";
    // echo $query;
    $i = 0;
    $result = mysqli_query($con, $query);
    $rs = howManyRows($query, $con);
    echo <<< EOT
    <div id="background"></div>
    <div id="master">
    <h1 style="text-align:center ;">Available Rooms</h1>
    <hr><br>
    EOT;
    while($array = mysqli_fetch_assoc($result)){
        $name = $array['Hotel'];
        $city = $array['City'];
        $id = $array['RoomId'];
        $price = $array['Price'];
        $type = $array['Type'];
        $rating = $array['Rating'];
        echo <<< EOT
        <div class="container">
        <img
          class="hotel_img"
          src="../images/$name.jpg"
          alt="hotel image"
        />
        <div class="middle">
          <span class="hotelName">$name</span>
          <p class="hotelTags">
            Type: $type <br />
            City: $city <br />
            Price: $price EGP
          </p>
        </div>
        <div class="right">
          <span class="rating">Rating: $rating</span>
          <a href="requestBook.php?id=$id" style="margin-right:2vh;"><button>Reserve</button></a>
        </div>
        </div>
        EOT;
    }
    echo <<< EOT
    </div>
    EOT;
    mysqli_close($con);
    // $result = howManyRows($query, $con);
    // if($result == 1) header("location: proj-it/test.php");
    // else header("location: main.php");

?>
</div>
</div>
</html>