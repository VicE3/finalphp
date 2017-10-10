<!-- Add Names -->
<?php
$pageTitle = "Contact";
include("inc/nav.php");
?>


<?php
if(empty($_POST)) {
?>

<h1>Contact</h1>
    <form onSubmit="return validate()" name="formval" method="POST" action="contact.php">
   <div class="contactField"> 
<p>Please fill out this form in order to be contacted or to leave a comment</p>
</div>
 <div class="contactField">
   <label for="fname"> First name:</label>
    <input type="text" name="fname" id="fname">
  </div>
  <div class="contactField">
    <label for="lname"> Last name: </label> 
      <input type="text" name="lname" id="lname">
  </div>
  <div class="contactField">
    <label for="email"> Email:</label>
      <input class="space" type="text" name="email" id="email"></span>
  </div>  
  <div class="contactField">
    <label for="phone">Phone Number: </label> 
    <input  class="space" type="text" name="phone" id="phone">
  </div>
  <div class="contactField">
    <p>Please enter any comments or questions.</p>
  </div>
      <label for="comments">Comments/Questions:</label> 
      <textarea  name="comments" id="comments"></textarea>
      <input type="submit" value="submit">

</form>
<?php } else {
  ?>

<? }
?>    
    <?php
    try {
    $db = new PDO('mysql:dbname=finalphpProject;host=localhost', 'root', 'root');
    //If there are any errors this line will show you them
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $comments = 'INSERT INTO Contacts (comments, fname, lname, email, phone) VALUES (:comments, :fname, :lname, :email, :phone )';
    
    
    //prepare() preps a statement, in this case it is $products, for execution and returns a statement object
    $preparedComments = $db->prepare($comments);
    
    $preparedComments->bindParam(':comments', strip_tags($_POST['comments']));
    $preparedComments->bindParam(':fname', strip_tags($_POST['fname']));
    $preparedComments->bindParam(':lname', strip_tags($_POST['lname']));
    $preparedComments->bindParam(':email', strip_tags($_POST['email']));
    $preparedComments->bindParam(':phone', strip_tags($_POST['phone']));
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
    echo $e->getMessage();
    exit;
}
?>

<?php
include("inc/footer.php");
?>