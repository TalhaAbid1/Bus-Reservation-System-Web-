function foo() {

var seats=new Array(20);//Get total seats from database
var price = 500;//This will come from database
var reservedSeats = [11,12,13,14]; //get reserved seats if any
var resvalues = Array.from(reservedSeats);


if(reservedSeats.length > 0){
        for(var loop =0;loop<reservedSeats.length;loop++){
            reservedSeats[loop] = document.createElement('DIV');
            reservedSeats[loop].innerHTML = resvalues[loop];
            
        }
}

// alert(reservedSeats[0].innerHTML);

var i=seats.length;
for(i;i>0;i--)
{
  seats[i]=document.createElement('DIV');
  seats[i].innerHTML = i;
  seats[i].setAttribute("id", i);
  seats[i].setAttribute("class", "numbers inline");
  document.getElementById('bus').prepend(seats[i]);
  
  if(reservedSeats.length>0){
   for(var j =0;j<reservedSeats.length;j++){
    
    if(seats[i].innerHTML === reservedSeats[j].innerHTML){
          seats[i].style.backgroundColor = "red";
          seats[i].style.pointerEvents = "none";   
      }
      }//for 
    
    
  }
 

}


var selecteditems = new Array();
document.getElementById('bus').addEventListener('click',function(e){
   if(e.target !== e.currentTarget){
   
     var clickeditem = e.target.id;
     
     
       
     if(!selecteditems.includes(clickeditem)){
       if(selecteditems.length<6){
         selecteditems.push(clickeditem);
         document.getElementById('sseat').innerText ="Seat No: "+ selecteditems;
       document.getElementById(clickeditem).style.backgroundColor = "blue";
             document.getElementById('error').innerText= "";
       }
       else{
      document.getElementById('error').innerText= "You cannot reserve more than 6 seats";  
       }
         
       }
     
     else if(selecteditems.includes(clickeditem)){
        const index = selecteditems.indexOf(clickeditem);
        if (index > -1) {
            selecteditems.splice(index, 1);
        } 

       document.getElementById('sseat').innerText ="Seat No: " + selecteditems;
       document.getElementById(clickeditem).style.backgroundColor = "green";
       document.getElementById('error').innerText= "";
     }
 
 if(selecteditems.length === 0){   document.getElementById('price').innerText = "";    
 }
else{     document.getElementById('price').innerText = "Total Seats:"+selecteditems.length+"\nTotal Price = "+selecteditems.length*price+"Rs";
    }
 
     if(selecteditems.length <= 0){
       document.getElementById('next').style.visibility = "hidden";
     }
     else if(selecteditems.length > 0){
       document.getElementById('next').style.visibility = "visible";
     }
     
//      for(var i=30;i>0;i--)
// {

//   // if(seats[i].innerText !== clickeditem){
//   //      seats[i].style.backgroundColor = "blue";   
//   // }

// }
               
} 
  e.stopPropagation();
  
});

}

