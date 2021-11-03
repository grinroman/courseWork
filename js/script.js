
const btn = document.querySelector('.menu-btn');
console.log(btn);

btn.addEventListener('click', (e)=>{
    const menu = document.querySelector('.menu');
    menu.classList.toggle('menu_active');
});