// Guarda informações do campo caso o usuário desista de altera-lo.
let inputContent = "";
// Função que irá criar um event listener para cada "lápis" de alteração.
document.querySelectorAll(".change-pencil").forEach(element => {
    if(element.name == "pencil-password") {
        element.addEventListener("click", ()=> {
            document.querySelector("#new-pass-group").style.display = "block";
            document.querySelector("#conf-new-pass-group").style.display = "block";
        })
    }
    element.addEventListener("click", (event)=> {
        // Cria uma const para o campo do input.
        const input = event.target.previousElementSibling;
        // Coloca o input como editável
        input.readOnly = false;
        // Dá foco no input
        input.focus();
        // Guarda o conteúdo do input na var global.
        inputContent = input.value;
        // Apaga o campo para alteração.
        input.value = "";
        // Torna visível a div dos botões de confirmar e desistir da alteração.
        event.target.nextElementSibling.style.display = "flex";
        event.target.nextElementSibling.nextElementSibling.style.display = "flex";
        // Torna invisível o "lápis".
        event.target.style.display = "none";
    })
});

document.querySelector(".bio").addEventListener("click", () => {
    const bio = document.querySelector(".bio");
    inputContent = bio.value;
    bio.readOnly = false;
    const buttons = document.querySelector(".bio").nextElementSibling.childNodes;
    buttons[3].style.visibility = "visible";
    buttons[1].style.visibility = "visible";
})

// Função que irá criar um event listener para cada "X" de desistência.
document.querySelectorAll(".deny-change").forEach(element => {
    if(element.name == "x-password") {
        element.addEventListener("click", ()=> {
            document.querySelector("#new-pass-group").style.display = "none";
            document.querySelector("#conf-new-pass-group").style.display = "none";
        })
    }
    if(element.name = "x-bio") {
        element.addEventListener("click", (event) => {
            document.querySelector(".bio").value = inputContent;
            event.target.style.visibility = "hidden";
            event.target.previousElementSibling.style.visibility = "hidden";
        })
    }
    element.addEventListener("click", (event) => {
        // Cria uma const para a SVG do "lápis".
        const pencilSvg = event.target.previousElementSibling.previousElementSibling;
        // Torna visível o "lápis".
        pencilSvg.style.display = "flex";
        // Torna invisivel os botões de confirmar e desistir da alteração.
        event.target.style.display = "none";
        event.target.previousElementSibling.style.display = "none";
        // Retorna o valor original do input.
        pencilSvg.previousElementSibling.value = inputContent;
        // Torna o input não editável novamente.
        pencilSvg.previousElementSibling.readOnly = true;
    })
})

// Função que abre a janela para carregar a imagem.
document.querySelector("#user-photo").addEventListener("click", () => {
    // Coloca a janela como visível e adicionar blur ao resto do conteúdo.
    document.querySelector(".pop-up").style.display = "block";
    document.querySelector("main").style.filter = "blur(2px)"; 
    // Adiciona uma função de fechar a janela e retirar o blur ao clicar no "X".
    document.querySelector(".close-popup").addEventListener("click", () => {
        document.querySelector(".pop-up").style.display = "none";
        document.querySelector("main").style.filter = "none";
    })
})