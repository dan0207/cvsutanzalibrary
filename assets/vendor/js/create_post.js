
// Import Javascript Files ////////////////////////////////////////////////////////
import { updateSession, setupFormValidation, showModal , generateQRCode} from '../../js/main.js';
// Import Javascript Files ////////////////////////////////////////////////////////


// Initialize Modal ////////////////////////////////////////////////////////
const create_post_modal = document.getElementById('create_post_modal');
// Initialize Modal ////////////////////////////////////////////////////////


// Initialize Button ////////////////////////////////////////////////////////
const create_post_btn = document.getElementById("create_post_btn");
const create_post_photo_btn = document.getElementById("create_post_photo_btn");
const create_post_video_btn = document.getElementById("create_post_video_btn");
const create_post_embed_btn = document.getElementById("create_post_embed_btn");
// Initialize Button ////////////////////////////////////////////////////////


function handle_createPostBtn(){
    showModal(create_post_modal.id)
}


create_post_btn.addEventListener("click", handle_createPostBtn);
