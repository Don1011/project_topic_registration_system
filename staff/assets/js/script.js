//Code for displaying the 'register topic' form
var registerTopicForm = document.getElementById("registerTopic");
registerTopicForm.style.display = "none";
function showRegisterTopicForm(){
    registerTopicForm.style.display = "block";
}
function removeRegisterTopicForm(){
    registerTopicForm.style.display = "none";
}

//Code for displaying student login form
var studentLoginForm = document.getElementById("loginForm");
studentLoginForm.style.display = "none";
//loginFormButton
function showStudentLoginForm(){
    var loginFormButton = document.getElementById("loginFormButton");
    if(studentLoginForm.style.display === "none"){
        studentLoginForm.style.display = "block";
        loginFormButton.style.display = "none";
    }else{
        studentLoginForm.style.display = "none";
        loginFormButton.style.display = "inline";
    }
}
