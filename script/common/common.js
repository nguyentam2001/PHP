class CommonJS {
  constructor() {}
  /**
   * Hàm tĩnh format date
   * Author:Nguyễn Văn Tâm (28/11/2021)
   * @param {Date} date
   *
   */
  static formatDateYYYYMMDD(date) {
    if (date) {
      const newDate = new Date(date);
      let dateCur = newDate.getDate();
      let monthCur = newDate.getMonth() + 1;
      let yearCur = newDate.getFullYear();
      dateCur = dateCur < 10 ? `0${dateCur}` : dateCur;
      monthCur = monthCur < 10 ? `0${monthCur}` : monthCur;
      return `${yearCur}-${monthCur}-${dateCur}`;
    } else return "1999-01-01";
  }

  /**
   * Hàm format tiền tệ VND
   * Author: NVTAM (28/11/2021)
   */
  static formatCurrencyVND(currency) {
    if (currency) {
      return currency.toLocaleString("it-IT", {
        style: "currency",
        currency: "VND",
      });
    } else return "0 VND";
  }
}
