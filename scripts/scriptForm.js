/* Quando envio o formulario e aperto o botao da pagina pra voltar o quadrado selecionado anteriormente
 permanece pintado porem sem estar realmente selecionado, 
 logo se recarregar a pagina ele volta ao normal e evita confusao se está selecionado ou nao */
var perfEntries = performance.getEntriesByType("navigation");
if (perfEntries[0].type === "back_forward") {
    location.reload();
}

for (let x of document.querySelectorAll(".closetab")) {
    x.addEventListener("click", () => {
        location.replace("home.php");
    });
}

// Vai marcar verificado se a resposta do form for clicada
const checkboxRecomendados = document.querySelectorAll(".containerCheckbox");
for (var i = 0; checkboxRecomendados.length > i; i++) {
    let justOnce = true;

    checkboxRecomendados[i].addEventListener("click", function() {
        if (justOnce) {
            justOnce = false;
        } else {
            justOnce = true;
            return;
        }

        this.ariaChecked = this.ariaChecked == "true" ? "false" : "true";
    });
}

// Verifica se foi dada pelo menos uma resposta pra pergunta, salva as respostas para análise posterior
function validateForm() {
    const qs = document.getElementsByClassName("questions");
    let answeredqs = [];
    for (let q of qs) {
        let qAnswered = false;
        for (let label of q.getElementsByTagName("label")) {

            if (label.ariaChecked == "true") {
                answeredqs.push(label.getAttribute("value"));
                qAnswered = true;
            }
        }
        if (!qAnswered) {
            alert("Por favor, selecione alguma resposta!");
            return false;
        }
    }
}
