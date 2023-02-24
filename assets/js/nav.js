
const home = document.querySelector('#js-home');
const about = document.querySelector('#js-about');
const contact = document.querySelector('#js-contact');
const projects = document.querySelector('#js-projects');
const cv = document.querySelector('#js-cv');


let active = window.location.pathname
switch (active) {
    case '/%3F':
        home.classList.add('active');
        break;
    case '/aPropos':
        about.classList.add('active');
        break;
    case '/contact':
        contact.classList.add('active');
        break;
    case '/projets':
        projects.classList.add('active');
        break;
    case '/cv':
        cv.classList.add('active');
        break;
    default:
        break
}
