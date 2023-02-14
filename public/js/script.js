const btnProfile = document.querySelector("#btnProfile");
const showMenu = document.querySelector("#showMenu");

btnProfile.addEventListener('click', function(){
    showMenu.classList.toggle('hidden');
});