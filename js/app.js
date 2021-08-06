//*Quiz*//
/*Começar o Quiz*/

function startQuiz(){
	
	homeBox.classList.add("hide");

	quizBox.classList.remove("hide");

	setAvailableQuestions();
	
	getNewQuestion();
	
	answerIndicator();

}


function toQuestion2(){
	document.getElementById("1").classList.remove("active");
	document.getElementById("2").classList.add("active");
}
function toQuestion3(){
	document.getElementById("2").classList.remove("active");
	document.getElementById("3").classList.add("active");
}
function toQuestion4(){
	document.getElementById("3").classList.remove("active");
	document.getElementById("4").classList.add("active");
}
function toQuestion5(){
	document.getElementById("4").classList.remove("active");
	document.getElementById("5").classList.add("active");
}
function toQuestion6(){
	document.getElementById("5").classList.remove("active");
	document.getElementById("6").classList.add("active");
}
function toQuestion7(){
	document.getElementById("6").classList.remove("active");
	document.getElementById("7").classList.add("active");
}
function toQuestion8(){
	document.getElementById("7").classList.remove("active");
	document.getElementById("8").classList.add("active");
}
function toQuestion9(){
	document.getElementById("8").classList.remove("active");
	document.getElementById("9").classList.add("active");
}
function toQuestion10(){
	document.getElementById("9").classList.remove("active");
	document.getElementById("10").classList.add("active");
}
function toQuestion11(){
	document.getElementById("10").classList.remove("active");
	document.getElementById("11").classList.add("active");
}
function toQuestion12(){
	document.getElementById("11").classList.remove("active");
	document.getElementById("12").classList.add("active");
}
