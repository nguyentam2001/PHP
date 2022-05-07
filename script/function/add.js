class Add {
  static effect(data, url) {
    $.ajax({
      type: "method",
      method: "POST",
      url: url,
      data: data,
      async: false,
      dataType: "JSON",
      success: function () {
        $(".display-form").hide();
        Toast.show("toastSuccess", "Thêm mới thành công");
        
        setTimeout(() => {
          location.reload();
        }, 500);
      },
    });
  }
}
