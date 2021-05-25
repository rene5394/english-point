if(document.getElementById("changePassword")){
    let oldpassword = document.getElementById('password')
    let password = document.getElementById('newpassword');
    let password2 = document.getElementById('newpassword2');
    let p_nomatch = document.getElementById('p-nomatch');
    let submit = document.getElementById('submitform');

    submit.addEventListener('click', changePassword);

    function changePassword(){
        if(oldpassword.value !== "" && password.value !== "" && (password.value === password2.value) ){
            p_nomatch.classList.add('d-none');
            let url =  document.getElementById('changePasswordUrl').getAttribute('data-url');
            fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                method: 'PUT',
                credentials: "same-origin",
                mode: 'cors',
                cache: 'default',
                body: JSON.stringify({
                    oldpass: oldpassword.value,
                    newpass: password.value
                })
            })
            .then(function(response){
                if(response.ok){
                    response.json().then(function(data){
                        console.log("data", data);
                        if(data.status === 200){
                            // Success Notification
                            swal({
                                title: "Se ha cambiado la contraseña",
                                icon: "success",
                                button: "Cerrar",
                            })
                            .then(() => {
                     
                                location.reload();
                              });
                        }else{
                            swal({
                                title: "Problemas para cambiar la contraseña",
                                icon: "error",
                                button: "Cerrar",
                            });
                        }
                    })
                }
            });
        }else{
            p_nomatch.classList.remove('d-none');
        }
    }
}