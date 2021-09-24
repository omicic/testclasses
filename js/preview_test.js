var btnStartTest = document.querySelector('#btnStartTest');
var btnSend = document.querySelector('#btnSend');
var testView = document.querySelector('.test');

btnStartTest.addEventListener('click', startTest);

function startTest(){
    testView.className = "test row mt-5 d-block";
}
