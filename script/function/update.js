class Update {
  static effect(data, id, url) {
    $.ajax({
      type: "method",
      method: "POST",
      url: url,
      data: {
        ...data,
        id,
      },
      dataType: "JSON",
      success: function (response) {
        console.log(response);
        $(".display-form").hide();
        //Hiển thị toast mesage
        Toast.show("toastSuccess", "Sửa Thông tin thành công");
        location.reload();
      },
    });
  }
}
