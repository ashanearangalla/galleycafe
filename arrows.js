document.addEventListener('DOMContentLoaded', function () {
    // Get the icon elements
    const angleLeftIcon = document.querySelector('.fa-angle-left');
    const angleRightIcon = document.querySelector('.fa-angle-right');

    // Get the target section element
    const menuSection = document.querySelector('.menu');

    // Add click event listener to the angle-left icon
    angleLeftIcon.addEventListener('click', function () {
        // Scroll to the menu section smoothly
        menuSection.scrollIntoView({
            behavior: 'smooth'
        });
    });

    // Add click event listener to the angle-right icon
    angleRightIcon.addEventListener('click', function () {
        // You can implement scrolling to the next section or customize it based on your needs
        // Example: Scroll to the next section with a class of "next-section"
        const nextSection = document.querySelector('.next-section');
        if (nextSection) {
            nextSection.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});