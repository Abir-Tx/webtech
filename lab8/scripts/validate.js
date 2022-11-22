// File to validate the form in js

function validateForm() {
  var name = document.forms["myForm"]["name"].value;
  var username = document.forms["myForm"]["username"].value;
  var password = document.forms["myForm"]["password"].value;
  var email = document.forms["myForm"]["email"].value;
  var phone = document.forms["myForm"]["phone"].value;
  var address = document.forms["myForm"]["address"].value;
  var dob = document.forms["myForm"]["dob"].value;
  var country = document.forms["myForm"]["country"].value;
  // Name validation
  if (name == "") {
    document.getElementById("nameErr").innerHTML = "Name is required";
    return false;
  } else if (name.length < 3) {
    document.getElementById("nameErr").innerHTML =
      "Name must be at least 3 characters";
    return false;
  } else if (name.split(" ").length < 2) {
    document.getElementById("nameErr").innerHTML =
      "Name must be at least 2 words";
    return false;
  } else if (
    name.match(/^[0-9]/) ||
    name.match(/^[^a-zA-Z]/) ||
    name.match(/^[ ]/) ||
    name.match(/[ ]$/) ||
    name.match(/[ ]{2,}/)
  ) {
    document.getElementById("nameErr").innerHTML =
      "Name must start with a letter and can only contain letters, numbers, periods, dashes or underscores";
    return false;
  }

  //   email validation
  if (email == "") {
    document.getElementById("emailErr").innerHTML = "Email is required";
    return false;
  } else if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
    document.getElementById("emailErr").innerHTML = "Email is invalid";
    return false;
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
  //   if +880 is present in phone then truncate it
  if (phone.match(/^\+880/)) {
    phone = phone.substring(3);
  }

  //   Other validations
  if (phone == "") {
    document.getElementById("phoneErr").innerHTML = "Phone is required";
  }
  //   if phone is not numeric then show error
  else if (!phone.match(/^[0-9]+$/)) {
    document.getElementById("phoneErr").innerHTML = "Phone must be numeric";
  }
  //   if phone is less than 11 characters then show error
  else if (phone.length < 11) {
    document.getElementById("phoneErr").innerHTML =
      "Phone must be at least 11 characters";
  }
  //   if phone is greater than 14 characters then show error
  else if (phone.length > 12) {
    document.getElementById("phoneErr").innerHTML =
      "Phone must be less than 12 characters";
  }

  //   address validation
  if (address == "") {
    document.getElementById("addressErr").innerHTML = "Address is required";
  }
  //   if address is less than 10 characters then show error
  else if (address.length < 10) {
    document.getElementById("addressErr").innerHTML =
      "Address must be at least 10 characters";
  }
  //   if address is greater than 100 characters then show error
  else if (address.length > 100) {
    document.getElementById("addressErr").innerHTML =
      "Address must be less than 100 characters";
  }

  // validate dob
  if (dob == "") {
    document.getElementById("dobErr").innerHTML = "Date of birth is required";
  } else if (dob.match(/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/)) {
    var today = new Date();
    var birthDate = new Date(dob);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }
    if (age < 18) {
      document.getElementById("dobErr").innerHTML =
        "You must be at least 18 years old";
    }
  }

  // validate Education
  if (document.getElementById("ssc").checked == false) {
    document.getElementById("educationErr").innerHTML =
      "At least one education is required";
  }
  if (document.getElementById("hsc").checked == false) {
    document.getElementById("educationErr").innerHTML =
      "At least one education is required";
  }
  if (document.getElementById("bsc").checked == false) {
    document.getElementById("educationErr").innerHTML =
      "At least one education is required";
  }
  if (document.getElementById("msc").checked == false) {
    document.getElementById("educationErr").innerHTML =
      "At least one education is required";
  }

  // validate Country
  if (country == "none") {
    document.getElementById("countryErr").innerHTML = "Country is required";
  }
}
