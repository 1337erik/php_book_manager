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

                    This page should receive the values sent from addBook.html
                    and then generates a SQL INSERT statement and executes it. Then, a message should be displayed indicating
                    whether the INSERT statement execution was successful.
                */

                if( $_SERVER['REQUEST_METHOD'] == "POST" ){
                    include './dbconnect.php';

                    // var_dump( $_POST );
                    $title  = $_POST[ 'title'  ];
                    $author = $_POST[ 'author' ];
                    $year   = intval( $_POST[ 'year'] );

                    echo '<br/><br/>';
                    echo 'incoming data: <br/>';
                    echo gettype( $title ) . " title: " . $title . "<br/>";
                    echo gettype( $author ) . " author: " . $author . "<br/>";
                    echo gettype( $year ) . " year: " . $year . "<br/>";
                    echo '<br/><br/>';

                    $sql = "INSERT INTO Book ( BookTitle, BookFirstAuthor, BookYear )
                    VALUES ( '$title', '$author', '$year' )";
                    try {

                        $conn->exec( $sql );
                        echo 'Successfully added book!';
                    } catch( PDOException $e ){

                        echo 'Error Adding Row!' . "<br>" . $e->getMessage();
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
