$(document).ready(function () {
  new Product();
});

class Product {
  UrlAdd = "/ntstore/function/product/add-product.php";
  UrlNewProductID = "/ntstore/function/product/new-product-id.php";
  UrlUpdate = "/ntstore/function/product/update-product.php";
  UrlDel = "/ntstore/function/product/del-product.php";
  UrlGetById = "/ntstore/function/product/get-product-id.php";
  UrlUploadImg = "/ntstore/function/product/upload-file.php";
  ImgeSrc = ""; //link đường dẫn ảnh
  FormMode = "";
  constructor() {
    this.initEvent();
  }
  initEvent() {
    $("#addProduct").click(this.showFormAdd.bind(this));
    $("#productForm #btnCancel").click(this.hideFormAdd.bind(this));
    $("#productForm #btnConfirm").click(this.handleFormProduct.bind(this));
    $("#ProductTable .btn-delete").click(this.showModalDel.bind(this));
    $("#btnDelProduct").click(this.delProduct.bind(this));
    $("#ProductTable .btn-update").click(this.showFormUpdate.bind(this));
    //Chọn ảnh đại diện
    $("#imgInp").change(this.renderImg.bind(this));
  }

  renderImg() {
    let me = this;
    let file_data = $("#imgInp").prop("files")[0];
    let form_data = new FormData();
    form_data.append("file", file_data);
    $.ajax({
      url: me.UrlUploadImg, // <-- point to server-side PHP script
      dataType: "text", // <-- what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: "post",
      success: function (imgeSrc) {
        $("#imageView").css(
          "background-image",
          "url(../assets/img/items/" + imgeSrc + ")"
        );
        me.ImgeSrc = imgeSrc;
      },
    });
  }

  showFormAdd() {
    this.FormMode = Enum.FormMode.Add;
    this.getNewProductID();
    $(".display-form").show();
  }

  getNewProductID() {
    let ca = this;
    // $.ajax({
    //   type: "method",
    //   method: "POST",
    //   URL: ca.UrlNewProductID,
    //   dataType: "JSON",
    //   data: "data",
    //   success: function (response) {
    //     $('[name="ProductID"]').val(response);
    //   },
    // });

    $.ajax({
      type: "method",
      method: "POST",
      url: ca.UrlNewProductID,
      data: "data",
      dataType: "JSON",
      success: function (response) {
        $('[name="ProductID"]').val(response);
      },
    });
  }
  resetFormProduct() {
    $('[name="ProductID"]').val("");
    $('[name="ProductName"]').val("");
    $('[name="ExportPrice"]').val("");
    $('[name="ImportPrice"]').val("");
    $('[name="CategoryID"]').val("");
    $('[name="Description"]').val("");
    $('[name="Quality"]').val("");
    $('[name="Image"]').val("");
  }
  hideFormAdd() {
    $(".display-form").hide();
    this.resetFormProduct();
  }

  handleFormProduct() {
    let ca = this;
    let ProductID = $('[name="ProductID"]').val();
    let ProductName = $('[name="ProductName"]').val();
    let ExportPrice = $('[name="ExportPrice"]').val();
    let ImportPrice = $('[name="ImportPrice"]').val();
    let CategoryID = $('[name="CategoryID"]').val();
    let Description = $('[name="Description"]').val();
    let Quality = $('[name="Quality"]').val();
    let Image = ca.ImgeSrc;
    if (ca.FormMode === Enum.FormMode.Add) {
      $.ajax({
        type: "method",
        method: "POST",
        url: ca.UrlAdd,
        data: {
          ProductID,
          ProductName,
          ExportPrice,
          ImportPrice,
          CategoryID,
          Description,
          Quality,
          Image,
        },

        dataType: "JSON",
        success: function (response) {
          console.log(response);
          $(".display-form").hide();
          Toast.show("toastSuccess", "Thêm mới thành công");
          location.reload();
        },
      });
    } else if (ca.FormMode == Enum.FormMode.Update) {
      let ProductID = ca.ProductID;
      $.ajax({
        type: "method",
        method: "POST",
        url: ca.UrlUpdate,
        data: {
          ProductID,
          ProductName,
          ExportPrice,
          ImportPrice,
          CategoryID,
          Description,
          Quality,
          Image,
        },
        dataType: "JSON",
        success: function (response) {
          console.log(response);
          $(".display-form").hide();

          // show thong bao

          Toast.show("toastSuccess", "Sửa thông tin thành công");
          location.reload();
        },
      });
    }
  }
  showFormUpdate(sender) {
    let ca = this;
    ca.FormMode = Enum.FormMode.Update;
    let trCurr = $(sender.target);
    let currID = trCurr.attr("value");
    this.ProductID = currID;
    let id = ca.ProductID;

    $.ajax({
      type: "method",
      method: "POST",
      url: ca.UrlGetById,
      data: { id },
      dataType: "JSON",
      success: function (data) {
        if (Array.isArray(data) && data.length > 0) {
          let product = data[0];
          for (const key in product) {
            if (Object.hasOwnProperty.call(product, key)) {
              if (product[key]) {
                if ($(`[name="${key}"]`).attr("type") === "file") {
                  // console.log(product[key]);
                  $("#imageView").css(
                    "background-image",
                    "url(../assets/img/items/" + product[key] + ")"
                  );
                  ca.ImgeSrc = product[key];
                } else {
                  //nếu không phải dạng file
                  $(`[name="${key}"]`).val(product[key]);
                }
                $(".display-form").show();
              }
            }
          }
        } else {
          console.log("Dữ liệu trả về không hợp lệ");
        }
      },
    });
  }

  showModalDel(sender) {
    let trCurr = $(sender.target);
    let currID = trCurr.attr("value");
    this.ProductID = currID;
    let productName = trCurr.attr("name");
    this.modalDel(
      "modalDelProduct",
      `Bạn có muốn xóa sản phẩm ${productName}?`
    );
  }

  delProduct() {
    let me = this;
    let id = me.ProductID;
    $.ajax({
      type: "method",
      method: "POST",
      url: me.UrlDel,
      data: { id },
      dataType: "JSON",
      success: function () {
        Toast.show("toastSuccess", "Xóa sản phẩm thành công");
        location.reload();
      },
    });
  }

  showToastMessage(name, message) {
    var toastLiveExample = document.getElementById(`${name}`);
    var textMessage = document.querySelector(`#${name} .toast-message`);
    textMessage.textContent = message;
    var toast = new bootstrap.Toast(toastLiveExample);
    toast.show();
  }

  modalDel(name, message) {
    var modalLiveExample = document.getElementById(`${name}`);
    var textMessage = document.querySelector(`#${name} .modal-messenger`);
    textMessage.textContent = message;
    var modal = new bootstrap.Modal(modalLiveExample);
    modal.show();
  }
}
