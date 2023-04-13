console.log("select");
let i=0

function Escapedesc(){
    const event = document.querySelectorAll(".escape-individual").forEach(el => {
        el.classList.remove("selec");
    });
    if (i>0){
        document.querySelector(".mask[data-id=\""+esc+"\"]").classList.remove("show");
    }
    var select = this.dataset.id;
    console.log(select);
    this.classList.add("selec");
    document.querySelector(".mask[data-id=\""+select+"\"]").classList.add("show");
    i++;
    esc= select;
    console.log(i);

}

const event = document.querySelectorAll(".escape-individual").forEach(el => {
    el.addEventListener("click", Escapedesc);
});

var map = L.map('map').setView([48.037310786182196, 7.642389084893441], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
var marker = L.marker([48.037310786182196, 7.642389084893441]).addTo(map);