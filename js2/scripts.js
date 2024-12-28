// SIDEBAR TOGGLE
var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");
var gridContainer = document.querySelector(".grid-container");
var mainContainer = document.querySelector(".main-container");

function toggleSidebar() {
    if (!sidebarOpen) {
        sidebar.classList.add("sidebar-open");
        sidebar.classList.remove("sidebar-closed");
        sidebarOpen = true;
        mainContainer.style.marginLeft = "260px"; // Shift main content to the right when the sidebar opens
    } else {
        sidebar.classList.remove("sidebar-open");
        sidebar.classList.add("sidebar-closed");
        sidebarOpen = false;
        mainContainer.style.marginLeft = "0"; // Reset main content when sidebar closes
    }
}
