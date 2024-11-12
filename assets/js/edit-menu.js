function showEditForm() {
  $(".detail-title").text("Chỉnh sửa món");
  $(".add-form").css({ display: "none" });
  $(".edit-form").css({ display: "block" });
}

function showAddForm() {
  $(".detail-title").text("Thêm món");
  $(".add-form").css({ display: "block" });
  $(".edit-form").css({ display: "none" });
}

function displayEditMenuValue(menuId, menuName, menuPrice) {
  $("#edit-id").val(menuId);
  $("#edit-name").val(menuName);
  $("#edit-price").val(menuPrice);
}

function clearEditMenuValue() {
  $("#edit-name").val("");
  $("#edit-price").val("");
}

$("document").ready(function () {
  $(".edit-menu").on("click", function () {
    const menuId = $(this).parent(".menu").children(".menu-id").text();
    const menuName = $(this).parent(".menu").children(".menu-name").text();
    const menuPrice = $(this).parent(".menu").children(".menu-price").text();

    displayEditMenuValue(menuId, menuName, menuPrice);
    showEditForm();
  });

  // $(".remove-menu").on("click", function () {
  //   $(this).parent(".menu").remove();
  // });

  $(".add-menu").on("click", function () {
    clearEditMenuValue();
    showAddForm();
  });
});