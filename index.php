<?php
include 'inc/_db.php';
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
    
    <title>iNotes | Home</title>
  </head>
  <body style="font-family: 'Dancing Script', cursive;">

    <!-- navbar starets -->
    <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="index.php"><img src="images/notebook.gif" alt="Logo of the website" style="height: 30px;"><b style="font-size: 30px; margin-left: 5px;">iNotes</b></a>
    <form class="form-inline" action="search.php" method="post">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="SearchText">
        <input name="Search" value="Search" class="btn btn-outline-danger my-2 my-sm-0" type="submit">
    </form>
    </nav>
    <!-- navbar ends -->
    
    <div class="container">

    <!-- jumbotron starts -->
    <div class="jumbotron my-4" style="background-image: url('images/blog-banner.jpeg'); background-position: center;">
    <h1 class="display-4">Welcome to iNotes</h1>
    <p class="lead" style="font-size:25px;">Add your notes by clicking the below button.</p>
    <!-- <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> -->
    <p class="lead">
        <form action="index.php" method="post">
            <input type="submit" class="btn btn-danger btn-lg" role="button" value="Add" name="Add">
        </form>
        </p>
    </div>
    <!-- jumbotron ends -->

    <!-- Add note section starts-->
    <?php
        if(isset($_POST['Add'])){
    ?>
    <form class="mb-3" action="inc/_add.php" method="post">
        <div class="mb-3">
                <label for="email" class="form-label">Note Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="Enter title of note">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Note Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Enter description of note"></textarea>
            </div>
            <input type="submit" class="btn btn-danger" value="Add Note" name="Add_Note">
        </div>
    </form>
    <?php
        }
    ?>
    <!-- Add note section ends-->

    <!-- displaying list of notes -->
    <div class="container mt-5 my-3">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Added on</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $sql="SELECT * FROM `notes`";
        $result=mysqli_query($con, $sql);
        $sno=1;
        while ($row=mysqli_fetch_assoc($result)) {
            $id=$row['id'];
            ?>
            <tr>
            <th scope='row'><?php echo $sno; ?></th>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
            <td><a href='view.php?id=<?php echo $id; ?>'><img src='images/eye.gif' alt='logo of view' style='height: 30px;'></a></td>
            <td><a href='edit.php?id=<?php echo $id; ?>'><img src='images/edit.gif' alt='logo of edit' style='height: 30px;'></a></td>
            <td><a onclick="confirm('Are you sure for delete the <?php echo $row['title']; ?> note ?');" href='inc/_delete.php?id=<?php echo $id; ?>'><img src='images/bin-file.gif' alt='logo of delete' style='height: 30px;'></a></td>
            </tr>
            <?php
            $sno+=1;
        }
    ?>
            </tbody>
        </table>
    </div>
    </div>
    
    <!-- Footer -->
    <footer class="page-footer font-small light">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2023 Copyright: <b style="color:red; text-decoration: none; cursor: pointer;">Tanmoy Das</b> .All right reserved!
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