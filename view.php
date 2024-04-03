<?php
    // include databade file 
    include 'inc/_db.php';

    // redirect to the home page if user wants to directly access the view page
    if (!isset($_GET['id'])) {
        header("Location: index.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
      
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
      <!-- Logo of the website //favicon -->
      <link rel="shortcut icon" href="images/notepad.png" type="image/x-icon">
      
      <!-- Google font -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  
    <!-- links for datatable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    
    <title>iNotes | View</title>
  </head>
  <body style="font-family: 'Dancing Script', cursive;">

    <!-- navbar starets -->
    <nav class="navbar navbar-light bg-light justify-content-between mb-2">
    <a class="navbar-brand" href="index.php"><img src="images/notebook.gif" alt="Logo of the website" style="height: 30px;"><b style="font-size: 30px; margin-left: 5px;">iNotes</b></a>
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
    </form>
    </nav>
    <!-- navbar ends -->
    
    <div class="container" style="min-height: 82vh;">
    <a style="font-size: 20px; text-decoration: none; color: black;" href="index.php"><img class="mr-2" src='images/left_arrow.gif' alt='logo of back to home page' style='height: 30px;'> Back to Home Page</a>
    <!-- jumbotron starts -->
    <?php
        $id=$_GET['id'];
        $sql="SELECT * FROM `notes` WHERE id='$id'";
        $result=mysqli_query($con, $sql);
        while ($row=mysqli_fetch_assoc($result)) {
    ?>
        <div class="jumbotron my-3" style="background-image: url('images/notebook_page1.jpg'); background-position: right; opacity: .78;">
        <h1 class="display-4"><?php echo $row['title'];?></h1>
        <p class="lead"><?php echo $row['description'];?></p>
        <br class="my-4">
        <p>Added on: <?php echo $row['timestamp'];?></p>
        </div>
    <?php
    }
    ?>
    <!-- jumbotron ends -->

    
    </div>
    
    <!-- Footer -->
    <footer class="page-footer font-small light">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2023 Copyright: Tanmoy Das/<a href="index.php" style="color:red; text-decoration: none;">iNotes.com</a> .All right reserved!
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
  </body>
</html>