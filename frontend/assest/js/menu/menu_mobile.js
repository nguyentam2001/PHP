function myFunction() {
  const close = document.querySelector(".header-mobile-icons-close");
  const show = document.querySelector(".header__menu-mobile__icons");
  const modalShow = document.querySelector(".modal");
  if (close.classList.contains("header__menu-mobile-hide")) {
    show.classList.add("header__menu-mobile-hide");
    close.classList.remove("header__menu-mobile-hide");
    modalShow.classList.remove("modal-hide");
  } else {
    close.classList.add("header__menu-mobile-hide");
    show.classList.remove("header__menu-mobile-hide");
    modalShow.classList.add("modal-hide");
  }
}

const modalShow = document.querySelector(".modal");
modalShow.addEventListener("click", function () {
  const close = document.querySelector(".header-mobile-icons-close");
  const show = document.querySelector(".header__menu-mobile__icons");
  modalShow.classList.add("modal-hide");
  if (show.classList.contains("header__menu-mobile-hide")) {
    show.classList.remove("header__menu-mobile-hide");
    close.classList.add("header__menu-mobile-hide");
  }
});

const stopBubble = document.querySelector(".menu-mobile-form");
stopBubble.addEventListener("click", function (event) {
  event.stopPropagation();
});
