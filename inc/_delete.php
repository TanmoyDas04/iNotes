<!-- deleteing the note -->
<?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        
        // include databade file 
        include '_db.php';

        // delete data from database
        $del="DELETE FROM `notes` WHERE id='$id'";
        $rs=mysqli_query($con,$del);

        // redirect to the home page
        header('Location: /iNotes/index.php');
    }else{
        // redirect to the home page
        header('Location: /iNotes/index.php');
    }
?>