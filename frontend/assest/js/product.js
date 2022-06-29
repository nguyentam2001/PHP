$(document).ready(function () {
  new ProductFE();
});

class ProductFE {
  constructor() {
    this.initEvent();
  }

  initEvent() {
    $(".item-body__oder-plus").click(this.plusQuality);
    $(".item-body__oder-minus").click(this.minusQuality);
  }
  plusQuality() {
    //lấy tổng số lượng sp còn lại trong kho
    let total = +$(".item-body__oder-plus").attr("value");
    //lấy giá trị hiển thị hiện tại + thêm 1
    let currNum = +$(".item-body__oder-current").val();
    if (currNum < total) {
      currNum++;
      console.log(`currNum`, currNum);
      $(".item-body__oder-current").val(currNum);
    }
  }

  minusQuality() {
    //lấy giá trị hiển thị hiện tại + thêm 1
    let currNum = +$(".item-body__oder-current").val();
    if (currNum > 1) {
      currNum--;
      $(".item-body__oder-current").val(currNum);
    }
  }
}
