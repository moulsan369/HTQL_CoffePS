function getOrderItemByRmBtn(element) {
  return $(element).parent(".order-note-rm").parent(".order-detail");
}
$("document").ready(function () {
  $(".rm-btn").on("click", function () {
    var maDoUong = getOrderItemByRmBtn(this).find(".ma-do-uong");
    var maDoUong = maDoUong.text();
    $.ajax({
      url: "process-remove-item-order.php",
      type: "POST",
      data: { id: maDoUong },
      error: function (xhr, status, error) {
        console.error("Đã xảy ra lỗi trong quá trình gửi dữ liệu: " + error);
      }
    })
    getOrderItemByRmBtn(this).remove();
  });

  $(".note").focusout(function (){
    var inputValue = $(this).val();
    var maDoUong = $(this).parent(".order-note-area").parent(".order-note-rm").parent(".order-detail");
    maDoUong = maDoUong.find(".ma-do-uong").text();
    $.ajax({
      url: "process-add-order-note.php",
      type: "POST",
      data: {
        id: maDoUong,
        note: inputValue,
      },
      error: function (xhr, status, error) {
        console.error("Đã xảy ra lỗi trong quá trình gửi dữ liệu: " + error);
      }
    })
  })
});
