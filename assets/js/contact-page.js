if (window.location.pathname == '/contact') {
    const contactContainer = document.querySelector('.contact-container');
    const contactImg = document.querySelector('.contact-background');
    const copyButton = document.querySelector('#js-contact-copy');

    contactContainer.addEventListener('mousemove', (e) => {

        if (e.clientX > (window.innerWidth / 2)) {
            contactImg.classList.add("contact-anim-righ-in")
            contactImg.classList.remove("contact-anim-left-in")
        }
        if (e.clientX < (window.innerWidth / 2)) {

            contactImg.classList.add("contact-anim-left-in")
            contactImg.classList.remove("contact-anim-righ-in")
        }

    })

    copyButton.addEventListener('click', (e) => {
        e.preventDefault();
        navigator.clipboard.writeText("ludow.drawing@gmail.com")
    })
}