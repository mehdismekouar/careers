import './bootstrap';
import '../css/app.css';
import.meta.glob('../images/**');

const toggle = document.getElementById('menu-toggle');
const menu = document.getElementById('mobile-menu');
const hamburger = document.getElementById('hamburger');
const cross = document.getElementById('cross');
const container = document.getElementById('container');
const overlay = document.getElementById('overlay');

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