$(document).ready(function () {
  new Manufacture();
});
class Manufacture {
  ManufactureID = null;
  FormMode = null;
  UrlAdd = "/ntstore/function/manufacture/add-manufacture.php";
  UrlDel = "/ntstore/function/manufacture/del-manufacture.php";
  UrlGetById = "/ntstore/function/manufacture/get-manufacture-by-id.php";
  UrlUpdate = "/ntstore/function/manufacture/update-manufacture.php";
  UrlNewCode = "/ntstore/function/manufacture/new-manufacture-code.php";
  constructor() {
    this.initEvent();
  }

  initEvent() {
    $("#addManufacture").click(this.showFormAdd.bind(this));
    $("#manufactureForm #btnCancel").click(this.hideFormAdd.bind(this));
    $("#manufactureForm #btnConfirm").click(
      this.handleFormManufacture.bind(this)
    );
    $("#ManufactureTable .btn-delete").click(this.showModalDel.bind(this));
    $("#btnDel").click(this.delManufacture.bind(this));
    $("#ManufactureTable .btn-update").click(this.showFormUpdate.bind(this));
  }

  showFormUpdate(sender) {
    let me = this;
    me.FormMode = Enum.FormMode.Update;
    let trCurr = $(sender.target);
    let id = trCurr.attr("value");
    this.ManufactureID = id;
    console.log("Hello");
    $.ajax({
      type: "method",
      method: "POST",
      url: me.UrlGetById,
      data: { id },
      dataType: "JSON",
      success: function (data) {
        console.log(data);
        if (Array.isArray(data) && data.length > 0) {
          let manufacture = data[0];
          //bind dữ liệu vào form sửa
          for (const key in manufacture) {
            if (Object.hasOwnProperty.call(manufacture, key)) {
              if ($(`[name="${key}"]`).attr("type") === "date") {
                $(`[name="${key}"]`).val(
                  CommonJS.formatDateYYYYMMDD(manufacture[key])
                );
              } else if ($(`[name="${key}"]`).attr("type") === "radio") {
                $(
                  'input[name="' + key + '"][value="' + manufacture[key] + '"]'
                ).prop("checked", true);
              } else {
                $(`[name="${key}"]`).val(manufacture[key]);
              }
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

  showModalDel(sender) {
    let trCurr = $(sender.target);
    let currID = trCurr.attr("value");
    this.ManufactureID = currID;
    let manufactureName = trCurr.attr("name");
    Modal.show("modalDel", `Bạn có muốn xóa nhà cung cấp ${manufactureName} ?`);
  }
  delManufacture() {
    Delete.effect(this.ManufactureID, this.UrlDel);
  }
  handleFormManufacture() {
    let data = {};
    let inputs = $("#manufactureForm").find("input");
    for (const input of inputs) {
      let key = $(input).attr("name");
      let value = $(input).val();
      data[key] = value;
    }
    if (this.FormMode == Enum.FormMode.Add) {
      Add.effect(data, this.UrlAdd);
    } else if (this.FormMode == Enum.FormMode.Update) {
      Update.effect(data, this.ManufactureID, this.UrlUpdate);
    }
  }
  hideFormAdd() {
    $(".display-form").hide();
  }
  showFormAdd() {
    this.FormMode = Enum.FormMode.Add;
    Code.getNew(this.UrlNewCode, "ManufactureCode");
    //Hiển thị form nhập liệu
    $(".display-form").show();
  }
}
