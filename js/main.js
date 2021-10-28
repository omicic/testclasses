let filepath = document.querySelector('.filepath');
let fileimage = document.querySelector('.fileimage');

//for sending subjects to add_department.php
let inputHiddenArray = document.querySelector('.inputArraySubjects');


let subj_to_dept_table = document.querySelector('.subj_to_dept_table');
let subj_to_dept_table_tbody = document.querySelector('.subj_to_dept_table tbody');

let registerNameInput = document.querySelector('.register_name');
let register_description = document.querySelector('.add_department_description');
let subject_selection = document.querySelector('.subject_selection');

//let regitster_name = document.querySelector(`input[name='register_name']`);

//regitster_name.addEventListener('input', updateValue);

function updateValue(e) {
 e.target.value;
}

let btn_subject_to_department = document.querySelector('#add_subject_to_department_btn');
btn_subject_to_department.addEventListener('click', addToTable);
let new_department = {
    'name' : '',
    'description':'',
    'subjects' : []
};

let subject_dept = [];
let i=1;



if(filepath){
    filepath.onchange = evt => {
        const [file] = filepath.files
        if (file) {
            fileimage.src = URL.createObjectURL(file)
        }
      }
}

function addToTable(){

    //console.log(subject_selection.value);
    let id = subject_selection.value;
    let name = subject_selection.options[subject_selection.selectedIndex].text;
    subject_dept.push(id);
    //console.group(subject_dept);
  
    let text = `
    <tr id='${id}' name="row_subject">
        <th scope="row">${i++}</th>
        <td width="80%">${name}</td>
        <td><a href="edit_section.php?id=${id}" class="btn btn-sm btn-warning">Edit</a></td>
        <td><a href="edit_section.php?id=${id}" class="btn btn-sm btn-warning">Delete</a></td>
    </tr>
    `;

    subj_to_dept_table_tbody.innerHTML += text;

    new_department = {
        'name' : registerNameInput.value,
        'description':register_description.value,
        'subjects' : subject_dept
    };

    console.log(JSON.stringify(new_department));

    inputHiddenArray.value = JSON.stringify(new_department);
 
}





