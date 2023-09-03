function searchForm(maxPrice, minPrice){
    if(maxPrice == "" || minPrice == "") return true;
    if(parseInt(maxPrice) <= parseInt(minPrice)){
      alert("Max value must be more than min value");
      return false;
    }
    else return true;
  }

  function reserveForm(startDate, dueDate, FirstName, LastName, phone){
    startDate = Date.parse(startDate);
    dueDate = Date.parse(dueDate);
    if(/\d/.test(FirstName) || /\d/.test(LastName)) {
        alert("Name cannot contain numbers.");
        return false;
    }
    
    if(/[a-zA-Z]/.test(phone)){
        alert("Phone number cannot contain letters.");
        return false;
    }

    if(startDate > dueDate){
        alert("Start date should come before due date.");
        return false;
    }
    return true;
  }

function closePopUp(){
  document.getElementById("popUp").style.visibility = "hidden";
}
function openPopUp(){
  document.getElementById("popUp").style.visibility = "visible";
}