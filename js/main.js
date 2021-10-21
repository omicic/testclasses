let filepath = document.querySelector('.filepath');
let fileimage = document.querySelector('.fileimage');


let subj_to_dept_table = document.querySelector('.subj_to_dept_table');
let subj_to_dept_table_tbody = document.querySelector('.subj_to_dept_table tbody');
let subject_selection = document.querySelector('.subject_selection');

let btn_subject_to_department = document.querySelector('#add_subject_to_department_btn');
btn_subject_to_department.addEventListener('click', addToTable);
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
    //subject_dept.push(id);
  
    let text = `
    <tr id='${id}' name="row_subject">
        <th scope="row">${i++}</th>
        <td width="80%">${name}</td>
        <td><a href="edit_section.php?id=${id}" class="btn btn-sm btn-warning">Edit</a></td>
        <td><a href="edit_section.php?id=${id}" class="btn btn-sm btn-warning">Delete</a></td>
    </tr>
    `;

    subj_to_dept_table_tbody.innerHTML += text;
    //sendSubjectsForDepartment();
}

/* function sendSubjectsForDepartment(){
    
   var jsonString = JSON.stringify(subject_dept);
  
   $.ajax({
        type: "POST",
        url: "add_department.php",
        data: {result : jsonString}, 
        cache: false,

        success: function(){
           console.log(subject_dept);
        }
    });
} */




