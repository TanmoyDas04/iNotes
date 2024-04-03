<?php
if (isset($_POST['Edit_Note']) && isset($_GET['id'])) {
    $title=$_POST['Edit_title'];
    $description=$_POST['Edit_description'];
    $id=$_GET['id'];

    // include databade file 
    include '_db.php';

    // update data to the database
    $edit="UPDATE `notes` SET `title`='$title',`description`='$description',`timestamp`=current_timestamp() WHERE id='$id'";
    $rs=mysqli_query($con,$edit);

    // redirect to the view page
    header('Location: /iNotes/view.php?id='.$id);
}else{
    // redirect to the home page
    header('Location: /iNotes/index.php');
}
?>