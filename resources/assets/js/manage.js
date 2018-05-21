const accordions = document.getElementsByClassName('has-submenu');

for (let index = 0; index < accordions.length; index++) {
    const accordion = accordions[index];

    if (accordion.classList.contains('is-active')) {
        const submenu = accordion.nextElementSibling;
        submenu.style.maxHeight = submenu.scrollHeight + "px";
        submenu.style.marginTop = "0.75em";
        submenu.style.marginBottom = "0.75em";
    }

    accordion.onclick = function () {

        this.classList.toggle('is-active');
        const submenu = this.nextElementSibling;
        if (submenu.style.maxHeight) {
            // menu is open, we need to close it
            submenu.style.maxHeight = null;
            submenu.style.marginTop = null;
            submenu.style.marginBottom = null;
        } else {
            // menu is closed, we need to open it
            submenu.style.maxHeight = submenu.scrollHeight + "px";
            submenu.style.marginTop = "0.75em";
            submenu.style.marginBottom = "0.75em";
        }
    }
    
}