var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar() {
    if (!sidebarOpen) {
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
    }
}

function closeSidebar() {
    if (sidebarOpen) {
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen = false;
    }
}

window.addEventListener("resize", function() {
    if (window.innerWidth > 768 && sidebarOpen) {
        sidebar.classList.remove("sidebar-active");
        sidebarOpen = false;
    }
});