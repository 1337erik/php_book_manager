<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>All Books</title>

        <link rel="stylesheet" href="/assets/styles.css" />
    </head>
    <body>

        <main>
            <h1>All Books</h1>

            <?php /*

                    This page should display a list of all books in the Book table.
                    The list should include all the table Book columns.
                */
                include './dbconnect.php';

                try {

                    $sql = "SELECT * FROM Book";
                    $statement = $conn->prepare( $sql );
                    $statement->execute();

                    $statement->setFetchMode( PDO::FETCH_ASSOC );
                    $books = $statement->fetchAll();
                    // var_dump( $books );

                    foreach( $books as $book ): ?>

                        <div class="bookcard">

                            <p><b>ID:</b> <?= $book[ 'BookID' ]; ?></p>
                            <p><b>Title:</b> <?= $book[ 'BookTitle' ]; ?></p>
                            <p><b>Author:</b> <?= $book[ 'BookFirstAuthor' ]; ?></p>
                            <p><b>Year:</b> <?= $book[ 'BookYear' ]; ?></p>
                        </div>
                    <?php
                    endforeach;
                } catch( PDOException $e ){

                    echo 'Error Grabbing Books!' . "<br>" . $e->getMessage();
                }
            ?>


            <div style="height:55px"></div>
            <a href="/addBook.html" class="mainlink">Add a Book</a>
            <a href="/index.html" class="mainlink">Back Home</a>
            <a href="/selectBook.php" class="mainlink">Select a Book</a>
        </main>
    </body>
</html>