if(document.getElementById("page-pay-subscription")){
    let payBtn = document.getElementById('submitpayment');
    payBtn.addEventListener('click', () => {
         // Credit card details
        let courseid = document.getElementById('courseid').value;
        let name = document.getElementById('name').value;
        let number = document.getElementById('number').value;
        let expmonth = document.getElementById('expmonth').value;
        let expyear = document.getElementById('expyear').value;
        let cvc = document.getElementById('cvc').value;
        if(courseid !== "" && name !== "" && number !== "" && expmonth !== "" && expyear !== "" && cvc !== ""){
            let url = document.getElementById("paySubscription").getAttribute("data-url");
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
                    courseid: courseid,
                    name: name,
                    number: number,
                    expmonth: expmonth,
                    expyear: expyear,
                    cvc: cvc
                })
            })
            .then(function(response){
                if(response.ok){
                    response.json().then(function(transaction){
                        if(transaction.status === 200){
                            let approveed = transaction.tran_status;
                            if(approveed){
                                // Payment approveed
                                swal({
                                    title: "Transacción exitosa",
                                    icon: "success",
                                    button: "Cerrar",
                                });
                            }else{
                                // Payment rejected
                                swal({
                                    title: "Transacción rechazada",
                                    icon: "error",
                                    text: "Contacte el proveedor de su tarjeta",
                                    button: "Cerrar",
                                });
                            }
                        }
                        if(transaction.status === 500){
                            console.log(transaction);
                            let errors = transaction.errores;
                            let errorTxt = '';
                            for(let i = 0; i < Object.keys(errors).length; i++){
                                if(i == Object.keys(errors).length -1){
                                    errorTxt += '- ' +  errors[i];
                                }else{
                                    errorTxt += '- ' + errors[i] + '\n';
                                }
                             }       
                            // Error Notification
                            swal({
                                title: "Errores",
                                text: errorTxt,
                                icon: "error",
                                button: "Cerrar",
                            });
                        }
                    })
                }
            });
        }else{
            swal({
                title: "Hay campos del formulario que faltan por llenar",
                icon: "info",
                button: "Cerrar",
            });
        }
    });
}