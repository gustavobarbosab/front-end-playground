window.onload = setupPage

function setupPage() {
    const campoInteresse = document.getElementById("interest_input") // busca o elemento de id interst_input
    campoInteresse.onkeyup = e => { // ao pressionar o teclado
        if (e.key === "Enter") { // se a tecla for enter
            adicionaInteresse() // adiciona o interesse
        }
    }
}

function adicionaInteresse() {
    const campoInteresse = document.getElementById("interest_input") // busca o elemento de id interest_input
    const listaInteresses = document.getElementsByTagName("ol")[0] // busca o primeiro elemento ol da pagina

    const novoLi = document.createElement("li") // cria um elemento li
    const novoSpan = document.createElement("span") // cria um elemento span
    novoBotao = document.createElement("button") // cria um elemento botao

    novoSpan.textContent = campoInteresse.value // adiciona o texto do elemento span baseado no que foi digitado no campo de interesse
    novoBotao.textContent = "✖" // adiciona o texto do botao

    novoLi.appendChild(novoSpan) // adiciona um filho ao li
    novoLi.appendChild(novoBotao) // adiciona um filho ao li
    listaInteresses.appendChild(novoLi) // adiciona um filho a lista de interesses

    novoBotao.onclick = function() {
        listaInteresses.removeChild(novoLi) // caso clique no botao, remova o li criado da lista
    }

    campoInteresse.value = "" // limpa o campo de interesse
}