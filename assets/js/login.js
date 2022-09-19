//TODO: Eye show pwd

//! Code basic

//? Code Show Password
// const eye = document.getElementById('eye');
// eye.addEventListener('click', function () {
//     eye.classList.toggle('open');
//     eye.children[0].classList.toggle('fa-eye-slash');
//     let hasEyeOpen = eye.classList.contains('open');
//     if (hasEyeOpen) {
//         eye.previousElementSibling.setAttribute('type', 'text');
//     } else {
//         eye.previousElementSibling.setAttribute('type', 'password');
//     }
// });

//? Mở Selection Href
// let toggle = document.querySelector('.toggle');
// let menu = toggle.parentElement;

// toggle.addEventListener('click', function() {
//     menu.classList.toggle('active');
// });

let paragraph = document.querySelector('.paragraph');

function showDiv() {
    paragraph.style.opacity = '1';
}

function hideDiv() {
    paragraph.style.opacity = '0';
}

function clipboard(id) {
    let copy_button = document.querySelector('.button-copy-' + id);
    copy_button.addEventListener('click', function () {
        let copy_parent = copy_button.parentElement;
        let input = copy_parent.querySelector('input[type="text"]');
        input.select();
        document.execCommand('copy');
        copy_parent.classList.add('active');
        window.getSelection().removeAllRanges();
        setTimeout(() => {
            copy_parent.classList.remove('active');
        }, 2500);
    });
}

//! Code jquery
$(document).ready(function () {
    $('#eye').click(function () {
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('open')) {
            $(this).prev().attr('type', 'text');
        } else {
            $(this).prev().attr('type', 'password');
        }
    });

    $('#eye-1').click(function () {
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('open')) {
            $(this).prev().attr('type', 'text');
        } else {
            $(this).prev().attr('type', 'password');
        }
    });

    $('.toggle').click(function () {
        let menu = $(this).parent();
        menu.toggleClass('active');
    });
});
