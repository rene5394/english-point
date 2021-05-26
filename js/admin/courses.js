if(document.getElementById("page-list-courses")){
    // Show select by pattern selected
    let radiosPattern = document.getElementById('radiosPattern');
    let loadCourses = document.getElementById('loadCourses');
    let tableTbodyCourses = document.getElementById('table-courses');
    radiosPattern.addEventListener('click',(e)=> {
        if(e.target.classList.contains('form-check-input')){
            let radiosSearchBy = document.getElementsByName('coursesBy');
            let pattern = '';
            // Check the radio button selected
            for(let i = 0, length = radiosSearchBy.length; i < length; i++){
                if(radiosSearchBy[i].checked){
                    pattern = radiosSearchBy[i].value;
                    break;
                }
            }
            // Check the value of the radio button selected
            if(pattern !== ''){
                let selects = document.querySelectorAll('.select-patterns');
                selects.forEach(select => {
                    select.classList.add('d-none');
                });
                let selectToShow = document.getElementById(`select${pattern}`);
                selectToShow.classList.remove('d-none');
                loadCourses.setAttribute('data-load', pattern);
            }
        }
    });

    // Load courses by pattern
    loadCourses.addEventListener('click',(e)=> {
        let patternToLoad =  e.target.getAttribute('data-load');
        if(patternToLoad !== ''){
            let patternValue = document.getElementById(`select${patternToLoad}`).value;
            if(patternValue !== ''){
                let url = document.getElementById('coursesByPattern').getAttribute("data-url");
                // Adding params
                url += `?pattern=${patternToLoad}&value=${patternValue}`;
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
                        response.json().then(courses => {
                            let coursesTbody = document.getElementById('table-courses');
                            coursesTbody.innerHTML = '';
                            courses.forEach(course => {
                                // Fill tr's
                                let tr = document.createElement('tr');
                                tr.setAttribute('data-id', course.id);
                                let td1 = document.createElement('td');
                                td1.textContent = course.level;
                                let td2 = document.createElement('td');
                                td2.textContent = course.modality;
                                let td3 = document.createElement('td');
                                td3.textContent = course.schedule;
                                let td4 = document.createElement('td');
                                td4.textContent = course.price;
                                let td6 = document.createElement('td');
                                    let btnActive = document.createElement('button');
                                    btnActive.classList.add('btn', 'btn-primary', 'active');
                                    btnActive.setAttribute('type','button');
                                    btnActive.textContent = 'Activar';
                                    td6.appendChild(btnActive);
                                let td7 = document.createElement('td');
                                    let btnDeactive = document.createElement('button');
                                    btnDeactive.classList.add('btn', 'btn-danger', 'deactive');
                                    btnDeactive.setAttribute('type','button');
                                    btnDeactive.textContent = 'Desactivar';
                                    td7.appendChild(btnDeactive);
                                let td8 = document.createElement('td');
                                    let payUrl = document.getElementById('paySubscriptionBaseUrl').getAttribute('data-url');
                                    let btnUrl = document.createElement('button');
                                    btnUrl.classList.add('btn', 'btn-warning', 'payment-link');
                                    btnUrl.setAttribute('type','button');
                                    btnUrl.setAttribute('data-url', payUrl);
                                    btnUrl.textContent = 'URL de pago';
                                    td8.appendChild(btnUrl);    
                                // Disable active/deactive button    
                                if(course.active === 1){
                                    btnActive.setAttribute('disabled',true);
                                }else{
                                    btnDeactive.setAttribute('disabled',true);
                                    btnUrl.setAttribute('disabled', true);
                                }
                                // Append tr/td to table
                                coursesTbody.appendChild(tr);
                                tr.appendChild(td1);
                                td1.after(td2,td3,td4,td6,td7, td8);
                            });
                        })
                    }
                });
            }else{
                swal({
                    title: "Selecciona un parametro!",
                    icon: "info",
                    button: "Cerrar",
                  });
            }
        }else{
            swal({
                title: "Selecciona un parametro!",
                icon: "info",
                button: "Cerrar",
              });
        }
    });

    tableTbodyCourses.addEventListener('click',(e)=> {
        e.preventDefault();
        if(e.target.classList.contains('active')){
            let courseid = e.target.parentNode.parentNode.getAttribute('data-id');
            activeCourse(courseid);
        }
        if(e.target.classList.contains('deactive')){
            let courseid = e.target.parentNode.parentNode.getAttribute('data-id');
            deactiveCourse(courseid);
        }
        if(e.target.classList.contains('payment-link')){
            let courseid = e.target.parentNode.parentNode.getAttribute('data-id');
            generatePaymentLink(e.target, courseid);
        }
    });
}

function activeCourse(courseid){
    let url = document.getElementById('activeCourse').getAttribute("data-url");
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
                courseid: courseid
            })
    })
    .then(function(response){
        if(response.ok){
            response.json().then(function(data){
                if(data.status === 200){
                    // Success Notification
                    swal({
                        title: "Curso activado!",
                        icon: "success",
                        button: "Cerrar",
                      })
                      .then(() => {
                        location.reload();
                      });
                }else{
                    swal({
                        title: "Curso no activado!",
                        icon: "error",
                        button: "Cerrar",
                      });
                }
            })
        }
    });
}

function deactiveCourse(courseid){
    let url = document.getElementById('deactiveCourse').getAttribute("data-url");
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
            courseid: courseid
          })
          
    })
    .then(function(response){
        if(response.ok){
            response.json().then(function(data){
                if(data.status === 200){
                    // Success Notification
                    swal({
                        title: "Curso desactivado!",
                        icon: "success",
                        button: "Cerrar",
                      })
                      .then(() => {
                        location.reload();
                      });
                }else{
                    swal({
                        title: "Curso no desactivado!",
                        icon: "error",
                        button: "Cerrar",
                      });
                }
            })
        }
    });
}

function generatePaymentLink(e, courseid){
    let url = e.getAttribute("data-url");
    url += `/${courseid}`;
    swal({
        title: "URL del curso",
        text: url,
        icon: "success",
        button: "Copiar Texto",
        })
        .then((value) => {
            if(value === true){
                let urlText = document.querySelector('.swal-text');
                var r = document.createRange();
                r.selectNode(urlText);
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(r);
                document.execCommand('copy');
                window.getSelection().removeAllRanges();
            }
          });
}