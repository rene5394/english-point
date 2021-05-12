if(document.getElementById("page-student-dashboard")){
    let edit = document.querySelector('.edit');
    let editFields= document.querySelectorAll('.form-edit-fields');
    let save = document.querySelector('.save');
    // Edit btn clicked
    edit.addEventListener('click', () => {
        editFields.forEach(editField => {
            editField.removeAttribute('disabled');
        });
        save.removeAttribute('disabled');
    })
    // Save btn clicked
    save.addEventListener('click', () => {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let address = document.getElementById('address').value;
        let phone = document.getElementById('phone').value;
        let preference = document.getElementById('preference').value;
        if(name != '' && email != '' && address != '' && phone != '' && preference != ''){
            let url =  document.getElementById('editUserData').getAttribute('data-url');
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
                    name: name,
                    email: email,
                    address: address,
                    phone: phone,
                    preference: preference
                })
            })
            .then(function(response){
                if(response.ok){
                    response.json().then(function(data){
                        if(data.status === 200){
                            // Success Notification
                            swal({
                                title: "Información actualizada correctamente",
                                icon: "success",
                                button: "Cerrar",
                            })
                            .then(() => {
                                location.reload();
                              });
                        }else{
                            swal({
                                title: "Problemas al editar la información",
                                text: "Aseguresé de haber cambiado los datos",
                                icon: "error",
                                button: "Cerrar",
                            })
                            .then(() => {
                                location.reload();
                              });
                        }
                    })
                }
            });
        }
    })
}