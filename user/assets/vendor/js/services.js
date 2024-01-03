var animationServiceElements = document.querySelectorAll('.animation-services');

animationServiceElements.forEach(function (element) {
    var expandButton = element.querySelector('.animation-service-btn');
    var closeButton = element.querySelector('.animation-service-closebtn');
    expandButton.addEventListener('click', function (btn) {
        element.classList.toggle('col-md-6');
        element.classList.toggle('col-md-12');
        closeButton.classList.remove('d-none');
        closeButton.classList.add('d-block');
        expandButton.classList.remove('d-block');
        expandButton.classList.add('d-none');
        hide_otherElements();
    });

    closeButton.addEventListener('click', function () {
        element.classList.toggle('col-md-6');
        element.classList.toggle('col-md-12');
        closeButton.classList.remove('d-block');
        closeButton.classList.add('d-none');
        expandButton.classList.remove('d-none');
        expandButton.classList.add('d-block');
        hide_otherElements();
    });

    function hide_otherElements(){
        animationServiceElements.forEach(function (otherElement) {
            if (otherElement !== element) {
                otherElement.style.display = element.classList.contains('col-md-12') ? 'none' : 'block';
            }
        });
    }
});
