
function submission(){
  let project = document.forms["Projects"]["Project Names"].value;
  if(project == "Select"){
    alert("You have not selected a Project yet.");
  }
  if (project == "prj1"){
    window.location.assign("prj1.html");
  }
  if(project == "prj2"){
    window.location.assign("prj2.html");
  }
}

function protect(){
  var password = "frankbutt";
  var input = prompt("Enter Password to View Transcript.");

  if(input == password){
    window.location.assign("transcript.html");
  }
  else {
    alert("Incorrect Password, Try Again.")
  }
}
