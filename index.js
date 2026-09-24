dpbtn = document.getElementById('dpbtn');
profileWindow = document.getElementById('profileWindow');
closeprofile = document.getElementById('closeprofile');

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
    }
});
