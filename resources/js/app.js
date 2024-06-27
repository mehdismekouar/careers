import './bootstrap';
import '../css/app.css';
import.meta.glob('../images/**');


document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');

    if (successMessage) {
        setTimeout(function () {
            successMessage.classList.add('transition-all', 'duration-300', 'opacity-100', 'bottom-16');
        }, 1);

        setTimeout(function () {
            successMessage.classList.remove('opacity-100', 'bottom-16');
            successMessage.classList.add('pointer-events-none');
        }, 3000);
    }

    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const hamburger = document.getElementById('hamburger');
    const cross = document.getElementById('cross');
    const container = document.getElementById('container');
    const overlay = document.getElementById('overlay');
    const switchButton = document.getElementById('switch');
    const light = document.getElementById('light');
    const dark = document.getElementById('dark');

    var mode;

    if (!('theme' in localStorage) || localStorage.theme === 'light') {
        mode = 'dark';
    } else {
        mode = 'light';
    }

    function switchMode(currentMode) {
        if (currentMode == 'light') {
            document.documentElement.classList.remove('light');
            document.documentElement.classList.add('dark');
            dark.classList.add('hidden');
            light.classList.remove('hidden');

            localStorage.theme = 'dark';
            mode = 'dark';
        } else {
            document.documentElement.classList.remove('dark');
            document.documentElement.classList.add('light');
            dark.classList.remove('hidden');
            light.classList.add('hidden');

            localStorage.theme = 'light';
            mode = 'light';
        }
    }

    switchMode(mode);

    switchButton.addEventListener('click', function () {
        switchMode(mode);
    });

    var state = 'off';

    setTimeout(function () {
        overlay.classList.add('transition-all', 'duration-300');
    }, 1);

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
