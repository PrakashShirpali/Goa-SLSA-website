// JavaScript to Manage Accordion State
document.addEventListener("DOMContentLoaded", function () {
    const accordionItems = document.querySelectorAll(".accordion-collapse");

    // Restore the state of the accordions without animation
    function restoreAccordionState() {
        accordionItems.forEach((item) => {
            const target = item.getAttribute("id");
            const savedState = sessionStorage.getItem(target);
            if (savedState === "true") {
                item.classList.add("show"); // Directly add the 'show' class
                item.style.height = "auto"; // Prevent the animation by setting height to auto
            }
        });
    }

    // Save the state of the accordions
    function saveAccordionState() {
        accordionItems.forEach((item) => {
            const target = item.getAttribute("id");
            const isShown = item.classList.contains("show");
            sessionStorage.setItem(target, isShown);
        });
    }

    // Restore accordion state on page load
    restoreAccordionState();

    // Save accordion state before the page unloads
    window.addEventListener("beforeunload", saveAccordionState);

    let dashboardButton = document.querySelector('.dashboard-button');
    let dashboardDiv = document.querySelector('.dashboard-div');
    
    if (dashboardButton && dashboardDiv) {
        dashboardButton.addEventListener("click", () => {
            dashboardDiv.classList.toggle('hide'); // Toggle the hide class for smooth animation
        });
    }
    
});
