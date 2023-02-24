if (window.location.pathname == '/cv') {
    const cvTitile = document.querySelector('.cv-title')
    const cvProh4 = document.querySelectorAll('.cv-pro-h4')
    const assistant = document.querySelector('.assistant')
    const assistantUl = document.querySelector('.ul-assistant')
    const graphiste = document.querySelector('.graphiste')
    const graphisteUl = document.querySelector('.ul-graphiste')
    const animateur = document.querySelector('.animateur')
    const animateurUl = document.querySelector('.ul-animateur')

    cvTitile.addEventListener("click", () => {

        for (let i = 0; i < cvProh4.length; i++) {

            cvProh4[i].classList.toggle('active-cv')
            cvProh4[i].classList.toggle('inactive-cv')
            cvProh4[i].classList.add('cv-pro-h4-anim')

        }
        if (assistantUl.classList.contains('active-cv')) {
            assistantUl.classList.remove('active-cv')
            assistantUl.classList.add('inactive-cv')
        }
        if (graphisteUl.classList.contains('active-cv')) {
            graphisteUl.classList.remove('active-cv')
            graphisteUl.classList.add('inactive-cv')
        }
        if (animateurUl.classList.contains('active-cv')) {
            animateurUl.classList.remove('active-cv')
            animateurUl.classList.add('inactive-cv')
        }

    })


    assistant.addEventListener("click", () => {

        assistantUl.classList.toggle('active-cv')
        assistantUl.classList.toggle('inactive-cv')
    })
    graphiste.addEventListener("click", () => {
        graphisteUl.classList.toggle('active-cv')
        graphisteUl.classList.toggle('inactive-cv')
    })
    animateur.addEventListener("click", () => {
        animateurUl.classList.toggle('active-cv')
        animateurUl.classList.toggle('inactive-cv')
    })



}