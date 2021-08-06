/*Grafico de progresso*/

var ctx = document.getElementsByClassName("doencas-respiratorias");
//Type, Data e options
var chartGraph = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Certas', 'Erradas'],
        datasets: [{
            label: 'Progresso Doenças Respiratórias',
            data: [30,70],
            backgroundColor: [
                'rgba(113, 153, 188, 1)',
                'rgba(151, 180, 206, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }],
    },
    options: {
        title:{
            text: "Progresso Questionário Doenças Respiratórias",
            fontSize: 15,
            fontFamily: "'Montserrat', sans-serif",
            display:true
        }
    }
});

var ctx = document.getElementsByClassName("doencas-infecciosas");

//Type, Data e options
var chartGraph = new Chart(ctx, { 
    type: 'doughnut',
    data: {
        labels: ['Certas', 'Erradas'],
        datasets: [{
            label: 'Progresso Doenças Infecciosas',
            data: [30,70],
            backgroundColor: [
                'rgba(111, 185, 184, 1)',
                'rgba(157, 207, 206, 0.2)',
            ],
            borderColor: [
                'rgba(56, 177, 175, 1)',
                'rgba(56, 177, 175, 1)',
            ],
            borderWidth: 1
        }],
    },
    options: {
        title:{
            text: "Progresso Questionário Doenças Infecciosas",
            fontFamily: "'Montserrat', sans-serif",
            fontSize: 15,
            display:true
        }
    }
});

var ctx = document.getElementsByClassName("doencas-transtornos");

//Type, Data e options
var chartGraph = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Certas', 'Erradas'],
        datasets: [{
            label: 'Progresso Transtornos Mentais',
            data: [30,70],
            backgroundColor: [
                'rgba(214, 150, 185, 1)',
                'rgba(219, 179, 201, 0.2)',
            ],
            borderColor: [
                'rgba(224, 116, 176, 1)',
                'rgba(224, 116, 176, 1)',
            ],
            borderWidth: 1
        }],
    },
    options: {
        title:{
            text: "Progresso Questionário Transtornos mentais",
            fontFamily: "'Montserrat', sans-serif",
            fontSize: 15,
            display:true
        }
    },
   
});

