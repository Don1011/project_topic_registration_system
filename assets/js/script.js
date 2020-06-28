//Code for displaying the 'register topic' form

function showRegisterTopicForm(){
    var registerTopicForm = document.getElementById("registerTopic");
    registerTopicForm.className = "";
}
function removeRegisterTopicForm(){
    var registerTopicForm = document.getElementById("registerTopic");
    registerTopicForm.className = "display_none";
}
 
//Code for displaying student login form

//loginFormButton
function showStudentLoginForm(){
    var studentLoginForm = document.getElementById("loginForm");
    var loginFormButton = document.getElementById("loginFormButton");
    studentLoginForm.className = "";
    loginFormButton.className = "nav-item nav-link nav_button display_none";
}
function removeStudentLoginForm(){
    var studentLoginForm = document.getElementById("loginForm");
    var loginFormButton = document.getElementById("loginFormButton");
    studentLoginForm.className = "display_none";
    loginFormButton.className = "nav-item nav-link nav_button";
}

//Code To Clear Search Input
function clearSearchInput(){
    var inputField = document.getElementById("searchInput");
    inputField.value = "";
}