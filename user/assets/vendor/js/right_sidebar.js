const myCollapsible = document.querySelectorAll("#right_sidebar .accordion-collapse");

myCollapsible.forEach(function (element) {
    const buttonElement = element.closest('.accordion-item').querySelector('.accordion-button');

    element.addEventListener('show.bs.collapse', () => buttonElement.querySelector('img').src = '../assets/img/drop-shape-open.png');
    element.addEventListener('hide.bs.collapse', () => {
        setTimeout(() => {
            buttonElement.querySelector('img').src = '../assets/img/drop-shape-close.png';
        }, 150);
    });
});


window.addEventListener('scroll', function () {
    var Sidebar = document.querySelector('.sticky-top');

    var sidebarBottom = Sidebar.getBoundingClientRect().bottom;

    if (sidebarBottom >= footerTop) {
        Sidebar.classList.remove('vh-100');
    } else {
        Sidebar.classList.add('sticky-top');
    }
});
