window.addEventListener("load", ()=> {
    if(document.querySelector(".messageDisplay") != null) {
        if(document.querySelector(".messageDisplay").classList.contains("msgSuccess")) {
            sessionStorage.setItem("type", "login"); 
        }
    }
    if(sessionStorage.getItem("type") != "register") {
        document.querySelector("#login").style.display = 'flex';
        document.querySelector("#register").style.display = 'none';
    }
    else{
        document.querySelector("#login").style.display = 'none';
        document.querySelector("#register").style.display = 'flex';
        document.querySelector("#select-checkbox").checked = true;
    }
})

document.querySelector(".select-form-button").addEventListener('click', ()=> {
    //event.preventDefault();

    if(document.querySelector("#select-checkbox").checked) {
        document.querySelector("#login").style.display = 'none';
        document.querySelector("#register").style.display = 'flex';
        sessionStorage.setItem("type", "register");   
    }
    else {
        document.querySelector("#login").style.display = 'flex';
        document.querySelector("#register").style.display = 'none';
        sessionStorage.setItem("type", "login");
    }
})