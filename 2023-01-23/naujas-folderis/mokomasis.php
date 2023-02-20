<?php


echo $_POST['name'];
echo $_POST['age'];


?>

    <!-- <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Click</a> -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST">
   <div>
    <label for="name">Name:</label>
    <input type="text" name="name">
   </div>
   <div>
    <label for="age">Age:</label>
    <input type="text" name="age">
   </div>
   <input type="submit" name="submit" value="submit">
    </form>
<?php
$x = 0;

while($x < 10) {
  if ($x == 4) {
    $x++;
    continue;
  }
  echo "The number is: $x <br>";
  $x++;
} 
echo date('m/Y/d')


?>
© <?php echo date("h:i:sa");?>
<?php
$int = 100;
echo "</br>";
if (filter_var($int, FILTER_VALIDATE_INT) !== true) {
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
  echo "</br>";
}
?>


 
