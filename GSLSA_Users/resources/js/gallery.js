// Initially hide all sections
document.addEventListener('DOMContentLoaded', function () {
    const photosSection = document.querySelector(".photos");
    const videosSection = document.querySelector(".videos");
    
    // Show only if there is content
    if (!document.querySelector(".photos img")) {
        photosSection.style.display = "none";
    }
    if (!document.querySelector(".videos video")) {
        videosSection.style.display = "none";
    }
});

// Toggle the visibility of the Photos section and add "active" class
document.querySelector("#photo")?.addEventListener("click", function () {
    const photosSection = document.querySelector(".photos");
    const videosSection = document.querySelector(".videos");

    // Toggle the visibility of the sections
    if (photosSection) {
        photosSection.style.display = "flex";
    }

    if (videosSection) {
        videosSection.style.display = "none";
    }

    // Add "activa" class to the Photos link and remove it from the Videos link
    document.querySelector("#photo")?.classList.add("activa");
    document.querySelector("#video")?.classList.remove("activa");
});

// Toggle the visibility of the Videos section and add "active" class
document.querySelector("#video")?.addEventListener("click", function () {
    const photosSection = document.querySelector(".photos");
    const videosSection = document.querySelector(".videos");

    // Toggle the visibility of the sections
    if (photosSection) {
        photosSection.style.display = "none";
    }

    if (videosSection) {
        videosSection.style.display = "flex";
    }

    // Add "activa" class to the Videos link and remove it from the Photos link
    document.querySelector("#video")?.classList.add("activa");
    document.querySelector("#photo")?.classList.remove("activa");
});
