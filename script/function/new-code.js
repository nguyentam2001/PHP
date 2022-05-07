class Code {
  static getNew(url, name) {
    let me = this;
    $.ajax({
      type: "method",
      method: "POST",
      url: url,
      dataType: "JSON",
      success: function (data) {
        //gán Customer code vào  input
        $(`[name="${name}"]`).val(data);
      },
    });
  }
}
