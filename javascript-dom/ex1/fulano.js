window.onload = initPage

function initPage() {
    setupH1()
    setupH2()
}

function setupH1() {
    const titles = document.getElementsByTagName("h1") // Busco todos os elementos h1 da pagina
    for (let title of titles) {
        if (title.textContent === "Fulano da Silva") { // para cada elemento h1 se o conteudo for igual Fulano da Silva adiciona o listener no mesmo.
            title.onclick = changeValue
            break
        }
    }
}

function changeValue(e) {
    e.target.textContent = "Dono do currículo" // Altera o conteudo para a string correspondente
}

function setupH2() {
    const titles = document.getElementsByTagName("h2") // Busco todos os h2 da pagina
    for (let title of titles) { // para cada h2 adiciona o listener ao clicar
        title.onclick = changeTextToThankYou
    }
}

function changeTextToThankYou(e) {
    e.target.textContent = "Obrigado" // altere o conteudo para a mensagem descrita
}