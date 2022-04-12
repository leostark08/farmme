$(document).ready(function () {
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: "horizontal",
        loop: true,
        spaceBetween: 10,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-next',
            prevEl: '.swiper-prev',
        },
    });

    // tab events
    const labels = document.querySelectorAll(".tab-label");
    const contents = document.querySelectorAll(".tab-content");
    labels.forEach(function (tab, index) {
        tab.addEventListener("click", function () {
            const activeContent = document.querySelector(".tab-content.active");
            const activeLabel = document.querySelector(".tab-label.active");

            activeContent.classList.remove("active");
            contents[index].classList.add('active');

            activeLabel.classList.remove("active");
            labels[index].classList.add('active');
        });
    })

    // copy token to clipboard
    const iconCopys = document.querySelectorAll('.copy-token');
    var copyData = '';
    iconCopys.forEach(function (icon) {
        icon.addEventListener('click', () => {
            copyData = icon.parentElement.querySelector('.token').innerText;
            copyToClipboard(copyData);
            icon.parentElement.querySelector('.copied').classList.add('active');
            setTimeout(function () {
                icon.parentElement.querySelector('.copied').classList.remove('active');
            }, 1000);
        });
    })

    // navigation toggle
    const navToggle = document.getElementById('toggle');
    const navContainer = document.querySelector('.nav-container');
    navToggle.addEventListener('click', function () {
        navContainer.classList.add('active');
    });
    const closeToggle = document.getElementById('nav-close');
    closeToggle.addEventListener('click', function () {
        navContainer.classList.remove('active');
    });
});
// copy to clipboard
function copyToClipboard(text) {
    var sampleTextarea = document.createElement("textarea");
    document.body.appendChild(sampleTextarea);
    sampleTextarea.value = text;
    sampleTextarea.select();
    document.execCommand("copy");
    document.body.removeChild(sampleTextarea);
}

