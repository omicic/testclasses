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

//from add_department.view.php
let btn_section_to_department = document.querySelector('#add_section_to_department_btn');
if(btn_section_to_department){
    btn_section_to_department.addEventListener('click', addToTable);
}


let new_department = {
    'name' : '',
    'description':'',
    'sections' : []
};

//from show_department_section.view.php
let add_section_btn = document.querySelector('#add_section_btn');
//console.log(add_section_btn);
add_section_btn.addEventListener('click', addToTable);
//let section_selection = document.querySelector('.section_selection');

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

function addToTable(e){

    console.log(this.id);
    if(this.id=="add_section_btn"){
        sections=[];
    }
    let id = subject_selection.value;
    let name = subject_selection.options[subject_selection.selectedIndex].text;
    subject_dept.push(id);
    console.group(subject_dept);
  
    let text = `
    <tr id='${id}' name="row_subject">
        <th scope="row">${i++}</th>
        <td width="80%">${name}</td>
        <td><a href="edit_section.php?id=${id}" class="btn btn-sm btn-warning">Delete</a></td>
    </tr>
    `;

    subj_to_dept_table_tbody.innerHTML += text;

    if(this.id=="add_section_to_department_btn"){
        new_department = {
            'name' : registerNameInput.value,
            'description':register_description.value,
            'sections' : subject_dept
        };
        inputHiddenArray.value = JSON.stringify(new_department);
    }else{
        sections.push(subject_dept);
    }
 

    console.log(sections);

    
 
}





