if(document.getElementById("transactions")){
    let datepicker = new DatePicker(document.getElementById('date1'));
    let datepicker2 = new DatePicker(document.getElementById('date2'));
    let loadTransactionsBtn = document.getElementById('loadTransactionsBtn');
    // Click on load transactions button
    loadTransactionsBtn.addEventListener('click', () => {
        let url = document.getElementById('loadTransactions').getAttribute('data-url');
        let modality = document.getElementById('selectModality').value;
        let level = document.getElementById('selectLevel').value;
        let date = document.getElementById('date1').value;
        let date2 = document.getElementById('date2').value;
        if(date !== '' && date2 !== ''){
            // Adding params
            url += `?modality=${modality}&level=${level}&date=${date}&date2=${date2}`;
            fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                    "Accept": "application/json",
                },
                method: 'GET',
                credentials: "same-origin",
                mode: 'cors',
                cache: 'default',
            }).then(function(response){
                if(response.ok){
                    response.json().then(transactions => {
                        let tableTransactions = document.getElementById('table-transactions');
                        tableTransactions.innerHTML = '';
                        if(transactions[0]){
                            transactions.forEach(transaction => {
                                let tr = document.createElement('tr');
                                let td1 = document.createElement('td');
                                td1.textContent = transaction.name;
                                let td2 = document.createElement('td');
                                td2.textContent = `${transaction.modality} ${transaction.level} ${transaction.schedule}`;
                                let td3 = document.createElement('td');
                                td3.textContent = transaction.wompi_id_transaction;
                                let td4 = document.createElement('td');
                                td4.textContent = transaction.amount;
                                let td5 = document.createElement('td');
                                td5.textContent = transaction.created_at;
                                // Apppends
                                tableTransactions.appendChild(tr);
                                tr.appendChild(td1);
                                td1.after(td2, td3, td4, td5);
                            });
                        }else{
                            let tr = document.createElement('tr');
                            let td = document.createElement('td');
                            td.setAttribute('colspan', 5);
                            td.textContent = 'No hay transacciones para esta búsqueda';
                            tableTransactions.appendChild(tr);
                            tr.appendChild(td);
                        }
                    });
                }else{
                    swal({
                        title: "Error al cargar transacciones",
                        icon: "error",
                        button: "Cerrar",
                    });
                }
            });
        }else{ 
            swal({
                title: "Selecciona rango de fechas!",
                icon: "info",
                button: "Cerrar",
              });
        }
    });
}