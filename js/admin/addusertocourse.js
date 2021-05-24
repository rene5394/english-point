if(document.getElementById("addusertocourse")){
    let password = document.getElementById('password');
    let password2 = document.getElementById('password2');
    let p_nomatch = document.getElementById('p-nomatch');
    let submit = document.getElementById('submitform');

    password.addEventListener('keyup', comparePasswords);
    password2.addEventListener('keyup', comparePasswords);

    function comparePasswords(){
        if( password.value !== "" && (password.value === password2.value) ){
            submit.removeAttribute('disabled');
            p_nomatch.classList.add('d-none');
        }else{
            submit.setAttribute('disabled', true);
            p_nomatch.classList.remove('d-none');
        }
    }
}