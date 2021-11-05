
let subjects_dept = [];
let i=1;
let new_department = {
    'name' : '',
    'description':'',
    'sections' : []
};

let filepath = document.querySelector('.filepath');
let fileimage = document.querySelector('.fileimage');

//for sending subjects to add_department.php
let inputHiddenArray = document.querySelector('.inputArraySubjects');

// for sending subjects to show_department_sections.php
let inputHidden = document.querySelector('.inputHidden');


let subj_to_dept_table = document.querySelector('.subj_to_dept_table');
let subj_to_dept_table_tbody = document.querySelector('.subj_to_dept_table tbody');

let registerNameInput = document.querySelector('.register_name');
let register_description = document.querySelector('.add_department_description');
let subject_selection = document.querySelector('.subject_selection');

let dep_name = document.querySelector('.dep_name');

function updateValue(e) {
 e.target.value;
}

//from add_department.view.php
let btn_section_to_department = document.querySelector('#add_section_to_department_btn');
if(btn_section_to_department){
    btn_section_to_department.addEventListener('click', addToTable);
    getSectionsFromTable();
}

if(filepath){
    filepath.onchange = evt => {
        const [file] = filepath.files
        if (file) {
            fileimage.src = URL.createObjectURL(file)
        }
      }
}

function addToTable(e){

    if(this.id=="add_section_btn"){
        sections=[];
    }
    let id = subject_selection.value;
    let name = subject_selection.options[subject_selection.selectedIndex].text;
    subjects_dept.push(id);
  
    let text = `
    <tr id='${id}' name="row_subject">
        <th scope="row">${i++}</th>
        <td width="80%">${name}</td>
        <td><a href="edit_section.php?id=${id}" class="btn btn-sm btn-warning">Delete</a></td>
    </tr>
    `;

    subj_to_dept_table_tbody.innerHTML += text;

    new_department = {
            'name' : registerNameInput.value,
            'description':register_description.value,
            'sections' : subjects_dept
        };
    inputHiddenArray.value = JSON.stringify(new_department);
 
}

