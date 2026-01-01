document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("theme");
    const rootElement = document.documentElement;
    const logo = document.querySelector("#gslsa_logo");

    // Temporarily disable animations
    document.body.classList.add("no-animation");

    const updateLogoSource = (theme) => {
        logo.src =
            theme === "dark"
                ? window.eventUrls.darkLogo
                : window.eventUrls.lightLogo;
    };

    // Get saved theme from localStorage
    const savedTheme = localStorage.getItem("theme") || "light"; // Default to light
    rootElement.setAttribute("data-bs-theme", savedTheme);
    themeToggle.checked = savedTheme === "dark";
    updateLogoSource(savedTheme);

    // Re-enable animations after page load
    setTimeout(() => {
        document.body.classList.remove("no-animation");
    }, 100); // Small delay to prevent animation flicker

    // Handle theme toggle switch
    themeToggle.addEventListener("change", () => {
        const newTheme = themeToggle.checked ? "dark" : "light";
        localStorage.setItem("theme", newTheme);
        rootElement.setAttribute("data-bs-theme", newTheme);
        updateLogoSource(newTheme);
    });

    // Scroll-to-Top Button Logic
    const scrollToTopBtn = document.querySelector(".scroll-to-top");

    const scrollToTop = () => window.scrollTo({ top: 0, behavior: "smooth" });

    scrollToTopBtn.addEventListener("click", scrollToTop);

    const handleScroll = () => {
        if (window.pageYOffset > 100) {
            scrollToTopBtn.style.transform = "translateY(0)";
            scrollToTopBtn.style.opacity = "1";
        } else {
            scrollToTopBtn.style.transform = "translateY(100%)";
            scrollToTopBtn.style.opacity = "0";
        }
    };

    window.addEventListener("scroll", handleScroll);

    // Time Update Logic
    const updateTime = () => {
        const now = new Date();
        const locale =
            document.documentElement.lang === "kn" ? "kok-IN" : "en-US";

        const options = {
            day: "2-digit",
            month: "short",
            year: "numeric",
            weekday: "short",
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
            hour12: true,
        };

        const dateTimeString = now.toLocaleString(locale, options);
        document.getElementById("current-time").textContent = dateTimeString;
    };

    updateTime();
    setInterval(updateTime, 1000);

    // Initialize the base font size (percentage)
    let baseFontSize = 100; // Default is 100%

    // Get button references
    const increaseFont = document.getElementById("increaseFont");
    const decreaseFont = document.getElementById("decreaseFont");
    const defaultFont = document.getElementById("defaultFont");

    // Function to adjust the font size
    function adjustFontSize(change) {
        baseFontSize += change;
        document.body.style.fontSize = baseFontSize + "%"; // Adjust the font size for the entire document
    }

    // Reset font size to default
    function resetFontSize() {
        baseFontSize = 100;
        document.body.style.fontSize = baseFontSize + "%";
    }

    // Event listeners for the buttons
    increaseFont.addEventListener("click", () => adjustFontSize(10)); // Increase font size by 10%
    decreaseFont.addEventListener("click", () => adjustFontSize(-10)); // Decrease font size by 10%
    defaultFont.addEventListener("click", resetFontSize); // Reset font size to default
});
