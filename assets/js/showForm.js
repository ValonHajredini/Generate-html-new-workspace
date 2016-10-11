/**
 * Created by hajre on 10/11/2016.
 */
function showForm(){
    $("#new_project_form").css("display",'block');
    $("#new_form_button").css("display",'none');
}

function ifDelete(dir){
    if (confirm("are you sure to delete this project ->[ " + dir + " ]")){
        document.getElementById("myForm").submit();
}else {
    return false;
    }
}