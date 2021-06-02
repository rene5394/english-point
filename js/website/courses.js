if(document.getElementById("courses")){
    let sendBtn = document.getElementById('send');
    sendBtn.addEventListener('click', () => {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let address = document.getElementById('address').value;
        let notification = document.getElementById('notification').value;
        let level = document.getElementById('level').value;
        let modality = document.getElementById('modality').value;
        if(name !== '' && email !== '' && phone !== '' && address != '' && notification !== '' && level !== '' && modality !== ''){
            let url = document.getElementById('contact-form-url').getAttribute('data-url');
            fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                method: 'POST',
                credentials: "same-origin",
                mode: 'cors',
                cache: 'default',
                body: JSON.stringify({
                    name: name,
                    email: email,
                    phone: phone,
                    address: address,
                    notification: notification,
                    level: level,
                    modality: modality
                })
            })
            .then(function(response){
                if(response.ok){
                    response.json().then(function(response){
                        if(response.status === 200){
                            // Message sent
                            swal({
                                title: "Mensaje enviado",
                                icon: "success",
                                button: "Cerrar",
                            });
                        }else{
                            // Message didn't send
                            swal({
                                title: "Mensaje no enviado",
                                icon: "error",
                                button: "Cerrar",
                            });
                        }
                    });
                }
            });
        }else{
            // Left to fill some fields
            swal({
                title: "Hay campos sin llenar en el formulario",
                icon: "error",
                button: "Cerrar",
            });
        }
    });
}
