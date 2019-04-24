<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>

        <link rel="stylesheet" href="/assets/styles.css" />
    </head>
    <body>

        <main>

            <?php /*

                This page should receive the values sent from selectBook.php
                and generate a SQL DELETE statement and execute it. Then, a message should be displayed indicating whether
                the DELETE statement execution was successful.
            */

                if( $_SERVER['REQUEST_METHOD'] == "POST" ){
                    include './dbconnect.php';

                    // var_dump( $_POST );
                    $bookid = $_POST[ 'bookid' ];

                    echo '<br/><br/>';
                    echo 'incoming data: <br/>';
                    echo gettype( $bookid ) . " bookid: " . $bookid . "<br/>";
                    echo '<br/><br/>';

                    $sql = "DELETE FROM Book WHERE BookID=$bookid";
                    try {

                        $conn->exec( $sql );
                        echo 'Successfully deleted book!';
                    } catch( PDOException $e ){

                        echo 'Error Deleting Book!' . "<br>" . $e->getMessage();
                    }
                } else {

                    echo '<h1>Invalid Request</h1>';
                }
                echo '<br/><br/>';
                echo '<a href="/addBook.html" class="mainlink">Add Another</a>';
                echo '<a href="/index.html" class="mainlink">Go Home</a>';
                echo '<a href="/retrieveBooks.php" class="mainlink">See All Books</a>';
                echo '<a href="/selectBook.php" class="mainlink">Select A Book</a>';
            ?>
        </main>
    </body>
</html>