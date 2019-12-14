var error_box = document.getElementById('error_box'),
    question = document.getElementById('question'),
    answer = document.getElementById('answer');
var url = "http://www.json-generator.com/api/json/get/cfVHSzKiBe?indent=2";

function load_questions(){
    var petition = new XMLHttpRequest();
    petition.open('GET',url);
    petition.onload = function(){
        var data = JSON.parse(petition.responseText);
        if(data.error){
            error_box.classList.add('active');
        }else{
            for(var i= 0; i < 1; i++){
                question.innerHTML += ("<p>" +data[i].pregunta + "</p>");
                answer.innerHTML += ("<p>" +data[i].respuesta + "</p>");
            }
        }
    }
    petition.send();
}
window.onload = function() {
    // load_questions();
};