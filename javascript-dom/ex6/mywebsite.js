window.onload = initPage

function initPage() {
    document.forms.formRegister.onsubmit = validateFields // adiciona o listener de submissao do formulario

    document
        .getElementById("username")
        .onclick = onInputChanged // adiciona o listener de clique no elemento username

    document
        .getElementById("password")
        .onclick = onInputChanged // adiciona o listener de clique no elemento password

    document
        .getElementById("email")
        .onclick = onInputChanged // adiciona o listener de clique no elemento email
}

function validateFields(e) {
    const form = e.target // pego o form a ser validado
    let isValid = true // adiciona um valor inicial para a validacao

    const username = form.username // pego o campo username do form
    const password = form.password // pego o campo password do form
    const email = form.email // pego o campo email do form

    if (!isValidString(username)) {
        username.nextElementSibling.textContent = "Nome de usuário precisa ser preenchido..." // se o username nao for valido mostre a mensagem no spam
        isValid = false
    }

    if (!isValidString(password)) {
        password.nextElementSibling.textContent = "Senha precisa ser preenchido..." // se o password nao for valido mostre a mensagem no spam
        isValid = false
    }

    if (!isValidString(email)) {
        email.nextElementSibling.textContent = "Email precisa ser preenchido..." // se o email nao for valido mostre a mensagem no spam
        isValid = false
    }

    if (!isValid)
        e.preventDefault() // caso nao seja valido, previne de reiniciar o form
}

function onInputChanged(e) {
    e.target.nextElementSibling.textContent = "" // limpa o erro 
}

function isValidString(e) {
    return e.value !== ""
}
