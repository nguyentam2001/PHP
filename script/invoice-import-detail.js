$(document).ready(function () {
  new InvoiceImport();
});

class InvoiceImport {
  constructor() {
    this.initEvent();
  }
  initEvent() {
    $("#manufactureSelect").change(this.renderValueCb);
    $("#categorySelect").change(this.renderCategory);
  }
  renderValueCb() {
    let ManufactureID = $("#manufactureSelect").val();
    $.ajax({
      type: "method",
      method: "POST",
      async: false,
      url: "http://localhost/ntstore/function/invoice/get-value-manufature.php",
      data: {
        ManufactureID,
      },
      dataType: "JSON",
      success: function (data) {
        $("#invoiceImport .address").text(data[0].Address);
        $("#invoiceImport .phone").text(data[0].PhoneNumber);
      },
    });
  }
  renderCategory() {
    console.log("Hello");
    let CategoryID = $("#categorySelect").val();
    $.ajax({
      type: "method",
      method: "POST",
      async: false,
      url: "http://localhost/ntstore/function/invoice/get-product-by-category.php",
      data: {
        CategoryID,
      },
      success: function (data) {
        $("#productSelect").html(data);
      },
    });
  }
}
