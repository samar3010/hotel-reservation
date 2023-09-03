<!DOCTYPE html>
<html lang="en">

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

  <div id=container></div>
<div id="master" style="height:70%;">
  <form action="search.php" method="post">
      <div style="width:100%;text-align:center;">
      <h1>Room Search Form</h1>
      </div>
      <hr>
      <h3>Hotel </h3>
      <select name="hotel" class="form-control input">
        <option value="any">Any</option>
        <option value="novotel">Novotel</option>
        <option value="Ramses">Ramses</option>
        <option value="Movenpick">Movenpick</option>
        <option value="Albatros">Albatros</option>
        <option value="Steigenberger">Steigenberger</option>
        <option value="GrandNile">GrandNile</option>
        <option value="Hilton">Hilton</option>
        <option value="Pyramisa">Pyramisa</option>
        <option value="Le Meridien">Le Meridien</option>
        <option value="Safir">Safir</option>
        <option value="Fairmont">Fairmont</option>
      </select><br>
      <h3>City </h3>
      <select name="city" class="form-control input">
        <option value="any">Any</option>
        <option value="alexandria">Alexandria</option>
        <option value="giza">Giza</option>
        <option value="Shubra El Kheima">Shubra El Kheima</option>
        <option value="Port Said">Port Said</option>
        <option value="suez">Suez</option>
        <option value="El Mahalla El Kubra">El Mahalla El Kubra</option>
        <option value="Luxor">Luxor</option>
        <option value="Mansoura">Mansoura</option>
        <option value="Tanta">Tanta</option>
        <option value="Asyut">Asyut</option>
        <option value="Ismailia">Ismailia</option>
        <option value="Faiyum">Faiyum</option>
        <option value="Zagazig">Zagazig</option>
        <option value="Demietta">Demietta</option>
        <option value="Aswan">Aswan</option>
        <option value="Damanghur">Damanghur</option>
      </select><br>
      <h3>Rating:</h3>
      <div class="rating">
        <input type="radio" name="rating" id="rating-5" value="5">
        <label for="rating-5"></label>
        <input type="radio" name="rating" id="rating-4" value="4">
        <label for="rating-4"></label>
        <input type="radio" name="rating" id="rating-3" value="3" checked>
        <label for="rating-3"></label>
        <input type="radio" name="rating" id="rating-2" value="2">
        <label for="rating-2"></label>
        <input type="radio" name="rating" id="rating-1" value="1  ">
        <label for="rating-1"></label>
        </div>
      <hr>
      <h3>Price:</h3>
      <label>From: </label><input type="number" name="minPrice" id="minPrice"> <label>To: </label><input type="number" name="maxPrice" id="maxPrice">
      <hr>
      <h3>Room Preference</h3>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="single">
        <label class="form-check-label" for="inlineRadio1">Single</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="double">
        <label class="form-check-label" for="inlineRadio2">Double</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="any" checked>
        <label class="form-check-label" for="inlineRadio3">Any</label>
      </div>
      <div style="width:100%;text-align:center;">
      <button style="float:center;" onclick="return searchForm(maxPrice.value, minPrice.value)" type="submit" class="btn">Reserve</button>
      </div>
      </form>
    </div>
  <script src="../js/script.js"></script>
</body>

</html>