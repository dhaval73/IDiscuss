<?php 
require('./partial/_dbconnection.php');
?>
<?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categary` WHERE `categary_id`='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cat = $row['categary_name'];
    $disc = $row['categary_discription'];
    ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>!Discuss-<?php echo $cat; ?> theread</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php
    
    require('./partial/_header.php');
    ?>
    

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_SESSION['user_login']) && $_SESSION['user_login'] == true) 
        {

        
        $th_user_id=$_SESSION['user_id'];
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title=str_replace('<','&lt;',$th_title);
        $th_title=str_replace('>','&gt;',$th_title);

        $th_desc=str_replace('<','&lt;',$th_desc);
        $th_desc=str_replace('>','&gt;',$th_desc);


        $sql = "INSERT INTO `threads` ( `thread_title`, `thread_decs`, `thread_cat_id`, `thread_user_id`) VALUES ('$th_title', '$th_desc', '$id', '$th_user_id');";
        $result = mysqli_query($conn, $sql);
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your thread is added waiting for community respond.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        ';
    }
    }

    ?>
    <div class="container mb-4 col-md-9">
        <div class="py-3 px-5 my-3 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-6 fw-bold mb-3">Welcome to
                    <?php echo $cat; ?> thread
                </h1>
                <p class="col-md-10 fs-5">
                    <?php echo $disc; ?>
                </p>
                <hr>
                <p class="fs-3 fw-bold">Rules </p>
                <p class="col-md-10 fs-6">Keep it friendly.
                    Be courteous and respectful. Appreciate that others may have an opinion different from yours.
                    Stay on topic. When creating a new discussion thread, give a clear topic title and put your post in
                    the appropriate category. When contributing to an existing discussion, try to stay 'on topic'. If
                    something new comes up within a topic that you would like to discuss, start a new thread.
                    Share your knowledge. Don't hold back in sharing your knowledge – it's likely someone will find it
                    useful or interesting. When you give information, provide your sources.
                    Refrain from demeaning, discriminatory, or harassing behaviour and speech.</p>
                <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
            </div>
        </div>
    </div>


    <div class="container mb-4 col-md-9">
        <div class="py-3 px-5 my-3 bg-light rounded-3">
            <h1 class="my-3">Ask a Question</h1>
            <?php
            if (isset($_SESSION['user_login']) && $_SESSION['user_login'] == true) {
                echo '
                <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Thread Title</label>
                    <input type="text" maxlength="150" name="title" class="form-control" id="title" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Make sure it is sort and meaningful.</div>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control resizing-none" name="desc" id="desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
                ';
            }
            else{
                echo '<p class="col-md-10 fs-5">
                    You are not logged in. Please login to post question.
                </p>';
            }
            ?>
         
        </div>
    </div>
    <div class="container mt-4 col-md-9 ">
        <div class="py-3 px-5 my-3 bg-light rounded-3">

        <h1 class="my-3">Browes Question</h1>
        <?php
        // $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE `thread_cat_id`='$id'";
        $result = mysqli_query($conn, $sql);
        $Nothread = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $Nothread = false;
            $t_id = $row['thread_id'];
            $t_title = $row['thread_title'];
            $t_decs = $row['thread_decs'];
            $t_user_id = $row['thread_user_id'];
            $t_post_time = $row['timestamp'];
            $date = new DateTime($t_post_time);
            $t_post_time = $date->format("d/m/y h:i A");
            // echo $t_user_id;

            $sql2="SELECT * FROM `users` WHERE `user_id`='$t_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_name = $row2['user_name'];
            echo '<div class="d-flex p-2 m-3 bg-white rounded-3 " >
            <a>
            <div class="flex-shrink-0" >
                <img src="./img/usericon.png" width="50px" alt="...">
            </div>
            <div class="col">
                <div class="flex-grow-2 ms-3 ">
                <span class=" fs-8 fw-bold">
                '.$user_name.'
                </span>
                     at '.$t_post_time.'
                     <hr class="m-0 mb-2 mt-1 col-md-4 ">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h5><a class="text-dark text-decoration-none " href="threads.php?threadid=' . $t_id . '">' . $t_title . '</a></h5>
                </div>
                <div class="flex-grow-2 ms-3">
                <a class="text-dark text-decoration-none " href="threads.php?threadid=' . $t_id . '">'  . $t_decs .'</a>
                </div>
                </div>
        </div>
        
        ';
        }

        if ($Nothread) {
            echo '  
            <div class="py-3 px-5 my-3 bg-light rounded-3">
                <div class="container-fluid py-5">
                    <p class="col-md-10 fs-2">
                        No Threades Found
                    </p>
                    <hr>
                    <p class="col-md-10 fs-5">
                        Be the first person to aks Question.
                    </p>
                </div>
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