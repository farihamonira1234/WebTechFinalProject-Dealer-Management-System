function emptyValidation() {
  var fname = document.getElementById("firstname").value;
  var email = document.getElementById("email").value;
  if (fname == "" || email == "") {
    alert("Fill out name")
    return false;
  }
}