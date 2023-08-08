


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>!Discuss-python theread</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php
    require('./partial/_dbconnection.php');
    require('./partial/_header.php');
    ?>
    <?php
    $id = $_GET['threadid'];
    ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['user_login']) && $_SESSION['user_login'] == true) 
        {
        $comment = $_POST['comment'];
        $comment_user_id=$_SESSION['user_id'];

        $comment=str_replace('<','&lt;',$comment);
        $comment=str_replace('>','&gt;',$comment);

        $sql = "INSERT INTO `comments` (`comment_desc`, `thread_id`, `user_id`) VALUES ('$comment', '$id', '$comment_user_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your Comment is successful.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
            ';
        } else {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Your comment is not added. Please contact us.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
            ';
        }
    }
    }
    ?>

    <?php
    $sql = "SELECT * FROM `threads` WHERE `thread_id`='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $t_id = $row['thread_id'];
        $t_title = $row['thread_title'];
        $t_decs = $row['thread_decs'];
        $t_user_id = $row['thread_user_id'];
        $t_post_time = $row['timestamp'];
        $date = new DateTime($t_post_time);
        $t_post_time = $date->format("d/m/y h:i A");
    }
    $qsql2="SELECT * FROM `users` WHERE `user_id`='$t_user_id'";
    $qresult2 = mysqli_query($conn, $qsql2);
    $qrow2 = mysqli_fetch_assoc($qresult2);
    $quser_name = $qrow2['user_name'];
    ?>


    <div class="container mb-4 col-md-9">
        <div class="py-3 px-5 my-3 bg-light rounded-3">
            <div class="container-fluid pt-5">
                <p class="col-md-10 fs-2 fw-bold">
                    <?php echo $t_title; ?>
                </p>
                <p class="col-md-10 fs-5">
                    <?php echo $t_decs; ?>
                </p>
                <hr>

                <div class="col-md-10 ">
                <span class=" fs-8 fw-bold">
                    Posted By : 
                </span>
                <span class=" fs-8 ">
                    <?php
                        echo ''.$quser_name.' at '.$t_post_time.'';
                    ?>
                </span> 
                </div>
                
                <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
            </div>
        </div>
    </div>

    <div class="container mb-4 col-md-9">
        <div class="py-3 px-5 my-3 bg-light rounded-3">
            <h1 class="my-3">Make a Comment</h1>
            <?php
            if (isset($_SESSION['user_login']) && $_SESSION['user_login'] == true) {
                echo '
                <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                <div class="mb-3">
                    <!-- <label for="desc" class="form-label">Make a Comment</label> -->
                    <textarea class="form-control resizing-none" name="comment" id="desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit comment</button>
            </form>
                ';
            } else {
                echo '<p class="col-md-10 fs-5">
                    You are not logged in. Please login to post comment.
                </p>';
            }
            ?>

        </div>
    </div>

    <div class="container mb-4 col-md-9">
        <div class="py-3 px-5 my-3 bg-light rounded-3">

            <h1 class="my-3">Discussion</h1>
            <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE `thread_id`='$id'";
            $result = mysqli_query($conn, $sql);
            $NoComment = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $NoComment = false;
                $u_id = $row['user_id'];
                $comment_desc = $row['comment_desc'];

                $sql2="SELECT * FROM `users` WHERE `user_id`='$u_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $user_name = $row2['user_name'];
                echo '
            <div class="d-flex align-items-center my-4 p-2 bg-white rounded-3">
            <div class="flex-shrink-0">
                <img src="./img/usericon.png" width="50px" alt="...">
            </div>
            <div class="col">
                <div class="flex-grow-1 ms-3">
                    <h5>'.$user_name.'</h5>
                </div>
                <div class="flex-grow-2 ms-3">
                   ' . $comment_desc . '
                </div>
            </div>
        </div>';
            }

            if ($NoComment) {
                echo '  
                <div class="container-fluid py-5">
                    <p class="col-md-10 fs-2">
                        No Comment Found
                    </p>
                    <hr>
                    <p class="col-md-10 fs-5">
                        Be the first person to Comment .
                    </p>
        </div>';
            }
            ?>
        </div>
    </div>


    <?php
    require('./partial/_footer.php')
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>