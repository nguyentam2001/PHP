$(document).ready(function () {
  new Customer();
});

class Customer {
  UrlAdd = "http://localhost/ntstore/function/customer/add-customer.php";
  UrlDel = "http://localhost/ntstore/function/customer/del-customer.php";
  UrlGetById =
    "http://localhost/ntstore/function/customer/get-customer-by-id.php";

  UrlNewCTMCode =
    "http://localhost/ntstore/function/customer/new-customer-code.php";
  UrlUpdate = "http://localhost/ntstore/function/customer/update-customer.php";
  FormMode = "";
  constructor() {
    //load data
    this.initEvent();
  }
  initEvent() {
    $("#addCustomer").click(this.showFormAdd.bind(this));
    $("#customerForm #btnCancel").click(this.hideFormAdd.bind(this));
    $("#customerForm #btnConfirm").click(this.handleFormCustomer.bind(this));
    $("#CustomerTable .btn-delete").click(this.showModalDel.bind(this));
    $("#btnDelCustomer").click(this.delCustomer.bind(this));
    //sửa thông tin nhân viên
    $("#CustomerTable .btn-update").click(this.showFormUpdate.bind(this));
    
  }
  showFormUpdate(sender) {
    console.log("Hello");
    let me = this;
    me.FormMode = Enum.FormMode.Update;
    let trCurr = $(sender.target);
    let currID = trCurr.attr("value");
    this.CustomerID = currID;
    let id = me.CustomerID;
    $.ajax({
      type: "method",
      method: "POST",
      url: me.UrlGetById,
      data: { id },
      dataType: "JSON",
      success: function (data) {
        if (Array.isArray(data) && data.length > 0) {
          let customer = data[0];
          //bind dữ liệu vào form sửa
          for (const key in customer) {
            if (Object.hasOwnProperty.call(customer, key)) {
              if ($(`[name="${key}"]`).attr("type") === "date") {
                $(`[name="${key}"]`).val(
                  CommonJS.formatDateYYYYMMDD(customer[key])
                );
              } else if ($(`[name="${key}"]`).attr("type") === "radio") {
                $(
                  'input[name="' + key + '"][value="' + customer[key] + '"]'
                ).prop("checked", true);
              } else {
                $(`[name="${key}"]`).val(customer[key]);
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
    this.CustomerID = currID;
    let customerName = trCurr.attr("name");
    this.modalDel(
      "modalDelCustomer",
      `Bạn có muốn xóa khách hàng ${customerName} ?`
    );
  }
  delCustomer() {
    let me = this;
    let id = me.CustomerID;
    $.ajax({
      type: "method",
      method: "POST",
      url: me.UrlDel,
      data: { id },
      dataType: "JSON",
      success: function () {
        me.showToastMessage("toastSuccess", "Xóa khách hang thành công");
        location.reload();
      },
    });
  }
  showFormAdd() {
    this.FormMode = Enum.FormMode.Add;
    //lấy mã nhân viên mới
    this.getNewCustomerCode();
    //Hiển thị form nhập liệu
    $(".display-form").show();
  }

  getNewCustomerCode() {
    let me = this;
    $.ajax({
      type: "method",
      method: "POST",
      url: me.UrlNewCTMCode,
      dataType: "JSON",
      success: function (data) {
        //gán Customer code vào  input
        $('[name="CustomerCode"]').val(data);
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
  resetFormCustomer() {
    $('[name="CustomerCode"]').val("");
    $('[name="CustomerName"]').val("");
    $('input[name="Gender"]').prop("checked", false);
    $('[name="PhoneNumber"]').val("");
    $('[name="DateOfBirth"]').val("");
    $('[name="Email"]').val("");
    $('[name="Address"]').val("");
  }
  hideFormAdd() {
    $(".display-form").hide();
    //reset form
    this.resetFormCustomer();
  }

  handleFormCustomer() {
    let me = this;
    let CustomerCode = $('[name="CustomerCode"]').val();
    let CustomerName = $('[name="CustomerName"]').val();
    let Gender = $('[name="Gender"]:checked').val();
    let PhoneNumber = $('[name="PhoneNumber"]').val();
    let DateOfBirth = $('[name="DateOfBirth"]').val();
    let Email = $('[name="Email"]').val();
    let Address = $('[name="Address"]').val();
    if (me.FormMode === Enum.FormMode.Add) {
      $.ajax({
        type: "method",
        method: "POST",
        url: me.UrlAdd,
        data: {
          CustomerCode,
          CustomerName,
          Gender,
          PhoneNumber,
          DateOfBirth,
          Address,
          Email,
        },
        dataType: "JSON",
        success: function (response) {
          console.log(response);
          $(".display-form").hide();
          //Hiển thị toast mesage
          me.showToastMessage("toastSuccess", "Thêm mới thành công");
          location.reload();
        },
      });
    } else if (me.FormMode == Enum.FormMode.Update) {
      //update khách hàng by id khách hàng
      let CustomerID = me.CustomerID;
      $.ajax({
        type: "method",
        method: "POST",
        url: me.UrlUpdate,
        data: {
          CustomerID,
          CustomerCode,
          CustomerName,
          Gender,
          PhoneNumber,
          DateOfBirth,
          Address,
          Email,
        },
        dataType: "JSON",
        success: function (response) {
          console.log(response);
          $(".display-form").hide();
          //Hiển thị toast mesage
          me.showToastMessage("toastSuccess", "Sửa Thông tin thành công");
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
