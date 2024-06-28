import './bootstrap';
import '../css/app.css';
import.meta.glob('../images/**');

const origin = document.documentElement;
const light = document.getElementById('light');
const dark = document.getElementById('dark');

var mode;

if (origin.classList.contains('dark')) {
    mode = 'dark';
    light.classList.remove('hidden');
} else {
    dark.classList.remove('hidden');
    mode = 'light';
}

document.addEventListener('DOMContentLoaded', function () {
    const switchButton = document.getElementById('switch');
    const successMessage = document.getElementById('success-message');
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const hamburger = document.getElementById('hamburger');
    const cross = document.getElementById('cross');
    const overlay = document.getElementById('overlay');

    function switchMode(currentMode) {
        if (currentMode == 'light') {
            localStorage.theme = 'dark';
            mode = 'dark';
        } else {
            localStorage.theme = 'light';
            mode = 'light';
        }

        origin.classList.toggle('light');
        origin.classList.toggle('dark');
        dark.classList.toggle('hidden');
        light.classList.toggle('hidden');
    }

    switchButton.addEventListener('click', function () {
        switchMode(mode);
    });

    if (successMessage) {
        successMessage.classList.add('opacity-100', 'top-12');

        setTimeout(function () {
            successMessage.classList.remove('opacity-100', 'top-12');
            successMessage.classList.add('pointer-events-none');
        }, 2000);
    }

    var state = 'off';

    function changeState(state) {
        menu.classList.toggle('translate-x-[calc(100vw-150px)]');
        hamburger.classList.toggle('hidden');
        cross.classList.toggle('hidden');

        if (overlay.classList.contains('pointer-events-none')) {
            overlay.classList.remove('pointer-events-none');
            overlay.classList.add('opacity-100');
        } else {
            overlay.classList.remove('opacity-100');
            overlay.classList.add('pointer-events-none');
        }

        if (state == 'on') {
            return 'off';
        } else {
            return 'on';
        }
    }

    toggle.addEventListener('click', function (e) {
        state = changeState(state);
    });

    overlay.addEventListener('click', function () {
        state = changeState(state);
    });
});
