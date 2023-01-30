
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

function switchPasswordVisibility() {
    var x = document.getElementById("reg_password");
    const icon = document.getElementById("eye-icon");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    if (icon.className == "bi bi-eye-slash") {
        icon.className = "bi bi-eye";  
    } else {
        icon.className = "bi bi-eye-slash";
    }
  }
