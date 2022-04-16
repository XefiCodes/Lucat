var myIndex = 0;

carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlidesN");
  var y = document.getElementsByClassName("mySlidesB");
  var z = document.getElementsByClassName("mySlidesL");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  

  for (i = 0; i < y.length; i++) {
    y[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > y.length) {myIndex = 1}    
  y[myIndex-1].style.display = "block";  

  for (i = 0; i < z.length; i++) {
    z[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > z.length) {myIndex = 1}    
  z[myIndex-1].style.display = "block"; 
  setTimeout(carousel, 2000); // Change image every 2 seconds 
}