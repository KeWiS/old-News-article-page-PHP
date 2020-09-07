<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8" >
        <title>News article site</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css" >
    </head>
    <body>
        <header>
            <h1>News article prototype site</h1>
        </header>
        <section class = "authors">
            <h2>Article authors:</h2>
            <ul>
                <?php
                    //Connection variables
                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "news";
                    //Connection variable
                    $connect = mysqli_connect($host, $username, $password, $database);
                    //Query for authors list variable
                    $query = mysqli_query($connect, "SELECT id, name, surname from authors");
                    //Reading lines returned from database
                    while($row = mysqli_fetch_array($query)){
                        echo "<li>$row[id]. $row[name] $row[surname]</li>";
                    }
                    //Closing connection
                    mysqli_close($connect);
                ?>
            </ul>
        </section>
    </body>
</html>