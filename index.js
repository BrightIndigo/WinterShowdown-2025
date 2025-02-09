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
  window.location.href = "../event/event.php";
}

function duzy_news() {
  window.location.href = "../artykuly/d_news.html";
}

function m_news1() {}

function m_news2() {}

function m_news3() {}

function m_news4() {}
