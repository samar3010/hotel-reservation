<html>
  <head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/huzainCSS.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
  </head>
  <body>
    <div id="container"></div>
    <div id="master" style="height:80%;">
          <?php
            $id = $_GET['id'];
            echo "<form action=\"validateBook.php?id=$id\" method=\"post\">";
          ?>
          <div style="width:100%;text-align:center;"><h1>Hotel Reservation Form</h1></div>
          <hr>
          <h3>Name: </h3>
          <label>First Name: </label><input class="form-control input" name="fName" id="fName"><br><label>Last Name: </label><input class="form-control input" name="lName" id="lName" required><br>
          <hr>
          <label>Phone: </label><input class="form-control input" name='Phone' id="phone" required><br><hr>
          <label>Email: </label><input class="form-control input" type="email" name="email" required><br><hr>
          <label>Duration: </label><br>
          <label>From: </label><input type="date" name="fromDate" id="fromDate" required>  <label>To: </label><input type="date" id="toDate" name="toDate" required>
          <br><br>
          <button onclick="return reserveForm(fromDate.value, toDate.value, fName.value, lName.value, phone.value)" type="submit" class="btn">Reserve</button> </a>
      </form>
    </div>
    <script src="../js/script.js"></script>
  </body>
</html>