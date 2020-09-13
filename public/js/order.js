
var counter = 1;
var limit = 5;
function addInput(divName){
     if (counter == limit)  {
          alert("Je hebt het limiet van " + counter + " items bereikt");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<label> Item </label>" + (counter + 1) + "<br><input class='form-control' name='bestelling[]'</textarea><br>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}

