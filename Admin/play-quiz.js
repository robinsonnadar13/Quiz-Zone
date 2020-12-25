//  getElementById("name");
//       function capturar() {
//         function persona(name) {
//           this.name = name;
//         }
//         let namecapturar = document.getElementById("name").value;
//         console.log(namecapturar);
//       }

// innerHTML innerText
// let screenTwo= document.querySelector(".screen-two").style.display ='none';
let screenPresentOne = document.querySelector(".questions-present-one").style.display ='none';
let screenPresentTwo = document.querySelector(".questions-present-two").style.display ='none';
let screenPresentThree = document.querySelector(".questions-present-three").style.display ='none';
let screenResults = document.querySelector(".screen-results").style.display ='none';
let screenEnd = document.querySelector(".screen-end").style.display ='none';


     function timeout(){
     var minute = Math.floor(timeLeft/60);
     var second = timeLeft%60;
     if (timeLeft <= 0){
       clearTimeout(tm);
       window.location.href = "play-quiz2.php";
     }
     else{
       document.getElementById("time").innerHTML= minute + ":" + second; 
     }
     timeLeft--;
     var tm = setTimeout(function(){timeout()},1000);
     }

  let name;
  let score = 0; 
  
  function capturar(){
    name =  document.getElementById("name").value;
    console.log(name);
    if(name = "" ){
      document.getElementById("error-name").innerHTML = "¡Ups! Ingresa tu nombre"
    }else{
      document.querySelector(".screen-two").style.display ='block';
      document.getElementById("name-user").innerHTML = name +" Select Category";
      document.querySelector(".screen-one").style.display ='none';
    }
  }
  
  function viewPresent(){
    document.querySelector(".screen-two").style.display ='none';
    document.querySelector(".questions-present-one").style.display ='block';
  }
  function validationQuestionOne(){
    document.querySelector(".questions-present-one").style.display ='none';
    document.querySelector(".questions-present-two").style.display ='block';
    let firstQuestion = document.querySelector('input[name="question-one"]:checked').value;
    if(firstQuestion == 'A'){
      score = score + 1;
      console.log('Es correcto ' + score);
    }else{
      console.log('Error');
    }
  }
  function validationQuestionTwo(){
    document.querySelector(".questions-present-two").style.display ='none';
    document.querySelector(".questions-present-three").style.display ='block';
    let secondQuestion = document.querySelector('input[name="question-two"]:checked').value;
  
    if(secondQuestion == 'B'){
      score = score + 1;
      console.log('Es correcto ' + score);
      
    }else{
      console.log('Error');

    }
  }
    function viewResult(){
    document.querySelector(".questions-present-three").style.display ='none';
    document.querySelector(".screen-results").style.display ='block';
    let thirdQuestion = document.querySelector('input[name="question-three"]:checked').value;

     if(thirdQuestion == 'C'){
      score = score + 1;
      document.getElementById('score').innerHTML = score;
      console.log('Respuestas correctas ' + score);
    }else{
      document.getElementById('score').innerHTML = score;
      console.log('Respuestas correctas ' + score);

      document.querySelector('input[name="question-one"]:checked').checked = false;
      document.querySelector('input[name="question-two"]:checked').checked = false;
      document.querySelector('input[name="question-three"]:checked').checked = false;

    /*
    if(firstQuestion=="B" && secondQuestion=="B" && thirdQuestion=="B")
    {
    document.getElementById("score").innerHTML = "excelente tu puntaje es 3/3";
    }else if (firstQuestion=="B" || secondQuestion=="B" || thirdQuestion=="B"){
      document.getElementById("score").innerHTML = "solo 1/1";
    }else{
       document.getElementById("score").innerHTML = "Sigue intentando";
    }*/
      }
    }
    
    function viewend(){
    document.querySelector(".screen-results").style.display ='none';
    document.querySelector(".screen-end").style.display ='block';
  }
  
    function returnHome(){
    document.querySelector(".screen-results").style.display ='none';
    document.querySelector(".screen-two").style.display ='block';
      //Respuestas vuelven a cero
  }
/*
  function evaluarPresentQuiz(){
    let respuestasCorrectas = ["A","A","A"];
    let respuestasUusario = new Array();
    let respuestasPreguntas = new Array();
    let aciertos = 0;
    let countPreguntas = 0;
    let i;
    let j;
    for(let i=0; i<3; i++){
      respuestaPregunta = document.getElementsByName('q'+(i+1));
      for(let j=0; j<=3; j++){
        if(respuestasPreguntas[j].checked==true){
          countPreguntas++;
          respuestasUusario[i]=respuestasPreguntas[j].value;
          if(respuestasPreguntas[j].value==respuestasCorrectas[i]){
            console.log("Es correcto");
            aciertos++;
          } else {
            conosle.log("incorrecto");
          }
        }
      }
    }
    for(let i=0; i<3;i++){
      console.log("respuesta"+respuestaUsuario[i])
    }*/



  