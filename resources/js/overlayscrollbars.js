import { OverlayScrollbars } from "overlayscrollbars";

const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";

const DEFAULT = {
    scrollbarTheme: "os-theme-light",
    scrollbarAutoHide: "leave",
    scrollbarClickScroll: true,
};

document.addEventListener("DOMContentLoaded", function () {
    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
    if (sidebarWrapper) {
        OverlayScrollbars(sidebarWrapper, DEFAULT);
    }
});
