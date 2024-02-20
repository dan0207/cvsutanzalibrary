// admin sidebar
const sidebar = document.getElementById('sidebar');
const toggle = document.getElementById('toggle');
const pageAccess = document.getElementById('pageAccess');
document.onclick = function(e) {
    if(e.target.id !== 'pageAccess' && e.target.id !== 'sidebar' && e.target.id !== 'toggle') {
        sidebar.classList.remove('active');
        toggle.classList.remove('active');
    }
}

toggle.onclick = function() {
    sidebar.classList.toggle('active');
    toggle.classList.toggle('active');
}
// admin sidebar

// admin sidebar show drowpdown on current page
document.addEventListener('DOMContentLoaded', function () {
    // Get the current page's URL
    var currentPage = window.location.href;

    // Check if the URL contains a specific string for each section
    if (currentPage.includes('dashboard')) {
        document.getElementById('dashboard').classList.add('show');
    } else if (currentPage.includes('circulation')) {
        document.getElementById('circulation').classList.add('show');
    } else if (currentPage.includes('userAccounts')) {
        document.getElementById('userAccounts').classList.add('show');
    } else if (currentPage.includes('libraryPages')) {
        document.getElementById('library-pages').classList.add('show');
    }

});
// admin sidebar show drowpdown on current page