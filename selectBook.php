<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Select A Book</title>

        <link rel="stylesheet" href="/assets/styles.css" />
    </head>
    <body>

        <main>
            <h1>Select A Book</h1>

            <?php /*

                    This page should have a drop-down list box that contains a list
                    of all book titles. There should be a “Delete” button on this page too. When the user clicks the “Delete” button,
                    the BookID of the selected book should be passed to the page deleteBook.php.
                */
                include './dbconnect.php';

                try {

                    $sql = "SELECT * FROM Book";
                    $statement = $conn->prepare( $sql );
                    $statement->execute();

                    $statement->setFetchMode( PDO::FETCH_ASSOC );
                    $books = $statement->fetchAll();
                    // var_dump( $books );

                    ?>

                    <form method="post" action="./deleteBook.php" style="margin-top:25px">

                        <select class="bookselect" id="bookSelected" name="bookid">


                        <?php foreach( $books as $book ): ?>

                            <option value="<?= $book[ 'BookID' ]; ?>"><?= $book[ 'BookTitle' ]; ?></option>
                        <?php endforeach; ?>

                        </select>

                        <button class="btn deletebtn" type="submit" style="margin-top:15px">Delete</button>
                    </form>
                    <?php
                } catch( PDOException $e ){

                    echo 'Error Grabbing Books!' . "<br>" . $e->getMessage();
                }
            ?>


            <div style="height:55px"></div>
            <a href="/addBook.html" class="mainlink">Add a Book</a>
            <a href="/index.html" class="mainlink">Back Home</a>
            <a href="/retrieveBooks.php" class="mainlink">See all Books</a>
        </main>
    </body>
</html>