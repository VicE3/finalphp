<?php

$comment = !empty($_POST['comments']) ? $_POST['comments'] : '';
$fname = !empty($_POST['fname']) ? $_POST['fname'] : '';
$lname = !empty($_POST['lname']) ? $_POST['lname'] : '';
$email = !empty($_POST['email']) ? $_POST['email'] : '';
$phone = !empty($_POST['phone']) ? $_POST['phone'] : '';


$pageTitle = "Contact";
include("inc/nav.php");
?>


<?php
if(empty($_POST)) {
?>

<h1>Contact</h1>
  <form onSubmit="return validate()" name="formval" method="POST" action="contact.php" class="contactForm">
   <p>Please fill out this form in order to be contacted or to leave a comment</p>
  <label for="fname"> First name</label>
    <input class="contactBox" type="text" name="fname" id="fname">
  <label for="lname"> Last name </label> 
      <input class="contactBox" name="lname" id="lname">
  <label for="email"> Email</label>
      <input class="contactBox" type="text" name="email" id="email">
  <label for="phone">Phone Number</label> 
    <input  class="contactBox" type="text" name="phone" id="phone">
  <p>Please enter any comments or questions.</p>
  <label for="comments">Comments/Questions</label> 
      <textarea class="contactBox" name="comments" id="comments"></textarea>
  <input type="submit" value="submit" class="contactSubmit">
  </form>
<div class="commentContainer">
<?php } else {
  ?>

<?php }
?>    
    <?php
    try {
    $db = new PDO('mysql:dbname=vechevarria_challenge;host=localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP');
    // $db = new PDO('mysql:dbname=finalphpProject;host=localhost', 'root', 'root');
    //If there are any errors this line will show you them
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $comments = 'INSERT INTO Contacts (comments, fname, lname, email, phone) VALUES (:comments, :fname, :lname, :email, :phone )';
    
    
    //prepare() preps a statement, in this case it is $products, for execution and returns a statement object
    $preparedComments = $db->prepare($comments);
    
    $preparedComments->bindParam(':comments', strip_tags($comment));
    $preparedComments->bindParam(':fname', strip_tags($fname));
    $preparedComments->bindParam(':lname', strip_tags($lname));
    $preparedComments->bindParam(':email', strip_tags($email));
    $preparedComments->bindParam(':phone', strip_tags($phone));
    $preparedComments->execute();
//ADD IN NAMESSSSS
// only select what you want
    $gettingComments = 'SELECT * FROM Contacts ORDER BY contact_id DESC';
    $displayingComments = $db->prepare($gettingComments);
    $displayingComments->execute();
    
   foreach($displayingComments->fetchAll() as $comm) {
    
    
     if(!empty($_POST)) { 
    echo "
    <div class=comment>
      <p class=comment>{$comm['fname']} said {$comm['comments']}</p>
    </div>
    ";
     }
  }

    // if an exception occurs, it will get passed to the catch block and php will execute the code inside the catch block
} catch (Exception $e) {
    echo "Sorry this page is not working, Please try again later.";
    exit;
}
  
?>
</div>

<?php
include("inc/footer.php");
?>