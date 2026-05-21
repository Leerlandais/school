console.log("Beacon");

window.addEventListener('DOMContentLoaded', () => {
    if(document.getElementById("activeStatus")) {
        const toggle = document.getElementById('switch-link');
        toggle.checked = !toggle.checked;
    }
});


const link = document.getElementById('switch-link');

if (link) {
    link.addEventListener('click', function () {
        console.log("Beacon sent");
        const linkId = this.dataset.linkId;

        navigator.sendBeacon('?route=changeStatus', new URLSearchParams({ id: linkId }));
    });
}
