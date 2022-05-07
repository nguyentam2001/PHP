class Delete {
  static effect(id, url) {
    $.ajax({
      type: "method",
      method: "POST",
      url: url,
      async: false,
      data: { id },
      dataType: "JSON",
      success: function () {
        $("#modalDel").modal("toggle");
        Toast.show("toastSuccess", "Xóa thành công");
        setTimeout(() => {
          location.reload();
        }, 500);
      },
    });
  }
}
