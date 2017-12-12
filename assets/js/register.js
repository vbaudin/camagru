const box_register = document.querySelector('.box-flex .box-register');
const box_signin = document.querySelector('.box-flex .box-sign-in');
const display_none = (elem) => { 
    if (elem.style.display === 'none')
        elem.style.display = 'block';
    else
        elem.style.display = 'none';
}
// const display_none = (elem) => { elem.style.display = 'none'; }
document.getElementById('flower').addEventListener('click', function () {
    display_none(box_register);
});
document.getElementById('flower2').addEventListener('click', function () {
    display_none(box_signin);
});
// display_none(box_register);
// console.log(box_register);