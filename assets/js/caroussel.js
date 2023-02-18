const jsCarousselImg = document.querySelectorAll("#js-caroussel-img");
const next = document.querySelector(".home-interest-next");
const prev = document.querySelector(".home-interest-prev");

jsCarousselImg[0].style = "display:block";


let num = 0;
next.addEventListener("click", () => {

    if (num === jsCarousselImg.length - 1) {
        num = 0
        for (let i = 0; i < jsCarousselImg.length; i++) {
            jsCarousselImg[i].style = "display:none";
        }
        jsCarousselImg[0].style = "display:block";
    } else {
        jsCarousselImg[num].style = "display:none;";
        jsCarousselImg[num + 1].style = "display:block;";
        num++
    }

})
prev.addEventListener("click", () => {

    if (num === 0) {
        num = jsCarousselImg.length - 1
        for (let i = 0; i < jsCarousselImg.length; i++) {
            jsCarousselImg[i].style = "display:none";
        }
        jsCarousselImg[jsCarousselImg.length - 1].style = "display:block";
    } else {
        console.log("dans le else")
        jsCarousselImg[num].style = "display:none";
        jsCarousselImg[num - 1].style = "display:block";
        num--
    }

})