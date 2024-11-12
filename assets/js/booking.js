$("document").ready(() => {
  $(".table").on("click", function () {
    const tableName = $(this).children().text();
    $(".detail-table-name").text(`Số bàn: ${tableName}`);

    $.ajax({
      url: "process-booking.php",
      type: "POST",
      data: { table: tableName },
      error: function (xhr, status, error) {
        console.error("Đã xảy ra lỗi trong quá trình gửi dữ liệu: " + error);
      }
    })
  });
});
