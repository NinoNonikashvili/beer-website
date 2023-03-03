const keyword = document.querySelector('#keyword');
const suggestions = document.querySelector('#suggestions');
const menuIcon = document.querySelector("#menuIcon");
const menu = document.querySelector("#menu");

if (keyword !== null) {
    keyword.addEventListener('keyup', () => {
        console.log(keyword.value);
        if(keyword.value == "") {
            suggestions.style.display = 'none';
        } else {
            suggestions.style.display = 'block';
        }
    });
}


menuIcon.addEventListener('click', ()=> {
    if(menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
    } else{
        menu.classList.add('hidden');
    }
});