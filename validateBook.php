<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Receipt</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap");

      /* the body style just to put the container in the center, you don't need it */
      body {
        height: 100vh;
        background-color: wheat;
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
        /* display: flex; */
        align-items: center;
        width: 100%;
        padding: 20px;
        border-radius: 20vh;
      }
      #master{
        padding: 1%;
        background-color: white;
        width: 40%;
        height: 90%;
        position:relative;
        border-radius: 5vh;
        box-shadow: rgb(0, 0, 0) 0px 0px 20px;
      }
      #upperPart{
        height: 50%;
      }
      #lowerPart{
        margin-top:5%;
        height: 36%;
      }
      .parts{
        border: 1px solid black;
        margin: 1%;
        padding:2%;
      }
      .middle{
        margin-left:auto;
      }
      .center{
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      }
      .vertical{
        margin: 0;
        position: relative;
        left: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
      }
      .info{
        border-bottom: 1px solid black;
        width: 100%;
        height:6%;
        /* display:flex; */
        align-items: right;
      }
      .rightElement{
        float:right;
      }
      .leftElement{
        position: absolute;
        float:right;
      }
      h2{
        margin: 2% 0% 1% 0%;
      }
      button{
        width: 50%;
        height: 50%;
      }
      button{
        left: 50%;
        height:10%;
        bottom:10%;
        position: absolute;
        border: 1px solid black;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        border-radius: 4vh;
        font-size: larger;
        background-color: transparent;
        transition: 0.3s;
        cursor:pointer;
      }
      button:hover{
        border: 1px solid red;
        color: red;
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
        height:100%;
        width:100%;
        background-color: red;
        filter: blur(3px);
        z-index: -1;
      }
    </style>
  </head>
  <body>

    <?php
        require "files/functions.php";

        // Initialize values
        $fName = "NULL";
        $lName = "NULL";
        $phone = "NULL";
        $email = "NULL";
        $name = "NULL";
        $type = "NULL";
        $city = "NULL";
        $price = "NULL";
        $days = "NULL";
        $total = "NULL";
        $rNum = "NULL";

        // Start connection
        $con = connect('hotelreservation');

        // Check if method is search
        if(!empty($_GET['search'])){
            $id = $_POST['id'];
            $query = "SELECT * FROM Booking WHERE ReservationId = $id";
            if(howManyRows($query, $con) == 0) die ("No reservations with the given ID");
            else {
                // Grab reservation record
                $reservation = mysqli_fetch_assoc(mysqli_query($con, $query));

                // Grab room record;
                $roomId = $reservation['RoomId'];
                $query = "SELECT * FROM room WHERE roomId = $roomId";
                $room = mysqli_fetch_assoc(mysqli_query($con, $query));

                // Assign reservation values
                $rNum = $id;
                $fName = $reservation['FirstName'];
                $lName = $reservation['LastName'];
                $phone = $reservation['Phone'];
                $email = $reservation['Email'];
                $start_date = $reservation['Reservation_date_start'];
                $due_date = $reservation['Reservation_date_due'];

                // Assign room values
                $city = $room['City'];
                $type = $room['Type'];
                $price = $room['Price'];
                $name = $room['Hotel'];

                //Calculate total
                $days = dateDifference($start_date, $due_date);
                $total = $days * $price;
            }
        } else {
            // Room ID
            $id = $_GET['id'];

            // Get room from room table using ID
            $query = "SELECT * FROM room WHERE roomId = $id";
            $result = mysqli_query($con, $query);
            $values = mysqli_fetch_assoc($result);
            $name = $values['Hotel'];
            $city = $values['City'];
            $id = $values['RoomId'];
            $price = $values['Price'];
            $type = $values['Type'];
            $rating = $values['Rating'];

            // Random reservationId
            $rNum = rand(10000, 59999);

            // Store vales
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            $phone = $_POST['Phone'];
            $email = $_POST['email'];

            //Calculate Total
            $start_date = $_POST['fromDate'];
            $due_date = $_POST['toDate'];
            $days = dateDifference($start_date, $due_date);
            $total = $days * $price;


            // Prepare & Run query
            $query = "INSERT INTO Booking (RoomId, ReservationId, FirstName, LastName, Phone, Email, Reservation_date_start, Reservation_date_due, total) values($id, $rNum, '$fName', '$lName', '$phone', '$email', '$start_date', '$due_date', $total)";
            $result = mysqli_query($con, $query);
            mysqli_close($con);
        }
        // Output
        echo <<< EOT
        <div id="background"></div>
        <div id="master">
        <h1 class="middle" style="margin-left:27%;">Receipt For Room: $rNum</h1>
  
        <div class="parts" id="upperPart">
          <h1 class="middle" style="margin-left:30%;">Reservation Details</h1>
          <hr>
          <h2>User Information</h2>
          <div class="info">
            <div class="leftElement">First Name:</div>
            <div class="rightElement">$fName</div>
          </div>
          <div class="info">
            <div class="leftElement">Last Name:</div>
            <div class="rightElement">$lName</div>
          </div>
          <div class="info">
            <div class="leftElement">Email:</div>
            <div class="rightElement">$email</div>
          </div>
          <div class="info">
            <div class="leftElement">Phone:</div>
            <div class="rightElement">$phone</div>
          </div>
          
          <h2>Hotel Information</h2>
          <div class="info">
            <div class="leftElement">Name:</div>
            <div class="rightElement">$name</div>
          </div>
          <div class="info">
            <div class="leftElement">Type:</div>
            <div class="rightElement">$type</div>
          </div>
          <div class="info">
            <div class="leftElement">City:</div>
            <div class="rightElement">$city</div>
          </div>
          <div class="info">
            <div class="leftElement">Price Per Day:</div>
            <div class="rightElement">$price EGP</div>
          </div>
          <div class="info">
            <div class="leftElement">Duration:</div>
            <div class="rightElement">$days Day(s)</div>
          </div>
          <h2>TOTAL: $total EGP</h2>
        </div>
  
        <div class="parts" id="lowerPart">
          <h1>Thanks for choosing Hotelio! :)</h1>
          <a href="../index.html"><button>Print & Return home</button></a>
        </div>
        EOT;
    ?>
    </div>
    </div>
  </body>
</html>