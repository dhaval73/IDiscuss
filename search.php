<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>!Discuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="min-vh-100 m-0 p-0 d-flex flex-column">
    <?php
    require('./partial/_dbconnection.php');
    require('./partial/_header.php');
    ?>

    <!-- search for resuelts -->
    <div class="container col-md-8 my-3">
        <h1>Search resuelts for<em>"
                <?php echo $_GET['search_querry'] ?>"
            </em></h1>
        
            <?php
            $NoSearch=true;
            $search=$_GET['search_querry'];
            $sql = "SELECT * FROM `threads` WHERE MATCH(`thread_title`,`thread_decs`) AGAINST ('$search')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Query Error: " . mysqli_error($conn);
                die;
            }
           
            while ($row = mysqli_fetch_assoc($result)) {
                $NoSearch=false;
                $thread_id=$row['thread_id'];
                $thread_title=$row['thread_title'];
                $thread_decs=$row['thread_decs'];
                $url='threads.php?threadid='.$thread_id.'';
                echo '<div class="col py-3">
                <div class="flex-grow-1 ">
                    <h5> <a class="text-dark text-decoration-none " href="'.$url.'"> '.$thread_title.' </a></h5>
                </div>
                <div class="flex-grow-2 ">
                    '.$thread_decs.'
                </div>
            </div>';
            }

            if ($NoSearch) {
            echo '  
            <div class="container-fluid py-5 bg-light rounded-3">
                    <p class="col-md-10 fs-2">
                        No search result found
                    </p>
                    <hr>
                    <p class="col-md-10 fs-5">
                    <ul>
                    Suggestions:
                    <li>
                        Make sure that all words are spelled correctly.
                    </li>
                    <li>
                        Try different keywords.
                    </li>
                    <li>
                        Try more general keywords.
                    </li>
                    <li>
                        Try fewer keywords.
                    </li>
                    </ul>
                    </p>
        </div>';
            }
            ?>
           
    </div>

    <?php
    require('./partial/_footer.php')
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>