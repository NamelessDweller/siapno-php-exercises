document.addEventListener("DOMContentLoaded", function () {
  const writeButton = document.getElementById("write-button");
  const writeForm = document.getElementById("write-form");

  if (writeForm) {
    writeForm.style.display = "none";
  }

  if (writeButton && writeForm) {
    writeButton.addEventListener("click", function () {
      writeForm.style.display =
        writeForm.style.display === "none" ? "block" : "none";
    });
  }
});