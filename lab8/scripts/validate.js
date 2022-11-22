// File to validate the form in js

function validateForm() {
  var name = document.forms["myForm"]["name"].value;
  var username = document.forms["myForm"]["username"].value;
  var password = document.forms["myForm"]["password"].value;
  var email = document.forms["myForm"]["email"].value;
  var phone = document.forms["myForm"]["phone"].value;
  var address = document.forms["myForm"]["address"].value;

  // Name validation
  if (name == "") {
    document.getElementById("nameErr").innerHTML = "Name is required";
  } else if (name.length < 3) {
    document.getElementById("nameErr").innerHTML =
      "Name must be at least 3 characters";
  } else if (name.split(" ").length < 2) {
    document.getElementById("nameErr").innerHTML =
      "Name must be at least 2 words";
  } else if (
    name.match(/^[0-9]/) ||
    name.match(/^[^a-zA-Z]/) ||
    name.match(/^[ ]/) ||
    name.match(/[ ]$/) ||
    name.match(/[ ]{2,}/)
  ) {
    document.getElementById("nameErr").innerHTML =
      "Name must start with a letter and can only contain letters, numbers, periods, dashes or underscores";
  }

  //   email validation
  if (email == "") {
    document.getElementById("emailErr").innerHTML = "Email is required";
  } else if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
    document.getElementById("emailErr").innerHTML = "Email is invalid";
  }

  //   username validation
  if (username == "") {
    document.getElementById("usernameErr").innerHTML = "Username is required";
  }
  //   if username is greater than 2 words then show error
  else if (username.split(" ").length > 1) {
    document.getElementById("usernameErr").innerHTML =
      "Username must be only one word";
  }
  //   if username is less than 2 characters then show error
  else if (username.length < 2) {
    document.getElementById("usernameErr").innerHTML =
      "Username must be at least 2 characters";
  }
  //   if username is greater than 20 characters then show error
  else if (username.length > 20) {
    document.getElementById("usernameErr").innerHTML =
      "Username must be less than 20 characters";
  }
  //   if username is not alphanumeric then show error
  else if (!username.match(/^[a-zA-Z0-9]+$/)) {
    document.getElementById("usernameErr").innerHTML =
      "Username must be alphanumeric";
  }

  //   password validation
  if (password == "") {
    document.getElementById("passwordErr").innerHTML = "Password is required";
  }
  //   if password is less than 8 characters then show error
  else if (password.length < 8) {
    document.getElementById("passwordErr").innerHTML =
      "Password must be at least 8 characters";
  }
  //   if password is greater than 20 characters then show error
  else if (password.length > 20) {
    document.getElementById("passwordErr").innerHTML =
      "Password must be less than 20 characters";
  }
  //   if password is not alphanumeric then show error
  else if (!password.match(/^[a-zA-Z0-9]+$/)) {
    document.getElementById("passwordErr").innerHTML =
      "Password must be alphanumeric";
  }

  //   phone validation
}
