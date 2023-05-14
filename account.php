<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel= "stylesheet" type= "text/css" href= "css/style-ac.css">
</head>
<body>
    <div class="wrapper bg-black mt-sm-5">
      <form method="POST" action="includes/user.inc.php" enctype="multipart/form-data">
        <h4 class="pb-4 border-bottom">Account <?php echo $_SESSION["name"] . " " . $_SESSION["surname"] ?> Settings</h4>

        <div class="py-2">
            <div class="row py-2">
                <div class="col-md-6"><input type="email" name="email" class="bg-light form-control" placeholder="Email"></div>



                <div class="error" style="color: red;">Email is taken</div>
            </div>
            <div class="row py-2">

                <div class="col-md-6 pt-md-0 pt-3"><input type="text" name="name" class="bg-light form-control" placeholder="Name"></div><br>

                <div class="error" style="color: red;">Username is taken</div>
            </div>
            <div class="row py-2">
                <div class="col-md-6 pt-md-0 pt-3"><input type="text" name="surname" class="bg-light form-control" placeholder="Surname"></div>
            </div>
            <?php
            echo '
                  <input type="hidden" name="user">
                  <input type="hidden" name="id" value="' . $_SESSION["id"] . '">';
            ?>
            <div class="py-3 pb-4 border-bottom"> <input type="submit" name="submit" value="Submit" class="btn btn-primary mr-3">  </div>

        </div>
        </form>
        <a  href="courses.php" style="text-decoration:none;"><button class="btn border button">Go back</button></a>
    </div>
</body>
</html>
