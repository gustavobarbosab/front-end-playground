window.onload = initPage

function initPage() {
    document
        .getElementById("btn_alert")
        .onclick = (e) => {
            changeAlertVisibility("block") // ao clicar no elemento de id btn_alert tornar o alerta visivel
        }

    document
        .getElementById("alert_confirm")
        .onclick = (e) => {
            changeAlertVisibility("none") // ao clicar no elemento de id alert_confirm tornar o alerta invisivel
        }
}

function changeAlertVisibility(newVisibility) {
    document.getElementById("alert_container").style.display = newVisibility // altera a visibilidade do container de alerta
}
