document.addEventListener("DOMContentLoaded", function () {
  const operationSelect = document.getElementById("operation");
  const startContainer = document.querySelector(".start-container");
  const lengthContainer = document.querySelector(".length-container");
  const replaceWithContainer = document.querySelector(
    ".replace-with-container"
  );

  function toggleInputFields() {
    startContainer.style.display = "none";
    lengthContainer.style.display = "none";
    replaceWithContainer.style.display = "none";

    if (operationSelect.value === "substring") {
      startContainer.style.display = "block";
      lengthContainer.style.display = "block";
    } else if (operationSelect.value === "replace") {
      startContainer.style.display = "block";
      lengthContainer.style.display = "block";
      replaceWithContainer.style.display = "block";
    }
  }

  operationSelect.addEventListener("change", toggleInputFields);
  toggleInputFields();
});
