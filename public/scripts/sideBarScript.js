document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
    toggle.addEventListener('click', () => {

        const dropdown = toggle.nextElementSibling;

        dropdown.classList.toggle('hidden');
    });
});

document.querySelectorAll('.dropdown-toggle-inner').forEach(toggle => {
    toggle.addEventListener('click', () => {

        const dropdown = toggle.nextElementSibling;

        dropdown.classList.toggle('hidden');
    });
});