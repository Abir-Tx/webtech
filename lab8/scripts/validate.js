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

  var validatePassed = false;
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
  } else {
    document.getElementById("nameErr").innerHTML = "";
    validatePassed = true;
  }

  //   email validation
  if (email == "") {
    document.getElementById("emailErr").innerHTML = "Email is required";
    return false;
  } else if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
    document.getElementById("emailErr").innerHTML = "Email is invalid";
    return false;
  } else {
    document.getElementById("emailErr").innerHTML = "";
    validatePassed = true;
  }

  //   username validation
  if (username == "") {
    document.getElementById("usernameErr").innerHTML = "Username is required";
    return false;
  } else if (username.split(" ").length > 1) {
    document.getElementById("usernameErr").innerHTML =
      "Username must be only one word";
    return false;
  } else if (username.length < 2) {
    document.getElementById("usernameErr").innerHTML =
      "Username must be at least 2 characters";
    return false;
  } else if (username.length > 20) {
    document.getElementById("usernameErr").innerHTML =
      "Username must be less than 20 characters";
    return false;
  } else if (!username.match(/^[a-zA-Z0-9]+$/)) {
    document.getElementById("usernameErr").innerHTML =
      "Username must be alphanumeric";
    return false;
  } else {
    document.getElementById("usernameErr").innerHTML = "";
    validatePassed = true;
  }

  //   password validation
  if (password == "") {
    document.getElementById("passwordErr").innerHTML = "Password is required";
    return false;
  } else if (password.length < 8) {
    document.getElementById("passwordErr").innerHTML =
      "Password must be at least 8 characters";
    return false;
  } else if (password.length > 20) {
    document.getElementById("passwordErr").innerHTML =
      "Password must be less than 20 characters";
    return false;
  } else if (!password.match(/^[a-zA-Z0-9]+$/)) {
    document.getElementById("passwordErr").innerHTML =
      "Password must be alphanumeric";
    return false;
  } else {
    document.getElementById("passwordErr").innerHTML = "";
    validatePassed = true;
  }

  //   phone validation if +880 is present in phone then truncate it
  if (phone.match(/^\+880/)) {
    phone = phone.substring(3);
  }

  //   Other validations
  if (phone == "") {
    document.getElementById("phoneErr").innerHTML = "Phone is required";
    return false;
  } else if (!phone.match(/^[0-9]+$/)) {
    document.getElementById("phoneErr").innerHTML = "Phone must be numeric";
    return false;
  } else if (phone.length < 11) {
    document.getElementById("phoneErr").innerHTML =
      "Phone must be at least 11 characters";
    return false;
  } else if (phone.length > 12) {
    document.getElementById("phoneErr").innerHTML =
      "Phone must be less than 12 characters";
    return false;
  } else {
    document.getElementById("phoneErr").innerHTML = "";
    validatePassed = true;
  }

  //   address validation
  if (address == "") {
    document.getElementById("addressErr").innerHTML = "Address is required";
    return false;
  } else if (address.length < 10) {
    document.getElementById("addressErr").innerHTML =
      "Address must be at least 10 characters";
    return false;
  } else if (address.length > 100) {
    document.getElementById("addressErr").innerHTML =
      "Address must be less than 100 characters";
    return false;
  } else {
    document.getElementById("addressErr").innerHTML = "";
    validatePassed = true;
  }

  // validate dob
  if (dob == "") {
    document.getElementById("dobErr").innerHTML = "Date of birth is required";
    return false;
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
      return false;
    }
  } else {
    document.getElementById("dobErr").innerHTML = "";
    validatePassed = true;
  }

  // validate Education
  var eduValidated = false;
  if (document.getElementById("ssc").checked == false) {
    document.getElementById("educationErr").innerHTML =
      "At least one education is required";
    eduValidated = true;
  } else {
    document.getElementById("educationErr").innerHTML = "";
    validatePassed = true;
  }
  if (document.getElementById("hsc").checked == false) {
    document.getElementById("educationErr").innerHTML =
      "At least one education is required";
    eduValidated = true;
  } else {
    document.getElementById("educationErr").innerHTML = "";
    validatePassed = true;
  }

  if (document.getElementById("bsc").checked == false) {
    document.getElementById("educationErr").innerHTML =
      "At least one education is required";
    eduValidated = true;
  } else {
    if ((eduValidated = true)) {
      document.getElementById("educationErr").innerHTML = "";
      validatePassed = true;
    } else return false;
  }

  if (document.getElementById("msc").checked == false) {
    document.getElementById("educationErr").innerHTML =
      "At least one education is required";
    return false;
  } else {
    document.getElementById("educationErr").innerHTML = "";
    validatePassed = true;
  }

  // validate Country
  if (country == "none") {
    document.getElementById("countryErr").innerHTML = "Country is required";
    return false;
  } else {
    document.getElementById("countryErr").innerHTML = "";
    validatePassed = true;
  }

  // if all validation passed then return true
  if (validatePassed) {
    return true;
  }
}
