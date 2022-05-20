$(document).ready(function () {
  new Category();
});

class Category {
  UrlAdd = "/ntstore/function/category/add-category.php";
  UrlDel = "/ntstore/function/category/del-category.php";
  UrlGetById = "/ntstore/function/category/get-category.php";
  UrlNewCTCode = "/ntstore/function/category/new-category-id.php";
  UrlUpdate = "/ntstore/function/category/update-category.php";
  FormMode = "";

  constructor() {
    this.iniEvent();
  }

  iniEvent() {
    $("#addCategory").click(this.showFormAdd.bind(this));
    $("#categoryForm #btnCancel").click(this.hideFormAdd.bind(this));
    $("#categoryForm #btnConfirm").click(this.handleFormCategory.bind(this));
    $("#CategoryTable .btn-delete").click(this.showModalDel.bind(this));
    $("#btnDelCategory").click(this.delCategory.bind(this));

    $("#CategoryTable .btn-update").click(this.showFormUpdate.bind(this));
  }

  showFormAdd() {
    this.FormMode = Enum.FormMode.Add;
    this.getNewCategoryID();
    $(".display-form").show();
  }

  getNewCategoryID() {
    let ca = this;
    $.ajax({
      type: "method",
      method: "POST",
      url: ca.UrlNewCTCode,
      dataType: "JSON",
      success: function (data) {
        $('[name="CategoryID"]').val(data);
      },
    });
  }

  showFormUpdate(sender) {
    let ca = this;
    ca.FormMode = Enum.FormMode.Update;
    let trCurr = $(sender.target);
    let currID = trCurr.attr("value");
    this.CategoryID = currID;
    let id = ca.CategoryID;
    $.ajax({
      type: "method",
      method: "POST",
      url: ca.UrlGetById,
      data: { id },
      dataType: "JSON",
      success: function (data) {
        if (Array.isArray(data) && data.length > 0) {
          let category = data[0];
          //bind dữ liệu vào form sửa
          for (const key in category) {
            if (Object.hasOwnProperty.call(category, key)) {
              //hiển thị form nhập thông tin
              $(".display-form").show();
            }
          }
        } else {
          console.log("Dữ liệu trả về không hợp lệ");
        }
      },
    });
  }
  modalDel(name, message) {
    var modalLiveExample = document.getElementById(`${name}`);
    var textMessage = document.querySelector(`#${name} .modal-messenger`);
    textMessage.textContent = message;
    var modal = new bootstrap.Modal(modalLiveExample);
    modal.show();
  }
  showModalDel(sender) {
    let trCurr = $(sender.target);
    let currID = trCurr.attr("value");
    this.CategoryID = currID;
    let categoryName = trCurr.attr("name");
    this.modalDel(
      "modalDelCategory",
      `Bạn có muốn xóa danh mục ${categoryName} ?`
    );
  }
  delCategory() {
    let me = this;
    let id = me.CategoryID;
    $.ajax({
      type: "method",
      method: "POST",
      url: me.UrlDel,
      data: { id },
      dataType: "JSON",
      success: function () {
        Toast.show("toastSuccess", "Xóa danh mục thành công");
        location.reload();
      },
    });
  }
  resetFormCategory() {
    $('[name="CategoryID"]').val("");
    $('[name="CategoryName"]').val("");
  }

  hideFormAdd() {
    $(".display-form").hide();
    //reset form
    this.resetFormCategory();
  }

  handleFormCategory() {
    let ca = this;
    let CategoryID = $('[name="CategoryID"]').val();
    let CategoryName = $('[name="CategoryName"]').val();
    if (ca.FormMode === Enum.FormMode.Add) {
      $.ajax({
        type: "method",
        method: "POST",
        url: ca.UrlAdd,
        data: {
          CategoryID,
          CategoryName,
        },

        dataType: "JSON",
        success: function (response) {
          console.log(response);
          $(".display-form").hide();

          // show thong bao

          Toast.show("toastSuccess", "Thêm mới thành công");
          location.reload();
        },
      });
    } else if (ca.FormMode == Enum.FormMode.Update) {
      let CategoryID = ca.CategoryID;
      $.ajax({
        type: "method",
        method: "POST",
        url: ca.UrlUpdate,
        data: {
          CategoryID,
          CategoryName,
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
  showToastMessage(name, message) {
    var toastLiveExample = document.getElementById(`${name}`);
    var textMessage = document.querySelector(`#${name} .toast-message`);
    textMessage.textContent = message;
    var toast = new bootstrap.Toast(toastLiveExample);
    toast.show();
  }
}
