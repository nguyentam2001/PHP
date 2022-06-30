class Toast {
  //hiển thị toast messenger
  static show(name, message) {
    var toastLiveExample = document.getElementById(`${name}`);
    var textMessage = document.querySelector(`#${name} .toast-message`);
    textMessage.textContent = message;
    var toast = new bootstrap.Toast(toastLiveExample);
    toast.show();
    setTimeout(() => {
      $("#toastSuccess").toast("toggle");
    }, 500);
  }
}
