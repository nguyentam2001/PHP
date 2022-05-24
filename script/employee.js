$(document).ready(function () {
  new Employee();
});

class Employee {
  EmployeeID = null;
  FormMode = null;
  UrlAdd = "/ntstore/function/employee/add-employee.php";
  UrlDel = "/ntstore/function/employee/del-employee.php";
  UrlGetById = "/ntstore/function/employee/get-employee-by-id.php";
  UrlUpdate = "/ntstore/function/employee/update-employee.php";
  UrlNewCode = "/ntstore/function/employee/new-employee-code.php";
  constructor() {
    this.initEvent();
  }
  initEvent() {
    $("#addEmployee").click(this.showFormAdd.bind(this));
    $("#employeeForm #btnCancel").click(this.hideFormAdd.bind(this));
    $("#employeeForm #btnConfirm").click(this.handleFormEmployee.bind(this));
    $("#EmployeeTable .btn-delete").click(this.showModalDel.bind(this));
    $("#btnDel").click(this.delEmployee.bind(this));
    $("#EmployeeTable .btn-update").click(this.showFormUpdate.bind(this));
  }
  showFormUpdate(sender) {
    let me = this;
    me.FormMode = Enum.FormMode.Update;
    let trCurr = $(sender.target);
    let id = trCurr.attr("value");
    this.EmployeeID = id;
    $.ajax({
      type: "method",
      method: "POST",
      url: me.UrlGetById,
      data: { id },
      dataType: "JSON",
      success: function (data) {
        if (Array.isArray(data) && data.length > 0) {
          let employee = data[0];
          //bind dữ liệu vào form sửa
          for (const key in employee) {
            if (Object.hasOwnProperty.call(employee, key)) {
              if ($(`[name="${key}"]`).attr("type") === "date") {
                $(`[name="${key}"]`).val(
                  CommonJS.formatDateYYYYMMDD(employee[key])
                );
              } else if ($(`[name="${key}"]`).attr("type") === "radio") {
                $(
                  'input[name="' + key + '"][value="' + employee[key] + '"]'
                ).prop("checked", true);
              } else {
                $(`[name="${key}"]`).val(employee[key]);
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
    this.EmployeeID = currID;
    let employeeName = trCurr.attr("name");
    Modal.show("modalDel", `Bạn có muốn xóa nhà nhân viên ${employeeName} ?`);
  }
  delEmployee() {
    Delete.effect(this.EmployeeID, this.UrlDel);
  }
  handleFormEmployee() {
    let inputs = $("#employeeForm").find("input");
    for (const input of inputs) {
      let key = $(input).attr("name");
      let value = $(input).val();
      data[key] = value;
    }
    if (this.FormMode == Enum.FormMode.Add) {
      Add.effect(data, this.UrlAdd);
    } else if (this.FormMode == Enum.FormMode.Update) {
      Update.effect(data, this.EmployeeID, this.UrlUpdate);
    }
  }
  hideFormAdd() {
    $(".display-form").hide();
  }
  showFormAdd() {
    this.FormMode = Enum.FormMode.Add;
    Code.getNew(this.UrlNewCode, "EmployeeCode");
    //Hiển thị form nhập liệu
    $(".display-form").show();
  }
}
