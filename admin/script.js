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


// admin > library pages | about | editing mission and vision
const mission = document.getElementById('mission');
const editTextMission = document.getElementById('editTextMission');
const btnEditMission = document.getElementById('btnEditMission');
const btnSaveMission = document.getElementById('btnSaveMission');

const vision = document.getElementById('vision');
const editTextVision = document.getElementById('editTextVision');
const btnEditVision= document.getElementById('btnEditVision');
const btnSaveVision= document.getElementById('btnSaveVision');

function editMission() {
    editTextMission.style.display = 'block';
    mission.style.display = 'none';
    btnEditMission.disabled = true;
    btnSaveMission.style.display = 'block';
}
function saveMission() {
    editTextMission.style.display = 'none';
    mission.style.display = 'block';
    btnEditMission.disabled = false;
    btnSaveMission.style.display = 'none';
}

function editVision() {
    editTextVision.style.display = 'block';
    vision.style.display = 'none';
    btnEditVision.disabled = true;
    btnSaveVision.style.display = 'block';
}
function saveVision(){
    editTextVision.style.display = 'none';
    vision.style.display = 'block';
    btnEditVision.disabled = false;
    btnSaveVision.style.display = 'none';
}
