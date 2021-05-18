if(document.getElementById("page-students-courses")){
    // Radio buttons div containers
    let radiosSearchType = document.getElementById('radiosSearchType'); // container main radio buttons
    let radiosSearchCourseType = document.getElementById('radiosSearchCourseType'); // container by course radio buttons 
    // Radio button groups
    let radiosSearchByStudents = document.getElementsByName('studentsBy'); // Main radio buttons
    let radiosSearchByCourse = document.getElementsByName('coursesBy'); // By course radio buttons 
    // Selects for modality and level
    let selects = document.querySelectorAll('.select-patterns');
    let selectCourse = document.getElementById('selectCourse');
    // Button search
    let searchStudents = document.getElementById('searchStudents');
    let tableTbodyCourses = document.getElementById('table-students');

    // The first 2 radio buttons: Nombre y Curso
    radiosSearchType.addEventListener('click',(e)=> {
        if(e.target.classList.contains('form-check-input')){
            let pattern = '';
            // Check the radio button selected
            for(let i = 0, length = radiosSearchByStudents.length; i < length; i++){
                if(radiosSearchByStudents[i].checked){
                    pattern = radiosSearchByStudents[i].value;
                    if(pattern === 'Course'){
                        for(let i = 0, length = radiosSearchByCourse.length; i < length; i++){
                            if(radiosSearchByCourse[i].checked){
                                radiosSearchByCourse[i].checked = false;
                            }
                        }
                        selects.forEach(select => {
                            select.classList.add('d-none');
                            selectCourse.classList.add('d-none');
                        });
                    }
                    break;
                }
            }
            // Check the value of the radio button selected
            if(pattern !== ''){
                let options = document.querySelectorAll('.options');
                options.forEach(option => {
                    option.classList.add('d-none');
                });
                let optionToShow = document.getElementById(`option${pattern}`);
                optionToShow.classList.remove('d-none');
                searchStudents.setAttribute('data-load', pattern);
            }
        }
    });

    // The second 2 radios buttons: Modalidad y Nivel
    radiosSearchCourseType.addEventListener('click',(e)=> {
        if(e.target.classList.contains('form-check-input')){
            let pattern = '';
            // Check the radio button selected
            for(let i = 0, length = radiosSearchByCourse.length; i < length; i++){
                if(radiosSearchByCourse[i].checked){
                    pattern = radiosSearchByCourse[i].value;
                    break;
                }
            }
            // Check the value of the radio button selected
            if(pattern !== ''){
                selects.forEach(select => {
                    select.selectedIndex = 0;
                    select.classList.add('d-none');
                    selectCourse.classList.add('d-none');
                });
                let selectToShow = document.getElementById(`select${pattern}`);
                selectToShow.classList.remove('d-none');
                searchStudents.setAttribute('data-load', pattern);
            }
        }
    });

    // Selects modality and level add event listener on change value
    let selectModality = document.getElementById('selectModality');
    selectModality.addEventListener('change', () => {
        loadCoursesbyPattern('Modality');
    });
    let selectLevel = document.getElementById('selectLevel');
    selectLevel.addEventListener('change', () => {
        loadCoursesbyPattern('Level');
    });

    // Click search button
    searchStudents.addEventListener('click', (e)=> {
        let patternToLoad = e.target.getAttribute('data-load');
        if(patternToLoad !== null && patternToLoad !== 'Course'){
            let patternValue;
            // Validate data
            if(patternToLoad === 'Name'){
                patternValue = validateName();
            }else if(patternToLoad === 'Modality'){
                patternToLoad = 'Course';
                patternValue = validateModalityCourse();
            }else if(patternToLoad === 'Level'){
                patternToLoad = 'Course';
                patternValue = validateLevelCourse();
            }
            // Check if data is validated
            if(patternValue !== ""){
                let url = document.getElementById('studentsByPattern').getAttribute("data-url");
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
                        response.json().then(students => {
                            let tableStudents = document.getElementById('table-students');
                            tableStudents.innerHTML = '';
                            if(students[0]){
                                students.forEach(student => {
                                    let tr = document.createElement('tr');
                                    let td1 = document.createElement('td');
                                    td1.textContent = student.name;
                                    let td2 = document.createElement('td');
                                    td2.textContent = student.email;
                                    let td3 = document.createElement('td');
                                    td3.textContent = student.phone;
                                    let td4 = document.createElement('td');
                                    td4.textContent = student.created_at;
                                    // Apppends
                                    tableStudents.appendChild(tr);
                                    tr.appendChild(td1);
                                    td1.after(td2, td3, td4);
                                });
                            }else{
                                let tr = document.createElement('tr');
                                let td = document.createElement('td');
                                td.setAttribute('colspan', 4);
                                td.textContent = 'No hay usuarios para esta búsqueda';
                                tableStudents.appendChild(tr);
                                tr.appendChild(td);
                            }
                        });
                    }
                });
            }else{
                swal({
                    title: "Selecciona todos los parametro!",
                    icon: "info",
                    button: "Cerrar",
                  });
            }
        }
    });
}

function loadCoursesbyPattern(patternToLoad){
    let url = document.getElementById('coursesByPattern').getAttribute("data-url");
    let patternValue = document.getElementById(`select${patternToLoad}`).value;
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
                let selectCourse = document.getElementById('selectCourse');
                selectCourse.classList.remove('d-none');
                selectCourse.innerHTML = "";
                let option = document.createElement('option');
                option.textContent = 'Seleccionar curso';
                option.value = "";
                option.setAttribute('selected', true);
                option.setAttribute('disabled', true);
                selectCourse.appendChild(option);
                courses.forEach(course => {
                    let option = document.createElement('option');
                    option.textContent = `${course.modality} ${course.level} ${course.schedule}`;
                    option.value = course.id;
                    selectCourse.appendChild(option);
                });
            });
        }
    });
}

function validateName(){
    let name = document.getElementById('optionName');
    if(name.value !== ""){
        return name.value;
    }
    return "";
}

function validateModalityCourse(){
    let modality = document.getElementById('selectModality');
    let course = document.getElementById('selectCourse');
    if(modality.value !== "" && course.value !== ""){
        return course.value;
    }
    return "";
}

function validateLevelCourse(){
    let level = document.getElementById('selectLevel');
    let course = document.getElementById('selectCourse');
    if(level.value !== "" && course.value !== ""){
        return course.value;
    }
    return "";
}