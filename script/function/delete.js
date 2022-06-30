class Delete {
  static effect(id, url) {
    let me = this;
    $.ajax({
      type: "method",
      method: "POST",
      url: url,
      async: false,
      data: { id },
      dataType: "JSON",
      success: function (data) {
        if (data.data == "Success") {
          $("#modalDel").modal("toggle");
          Toast.show("toastSuccess", "Xóa thành công");
          setTimeout(() => {
            location.reload();
          }, 500);
        } else {
          me.modalDel(
            "modalDel",
            `Khách hàng này đã phát sinh giao dịch, không thể xóa khách hàng ! `,
            true
          );
        }
      },
    });
  }

  static modalDel(name, message, isBtnConfirm) {
    if (isBtnConfirm) {
      $("#btnDel").hide();
      $(".modal-backdrop").hide();
    } else {
      $("#modalDel").show();
    }
    let me = this;
    this.modalLiveExample = document.getElementById(`${name}`);
    var textMessage = document.querySelector(`#${name} .modal-messenger`);
    textMessage.textContent = message;
    this.modal = new bootstrap.Modal(me.modalLiveExample);
    this.modal.show();
  }
}
