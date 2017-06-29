function inputCheck() {

  // 最終アポ日
  if (crientForm.lastApDate.value != "") {
    if (!crientForm.lastApDate.value.match(/^(20[1-9][0-9])/(0[1-9]|1[0-2])/(0[1-9]|[12][0-9]|3[01])$/)) {
      crientForm.lastApDate.title = "yyyy/mm/ddで入力してください";
      return false;
    } else {
      crientForm.lastApDate.title = "";
    }
  }

  // 担当者電話番号
  if (crientForm.contactTel.value != "") {
    if (!crientForm.contactTel.value.match(/^0[1-9]{1}-[0-9]{4}-[0-9]{4}$)|(^0[1-9]{2}-[0-9]{3,4}-[0-9]{4}$)|(^0[1-9]{3}-[0-9]{2}-[0-9]{4}$)/) {
      crientForm.contactTel.title = "xxx-xxx-xxxxまたはxx-xxxx-xxxxまたはxxxx-xx-xxxxで入力してください";
      return false;
    } else {
      crientForm.contactTel.title = "";
    }
  }

  // 担当者メールアドレス
  if (crientForm.contactMail.value != "") {
    if (!crientForm.contactMail.value.match(/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/)) {
      crientForm.contactMail.title = "正しい形式で入力してください";
      return false;
    } else {
      crientForm.contactMail.title = "";
    }
  }

  // メール送信用メールアドレス
  if (crientForm.sendMail.value != "") {
    if (!crientForm.sendMail.value.match(/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/)) {
      crientForm.sendMail.title = "正しい形式で入力してください";
      return false;
    } else {
      crientForm.sendMail.title = "";
    }
  }

  // ホームページ
  if (crientForm.webPage.value != "") {
    if (!crientForm.webPage.value.match(/^(https?)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/)) {
      crientForm.webPage.title = "正しい形式で入力してください";
      return false;
    } else {
      crientForm.webPage.title = "";
    }
  }

}
