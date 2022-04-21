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
        Toast.show("toastSuccess", "Xóa thành công");
        location.reload();
      },
    });
  }
}
