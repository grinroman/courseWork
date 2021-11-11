"use strict";

const btn = document.querySelector('.menu-btn');


btn.addEventListener('click', (e)=>{
    const menu = document.querySelector('.menu');
    menu.classList.toggle('menu_active');
});





