



function editeTask(id){

    document.getElementById("task-delete-btn").style.display="block";
    document.getElementById("task-update-btn").style.display="block";
    document.getElementById("task-save-btn").style.display="none";
    task_title.value = document.getElementById("title" + id).getAttribute("data");
    
    task_date.value = document.getElementById("date" + id).getAttribute("data");

    task_description.value = document.getElementById("description" + id).getAttribute("data");
    
    if( document.getElementById("type" + id).getAttribute("data") == 1 ){
        task_type_feature.checked = true;
        task_type_bug.checked = false;
    }
    else {
        task_type_feature.checked = false;
        task_type_bug.checked = true;
    }

    task_priority.value = document.getElementById("priority" + id).getAttribute("data");
    task_status.value =  document.getElementById(id).getAttribute("data");

    task_id.value = id;


}


function addbtn(){
    document.getElementById("task-delete-btn").style.display="none";
    document.getElementById("task-update-btn").style.display="none";
    document.getElementById("task-save-btn").style.display="block";
    document.getElementById("form_task").reset();

}






