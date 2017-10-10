function validate() {
    //Setting html first name, last name, email, and phone equal to variables so that I can refer to them in java script.
    //This says look at the html form named 'formval', set the value of the field (fname lname email and phone) on that form equal to var.
    var  fname = document.forms['formval'] ['fname'].value;
    var  lname = document.forms['formval'] ['lname'].value;
    var  email = document.forms['formval'] ['email'].value;
    var  phone = document.forms['formval'] ['phone'].value;
    
    if(fname === "") {
      alert("First Name is not filled out. Please enter your first name.");
    }
    
    if(lname.length === 0) {
      alert("Last Name is not filled out. Please enter your last name");
    }
    
    if(!email.match(/^[a-zA-Z0-9\.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+$/)) {
        alert("Please enter a valid email.")
      }
      
      if(!phone.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)) {
        alert("Please enter a valid phone number.")
      }
    
    }
$("formval").ready(function() {
  $("formval").validate();
})

    
    function added() {
     
      var  number =  document.forms['addToCart'] ['numOfItems'].value;
        alert("You have added " + number + " item to your cart");
    }
   