dpbtn = document.getElementById('dpbtn');
profileWindow = document.getElementById('profileWindow');
closeprofile = document.getElementById('closeprofile');
menubtn = document.getElementById('menubtn');
menu = document.getElementById('menu');
closeMenu = document.getElementById('closeMenu');


menubtn.addEventListener('click',(e)=>{
    e.stopPropagation();
    menu.classList.add('active');
});


closeMenu.addEventListener('click',(e)=>{
    e.stopPropagation();
    menu.classList.remove('active');
});



dpbtn.addEventListener('click',(e)=>{
    e.stopPropagation();
    profileWindow.classList.add('active');
});


closeprofile.addEventListener('click',(e)=>{
    e.stopPropagation();
    profileWindow.classList.remove('active');
});

window.addEventListener('click',(e)=>{
    if(!profileWindow.contains(e.target)){
        profileWindow.classList.remove('active');
        menu.classList.remove('active');
    }
});


