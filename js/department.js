let edit_department_form=document.querySelector('.edit_department_form');
let edit_sections_form=document.querySelector('.edit_sections_form');
let next_btn=document.querySelector('.next_btn');
let back_btn=document.querySelector('.back_btn');

next_btn.addEventListener('click', editSectionsForDepartment);
back_btn.addEventListener('click', backSectionsForDepartment);

function editSectionsForDepartment(){
    console.log('next');
    edit_department_form.classList.remove('d-block');
    edit_department_form.classList.add('d-none');
    edit_sections_form.classList.remove('d-none');
    edit_sections_form.classList.add('d-block');
    next_btn.classList.add('disabled');
    back_btn.classList.remove('disabled');
}

function backSectionsForDepartment(){
    console.log('back');
    edit_sections_form.classList.remove('d-block');
    edit_sections_form.classList.add('d-none');
    edit_department_form.classList.remove('d-none');
    edit_department_form.classList.add('d-block'); 
    next_btn.classList.remove('d-none');
    next_btn.classList.remove('disabled');
    next_btn.classList.add('d-block');  
    back_btn.classList.add('disabled');
}

