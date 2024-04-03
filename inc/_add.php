<?php
if (isset($_POST['Add_Note'])) {
    $title=$_POST['title'];
    $description=$_POST['description'];

    // include databade file 
    include '_db.php';

    // add data to the database
    $ins="INSERT INTO `notes`(`title`, `description`, `timestamp`) VALUES ('$title','$description',current_timestamp())";
    $rs=mysqli_query($con,$ins);

    // redirect to the home page
    header('Location: /iNotes/index.php');
}else{
    // redirect to the home page
    header('Location: /iNotes/index.php');
}
?>