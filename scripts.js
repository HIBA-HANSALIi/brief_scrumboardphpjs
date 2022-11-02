
// function edit(id){
//     document.getElementById("task-id").value=id
//     document.getElementById("task-delete-btn").style.display="block";
//     document.getElementById("task-update-btn").style.display="block";
//     document.getElementById("task-save-btn").style.display="none";
//     document.getElementById("task-title").value = document.getElementById("task_name"+id).getAttribute('data');
//     document.getElementById("task-priority").value=document.getElementById("priority"+id).getAttribute('priority');
//     document.getElementById("task-status").value=document.getElementById(id).getAttribute("data-status");
//     document.getElementById("task-date").value=document.getElementById("task_date"+id).getAttribute('date');
//     document.getElementById("task-description").value = document.getElementById("task_description"+id).getAttribute('desc');
//     if(document.getElementById("type"+id).getAttribute("type")==1 ){
//         (document.getElementById("task-type-feature").checked = true)
//     }else{
//         document.getElementById("task-type-bug").checked = true
//     }
// }



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
    document.getElementById("form-task").reset();

}















// function edit(element){
    
//     let infos = element.children[0].innerHTML.split(",");
//     //console.log(document.getElementById('task-priorityU').value);

//     document.getElementById("task-id").value = infos[0];
//     document.getElementById('task-title').value = infos[1];

//     let type =document.getElementById('task-type-feature').value =infos[2];
// (type=='feature')?document.getElementById('task-type-feature').checked=true :document.getElementById('task-type-bug').checked=true;
//     document.getElementById('task-type-feature').value =infos[2];
//     document.getElementById('task-priority').children[0].innerHTML=infos[3];
    
// let Status=document.getElementById('task-status').value =infos[4];;
// if (Status=='To Do'){
//     document.getElementById('todo').selected=true ;
// }
//     else if(Status=='In Progress'){
//         document.getElementById('inprogress').selected=true ;
// }
// else if(Status=='Done'){
//     document.getElementById('done').selected=true ;
// }


//     document.getElementById('task-date').value = infos[5];
//     document.getElementById('task-description').value = infos[6];


// }
