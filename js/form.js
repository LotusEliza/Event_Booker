
function myFunction() {
    
    //*****************email validation*************************
    
    var email = $("#email").val();
    var n = email.includes("@");

    if(email !== "" && n !== false){
      alert('Right')
    }
    else {
        alert("email must be filled out and contain @");
    }

    //***********password validation*****************
    
    var pwd = $("#pwd").val();
    
} 