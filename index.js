menu = document.getElementById('menu');
menubtn = document.getElementById('menubtn');

menubtn.addEventListener('click',(e)=>{
    e.stopPropagation();
    menu.classList.add('active');
});

window.addEventListener('click',(e)=>{
    if(!menu.contains(e.target)){
        menu.classList.remove('active');
    }
});
