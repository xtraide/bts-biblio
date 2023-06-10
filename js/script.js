/*let togg1 = document.getElementById("togg1");
let togg2 = document.getElementById("togg2");
let d1 = document.getElementById("d1");
let d2 = document.getElementById("d2");
togg1.addEventListener("click", () => {
  if(getComputedStyle(d1).display != "none"){
    d1.style.display = "none";
  } else {
    d1.style.display = "block";
  }
})

function togg(){
  if(getComputedStyle(d2).display != "none"){
    d2.style.display = "none";
  } else {
    d2.style.display = "block";
  }
};
togg2.onclick = togg;*/
var checkBox = document.getElementById("theme");
window.onload = () => {
    // On va chercher la balise link
    let themeLink = document.getElementById("theme-link")

    // Y a-t-il un thème stocké dans le localStorage
    if(localStorage.theme != null){
        themeLink.href = `/p1/css/${localStorage.theme}.css`
    }else{
        themeLink.href = "/p1/css/clair.css"
        localStorage.theme = "clair"
    }

    // Ecouteur d'évènement "click" sur la span
      document.getElementById("theme").addEventListener("change", function(){
        if (localStorage.theme == "clair") {
            localStorage.theme = "sombre"
            this.innerText = "Thème clair"
        } else {
            localStorage.theme = "clair"
            this.innerText = "Thème sombre"
        }
        themeLink.href = `/p1/css/${localStorage.theme}.css`
    })
}
 function myFunction() {
        if (checkBox.checked == true){
            localStorage.theme = "sombre"
            
        } else {
            localStorage.theme = "clair"
            
        }
        themeLink.href = `/p1/css/${localStorage.theme}.css`
    }
function hideCookieBox(){
  let cookieBox = document.getElementById('js-cookie-box').style.display = "none";
}

