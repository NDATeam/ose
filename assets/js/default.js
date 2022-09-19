// SignIn + SignUp
const signInLoading = document.querySelector('.intro__signIn');
const signUpLoading = document.querySelector('.intro__signUp');

signInLoading.addEventListener('click', function () {
    signInLoading.innerHTML = 'Signing In';
    signInLoading.classList.add('spinning');
    signUpLoading.disabled = true;

    setTimeout(function () {
        signInLoading.classList.remove('spinning');
        signInLoading.innerHTML = 'Sign In';
        signUpLoading.disabled = false;
        window.open('sign-in', '_self');
    }, 2000);
});

signUpLoading.addEventListener('click', function () {
    signUpLoading.innerHTML = 'Signing Up';
    signUpLoading.classList.add('spinning');
    signInLoading.disabled = true;

    setTimeout(function () {
        signUpLoading.classList.remove('spinning');
        signUpLoading.innerHTML = 'Sign Up';
        signInLoading.disabled = false;
        window.open('sign-up', '_self');
    }, 2000);
});
