<?php
    // include databade file 
    include 'inc/_db.php';

    // redirect to the home page if user wants to directly access the search page
    if (!isset($_POST['Search'])) {
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
    
    <title>iNotes | Search</title>
  </head>
  <body style="font-family: 'Dancing Script', cursive;">

    <!-- navbar starets -->
    <nav class="navbar navbar-light bg-light justify-content-between mb-2">
    <a class="navbar-brand" href="index.php"><img src="images/notebook.gif" alt="Logo of the website" style="height: 30px;"><b style="font-size: 30px; margin-left: 5px;">iNotes</b></a>
    <form class="form-inline" action="search.php" method="post">
        <input class="form-control mr-sm-2" type="search" value="<?php echo $_POST['SearchText']; ?>" aria-label="Search" name="SearchText" placeholder="Search">
        <input name="Search" value="Search" class="btn btn-outline-danger my-2 my-sm-0" type="submit">
    </form>
    </nav>
    <!-- navbar ends -->
    
    <div class="container" style="min-height: 82vh;">
    <a style="font-size: 20px; text-decoration: none; color: black;" href="index.php"><img class="mr-2" src='images/left_arrow.gif' alt='logo of back to home page' style='height: 30px;'> Back to Home Page</a>
    <!-- body starts -->
    <div class="row">
    <?php
        $noresults=true;
        $search_text=$_POST['SearchText'];
        $search="SELECT * FROM `notes` WHERE MATCH(title,description) against ('$search_text')";
        $rs=mysqli_query($con,$search);
        while($row=mysqli_fetch_assoc($rs)){
            $noresults=false;
    ?>
        <!-- card starts -->
        <div class="col-md-4 my-3">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://source.unsplash.com/500x400/?coding,<?php echo $row["title"];?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["title"];?></h5>
              <p class="card-text"><?php echo substr($row["description"],0, 100);?>...</p>
              <a href="view.php?id=<?php echo $row['id'];?>" class="btn btn-danger">See more</a>
            </div>
          </div>
        </div>
        <?php } ?>
            </div>
        <?php if($noresults) {?>
                <!-- jumbotron starts -->
                <div class="jumbotron my-4" style="background-image: url('images/No_results.jpg'); background-position: right; background-repeat: no-repeat;">
                    <h1 class="display-4">Oops!!</h1>
                    <p class="lead" style="font-size:25px;">No Results Found.</p>
                    <hr class="my-4">
                    <p>Suggestions:
                    <ol>
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</li>
                    </ol>
                    </p>
                    <!-- <p class="lead">
                        <form action="index.php" method="post">
                            <input type="submit" class="btn btn-danger btn-lg" role="button" value="Add" name="Add">
                        </form>
                        </p> -->
                </div>
                <!-- jumbotron ends -->
            <?php } ?>
        <!-- card ends -->

    <!-- body ends -->

    
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