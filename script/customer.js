$(document).ready(function () {
  new Customer();
});

class Customer {
  UrlAdd = "http://localhost/ntstore/function/customer/add-customer.php";
  UrlDel = "http://localhost/ntstore/function/customer/del-customer.php";
  UrlGetById =
    "http://localhost/ntstore/function/customer/get-customer-by-id.php";
  CustomerID = "";
  FormMode = "";
  constructor() {
    //load data
    this.initEvent();
  }
  initEvent() {
    $("#addCustomer").click(this.showFormAdd.bind(this));
    $("#customerForm #btnCancel").click(this.hideFormAdd);
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
              $(`[name="${key}"]`).val("2001-04-11");
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
  }
  modalDel(name, message) {
    var modalLiveExample = document.getElementById(`${name}`);
    var textMessage = document.querySelector(`#${name} .modal-messenger`);
    textMessage.textContent = message;
    var modal = new bootstrap.Modal(modalLiveExample);
    modal.show();
  }
  hideFormAdd() {
    $(".display-form").hide();
  }
  handleFormCustomer() {
    let me = this;

    if (me.FormMode === Enum.FormMode.Add) {
      var CustomerCode = $('[name="CustomerCode"]').val();
      var CustomerName = $('[name="CustomerName"]').val();
      var Gender = $('[name="Gender"]').val();
      var PhoneNumber = $('[name="PhoneNumber"]').val();
      var DateOfBirth = $('[name="DateOfBirth"]').val();
      var Email = $('[name="Email"]').val();
      var Address = $('[name="Address"]').val();
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
      console.log("Đây là update");
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
