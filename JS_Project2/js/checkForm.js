function checkForm(form)
{
  if(this.firstname.value == "") {
    alert("Please enter your Name in the form");
    this.name.focus();
    return false;
  }
  if(this.email.value == "" || !this.valid_email.checked) {
    alert("Please enter a valid Email address");
    this.email.focus();
    return false;
  }
  if(this.image.value == "" || !this.valid_age.checked) {
    alert("Please enter an Age between 16 and 100");
    this.age.focus();
    return false;
  }
  alert("Success!  The form has been completed, validated and is ready to be submitted...");
  return false;
}
