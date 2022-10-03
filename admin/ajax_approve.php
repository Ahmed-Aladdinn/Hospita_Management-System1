
<?php 


include("../includes/connection.php");


$id = $_POST['id'];

$query ="UPDATE doctors SET statuss='Approved' WHERE id='$id'";

mysqli_query($connect,$query);



?>