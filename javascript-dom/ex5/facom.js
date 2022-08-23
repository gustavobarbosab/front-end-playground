window.onload = function () {
    buttons = document.querySelectorAll("nav button"); // busca todos os botoes filhos de um nav
    for (let button of buttons) { 
        button.addEventListener("click", changeTab); // para cada botao adicionar o listener de clique
    }

    openTab(0); // selecione a posicao 0
}

function changeTab(event) {
    const liDoBotao = event.target.parentNode; // busco o pai do botao, ou seja, o li correspondente
    const nodes = Array.from(liDoBotao.parentNode.children); // pego todos os li's irmaos do li selecionado
    const index = nodes.indexOf(liDoBotao); // encontro a posicao do li selecionado
    openTab(index); // abro a aba selecionada
}

function openTab(i) {
    const tabActive = document.querySelector(".tabActive"); // seleciona a class chamada tabActive

    if (tabActive !== null)
        tabActive.className = ""; // se nao for nula coloca o valor da class como vazia

    const buttonActive = document.querySelector(".buttonActive"); // seleciona a class buttonactive
    if (buttonActive !== null)
        buttonActive.className = ""; // se nao for nula coloca o valor da class como vazia

    document.querySelectorAll(".tabs section")[i].className = "tabActive" // busca a section i filha da classe tabs e coloca o className como tabActive
    document.querySelectorAll("nav button")[i].className = "buttonActive" // busca o button i filho da classe nav e coloca o className como buttonActive
}
