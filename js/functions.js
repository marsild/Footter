
function updateLikes(val, username_attivo, username_post) {
    const icon = document.getElementById("like-heart" + val);
    const numeroLike = document.getElementById("numero-like" + val);
    if (icon.className == "bi bi-heart fs-4") {
        icon.className = "bi bi-heart-fill text-danger fs-4";
        numeroLike.innerText = parseInt(numeroLike.innerText) + 1;
        $.ajax({url: "processa-like.php", type: 'GET', data: { id_like: val, user_like: username_attivo, user_post: username_post}});    
    } else {
        icon.className = "bi bi-heart fs-4";
        numeroLike.innerText = parseInt(numeroLike.innerText) - 1;
        $.ajax({url: "processa-like.php", type: 'GET', data: { id_dislike: val, user_dislike: username_attivo}});
    }
}

$(function () {
    $('[data-bs-toggle="popover"]').popover()
})

function switchPasswordVisibility(val) {
    var x = document.getElementById(val);
    const icon = document.getElementById("eye-icon");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    if (icon.className == "bi bi-eye-slash-fill") {
        icon.className = "bi bi-eye";  
    } else {
        icon.className = "bi bi-eye-slash-fill";
    }
  }

//minigioco
const audio_kick = new Audio("./upload/kick.mp3");
const audio_goal = new Audio("./upload/goal.mp3");
const spongebob = new Audio("./upload/spongebob.mp3");
const buttons = document.querySelectorAll("#button_modal");
const goal_a = document.querySelectorAll("#porta_calcio");
var modal = document.getElementById("modal_porta");
buttons.forEach(button => {
  button.addEventListener("click", () => {
    audio_kick.play();
    spongebob.pause();
    spongebob.currentTime = 0;
    modal.style.display = "block";
    //chiusura automatica
    myTimeout=setTimeout(function(){
      modal.style.display = "none";
      spongebob.play();
      button.disabled = false;
    }, 5000);
    button.disabled = true;
  });
});
goal_a.forEach(porta => {
  porta.addEventListener("click", () => {
    audio_goal.play();
    modal.style.display = "none";
    buttons.forEach(button => {
      button.disabled = false;
    });
    clearTimeout(myTimeout);
  });
});