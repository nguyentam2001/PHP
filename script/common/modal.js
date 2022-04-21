class Modal {
  static show(name, message) {
    var modalLiveExample = document.getElementById(`${name}`);
    var textMessage = document.querySelector(`#${name} .modal-messenger`);
    textMessage.textContent = message;
    var modal = new bootstrap.Modal(modalLiveExample);
    modal.show();
  }
}
