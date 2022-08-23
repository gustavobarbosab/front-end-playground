window.onload = initPage

function initPage() {
    const subtitles = document.getElementsByTagName("h2") // busco todos os elementos h2

    for (let subtitle of subtitles) { // para cada um adicione o listener para o clique unico e clique duplo
        subtitle.onclick = () => { changeVisibility(subtitle, "none") } // caso acionado suma os irmaos
        subtitle.ondblclick = () => { changeVisibility(subtitle, "block") } // caso acionado mostre os irmaos
    }
}

function changeVisibility(firstElement, newDisplay) {
    let hiddenElement = firstElement.nextElementSibling // busca o irmao do elemento atual
    while (hiddenElement !== null) { // enquanto existirem irmaos
        hiddenElement.style.display = newDisplay // altera a visibilidade conforme o atributo
        hiddenElement = hiddenElement.nextElementSibling // busca o irmao do elemento atual
    }
} 