<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>!Discuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php
    require('./partial/_dbconnection.php');
    require('./partial/_header.php');
    ?>

    <div id="homeslider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeslider" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homeslider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homeslider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="./img/slide1.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item " data-bs-interval="5000">
                <img src="./img/slide2.jfif" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item " data-bs-interval="5000">
                <img src="./img/slide3.jfif" class="d-block w-100" alt="...">
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#homeslider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeslider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-4 col-md-8">
        <h2 class="text-center my-3">!Discuss - Browes Categry</h2>
        <div class="row d-flex ">
            <?php

            $sql = 'SELECT * FROM `categary`';
            $result = mysqli_query($conn, $sql);
            //     echo $row['categary_id'];
            //     echo $row['categary_name'];
            //     echo $row['categary_discription'];
            $img_no=0;
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['categary_id'];
                $cat = $row['categary_name'];
                $disc = $row['categary_discription'];
                $img_no=($img_no%4) +1;
                
                echo ' 
                <div class="col-md-4 my-3 d-flex justify-content-around">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/cart'.$img_no.'.jfif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a  class="text-decoration-none text-dark" href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                            <p class="card-text">' . substr($disc, 0, 90) . '...</p>
                            <a href="threadlist.php?catid=' . $id . '" class="btn btn-success">View therads</a>
                        </div>
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