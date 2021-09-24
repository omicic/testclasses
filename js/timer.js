var btnStartTest = document.querySelector('#btnStartTest');
var formcheckinputs = document.querySelectorAll('.posibleAnsware .form-check-input');
var timer = document.querySelector("#timer");

btnStartTest.addEventListener('click', meri);

var time = timer.value.split(":");

let hour = time[0];//00
let sekunde = time[2];//45
let minute = time[1];//00
if(sekunde =="00"){
    sekunde = 0;
}

if(minute =="00"){
    minute = 0;
}

if(hour =="00"){
    hour = 0;
}

var stop = false;

function meri() 
{    
    if (minute === 0 && sekunde === 0 && hour === 0) {
        stop = true;
    }   

    if (minute === 0 && hour != 0) {
        hour--;
        minute = 60;
        sekunde = 0;
    }  
    
    if (sekunde === 0) {
        minute--;
        sekunde = 60;
    }   
     
    if (!stop) {
        setTimeout(meri, 1000);
        sekunde--;        
        
        if (sekunde < 10) {
            if (minute < 10) {
                prikazi("0" + minute, "0" + sekunde);
            } else {
                prikazi(minute, "0" + sekunde);
            }
        } else {
            if (minute < 10) {
                prikazi("0" + minute, sekunde)
            } else {
                prikazi(minute, sekunde)
            }
        }
    } else{
        formcheckinputs.forEach(element => {
            element.setAttribute('disabled', 'disabled');
            document.getElementById("timer").style.color = "red";
        });
        
        
    }   
    
    function prikazi(min, sek) {
       document.getElementById("timer").innerHTML = hour + ":" + min + ":" + sek;
       document.getElementById("timer").value = hour + ":" + min + ":" + sek;
       btnStartTest.className = 'btn btn-primary d-none';
    }
}



   


