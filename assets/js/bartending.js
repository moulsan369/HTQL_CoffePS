$("document").ready(() => {
  const modal = $(".modal");
  const modalElement = document.getElementById("modal");

  $(".dark-table tbody tr").on("click", function () {
    modal.css({ display: "flex" });
  });

  $("#close-modal").on("click", function () {
    modal.css({ display: "none" });
  });

  $(window).on("click", function (e) {
    if (e.target == modalElement) {
      modal.css({ display: "none" });
    }
  });
});

