<!DOCTYPE html>
<html>
    <!-- DOCUMENT HEAD SECTION -->
    <head>
        <meta charset = "UTF-8" >
        <title>News article site</title>
        <link rel = "stylesheet" type = "text/css" href = "style.css" >
    </head>
    <!-- DOCUMENT BODY SECTION -->
    <body>
        <!-- HEADER SECTION -->
        <header>
            <h1>News article prototype site</h1>
        </header>
        <!-- AUTHORS SECTION -->
        <section class = "authors">
            <h2>Article authors:</h2>
            <!-- NUMERIC AUTHORS LIST-->
            <ol>
                <!-- PHP CODE -->
                <?php
                    //Connection variables
                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "news";
                    //Connection variable
                    $connect = mysqli_connect($host, $username, $password, $database);
                    //SQL query variable
                    $query = "SELECT name, surname from authors";
                    //Result for authors list
                    $result = mysqli_query($connect, $query);
                    //Reading lines returned from database
                    while($row = mysqli_fetch_array($result)){
                        echo "<li>$row[name] $row[surname]</li>";
                    }
                    //Closing connection
                    mysqli_close($connect);
                ?>
            </ol>
        </section>
        <!-- ARTICLES SECTION -->
        <section class = "articles">
            <h2>Articles list:</h2>
            <!-- NUMERIC ARTICLES LIST -->
            <ol>
                <!-- PHP CODE -->
                <?php
                    //Connection variables
                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "news";
                    //Connection variable
                    $connect = mysqli_connect($host, $username, $password, $database);
                    //SQL query variable
                    $query = "SELECT title from articles";
                    //Result for authors list
                    $result = mysqli_query($connect, $query);
                    //Reading lines returned from database
                    while($row = mysqli_fetch_array($result)){
                        echo "<li>$row[title]</li>";
                    }
                    //Closing connection
                    mysqli_close($connect);
                ?>
            </ol>
        </section>
        <!-- GETTING ARTICLES BY ID SECTION -->
        <section class = "getArticleById">
            <h2>Search for articles</h2>
            <!-- FORM FOR SEARCHING ARTICLES -->
            <form method = "POST">
                <!-- ARTICLE ID INPUT -->
                Article's id:<input type = "number" name = "id"/><br>
                <!-- SEARCH BUTTON -->
                <br><button type = "submit">SEARCH</button>
            </form>
            <!-- PHP CODE -->
            <?php
                //Getting rid of errors (undefined index)
                //error_reporting(0);
                //Connection variables
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "news";
                //Connection variable
                $connect = mysqli_connect($host, $username, $password, $database);
                //Getting variables from form
                $id = $_POST['id'];
                    if(isset($id)){
                    //SQL query variable for article
                    $query = "SELECT title, article, article_date FROM articles WHERE id = $id";
                    //SQL query variable for authors
                    $query2 = "SELECT name, surname FROM authors au RIGHT JOIN articles_authors aa ON (au.id = aa.author_id) LEFT JOIN articles a ON (a.id = aa.article_id) WHERE a.id = $id";
                    //Result for article
                    $result = mysqli_query($connect, $query);
                    //Result for authors
                    $result2 = mysqli_query($connect, $query2);
                    //Article database row
                    $row = mysqli_fetch_array($result);

                    echo "<h3>$row[title]</h3><br>$row[article]<br><br>";

                    //Authors database row loop
                    while($row2 = mysqli_fetch_array($result2)){
                        echo "$row2[name] $row2[surname]<br>";
                    }
                    echo "<br><br>$row[article_date]";
                }
                mysqli_close($connect);
            ?>
        </section>
    </body>
</html>