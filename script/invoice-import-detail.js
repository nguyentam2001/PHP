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
    $("#productSelect").change(this.renderPrice);
  }
  renderValueCb() {
    let ManufactureID = $("#manufactureSelect").val();
    $.ajax({
      type: "method",
      method: "POST",
      async: false,
      url: "/ntstore/function/invoice/get-value-manufature.php",
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
    let CategoryID = $("#categorySelect").val();
    $.ajax({
      type: "method",
      method: "POST",
      async: false,
      url: "/ntstore/function/invoice/get-product-by-category.php",
      data: {
        CategoryID,
      },
      success: function (data) {
        $("#productSelect").html(data);
      },
    });
  }
  renderPrice() {
    let ProductID = $("#productSelect").val();
    $.ajax({
      type: "method",
      method: "POST",
      async: false,
      url: "/ntstore/function/invoice/get-price-by-propduct.php",
      data: {
        ProductID,
      },
      success: function (data) {
        $("#PriceImport").val(data);
      },
    });
  }
}
