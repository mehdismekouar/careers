import './bootstrap';
import '../css/app.css';
import.meta.glob('../images/**');

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

function changeState(state) {
    menu.classList.toggle('translate-x-[calc(100vw-150px)]');
    hamburger.classList.toggle('hidden');
    cross.classList.toggle('hidden');
    overlay.classList.toggle('hidden');

    if (state == 'on') {
        return 'off';
    } else {
        return 'on';
    }
}

toggle.addEventListener('click', function (e) {
    e.stopPropagation();
    state = changeState(state);
});

overlay.addEventListener('click', function () {
    if (state == 'on') {
        state = changeState(state);
    }
});