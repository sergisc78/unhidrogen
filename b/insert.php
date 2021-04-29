<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop</title>

    <!--BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="styles/style.css" />

    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet" />

    <!--FONT AWESOME -->
    <link rel="stylesheet" href="src/fontawesome-free-5.13.1-web/css/all.min.css" />
</head>

<body>
    <?php

    include('config.php');

    $author = $_POST['author'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    if (isset($_POST['send'])) {

        $sql_book = "SELECT * FROM reviews WHERE author=? AND title=? ";

        $result = $connection->prepare($sql_book);

        $result->bindParam(1, $author); // S´ENVIA PER PARÀMETRE L´AUTOR
        $result->bindParam(2, $title); // S´ENVIA PER PARÀMETRE EL TÍTOL

        $result->execute();

        $count = $result->rowCount();

        if ($count != 0) { //IF TITLE EXIST
            echo "<div class='alert alert-danger' role='alert'>
                 <button type='button' class='close' data-dismiss='alert'>&times;</button>
                 <h3 id='message'>Sorry, but this book exists on the database !</h3>
                 </div>
                 <footer><i class='fas fa-copyright'></i> 2020 Sergi Sánchez </footer>";

            header("refresh:5;url=insert.html");
        } else { // ELSE, INSERT USER

            $sql_insert = "INSERT INTO REVIEWS (author,title, year, rating, review) VALUES (?,?,?,?,?)";

            $result2 = $connection->prepare($sql_insert);


            // S´ENVIEN PER PARÀMETRE LES DADES AUTOR, TÍTOL, ANY, PUNTUACIÓ I CRÍTICA
            $result2->bindParam(1, $author);
            $result2->bindParam(2, $title);
            $result2->bindParam(3, $year);
            $result2->bindParam(4, $rating);
            $result2->bindParam(5, $review);

            $result2->execute();

            echo "<div class='alert alert-success' role='alert'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <h3 id='message'>You´ve entered  $title from  $author .</h3>
                  </div>
                  <footer><i class='fas fa-copyright'></i> 2020 Sergi Sánchez </footer>";

            header("refresh:5;url=opcions.php");
        }
    }

    ?>

    <!--BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>