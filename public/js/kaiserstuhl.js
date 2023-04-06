console.log("test");

const event = document.querySelectorAll(".escape-individual").forEach(ev);
event.addEventListener("click", Escapedesc);

function Escapedesc(){
    console.log(event);
}