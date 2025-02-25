document.addEventListener("click", (e) => {
  const isDropdownButton = e.target.matches("[dropdown-btn]");
  if (!isDropdownButton && e.target.closest("[dropdown]") != null) return;

  let currentDropdown;
  if (isDropdownButton) {
    currentDropdown = e.target.closest("[dropdown]");
    currentDropdown.classList.toggle("active");
  }

  document.querySelectorAll("[dropdown].active").forEach((dropdown) => {
    if (dropdown === currentDropdown) return;
    dropdown.classList.remove("active");
  });
});

function goToEvent() {
  setTimeout(() => {
    let disappear = document.querySelector("#spin_d");
    let appear = document.querySelector("#spin");
    disappear.style.display = "none";
    appear.style.display = "flex";
  }, "300");

  setTimeout(() => {
    window.location.href = "./event/event.php";
  }, "1000");
}

function duzy_news() {
  window.location.href = "../artykuly/d_news.html";
}

document.addEventListener("DOMContentLoaded", function () {
  window.closeComm = function () {
    let comm = document.getElementById("communicate");
    if (comm) {
      comm.style.display = "none";
    }
  };
});
