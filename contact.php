<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>!Discuss-Contect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="min-vh-100 m-0 p-0 d-flex flex-column">
    <?php
    require('./partial/_dbconnection.php');
    require('./partial/_header.php');
    ?>
    <div class="container col-md-6 my-5 p-5 bg-light rounded-3">
        <div class="mb-3">
            <h2 class="text-center my-3">Contact Us</h2>
        </div>
        <hr>
        <form action="partial/_contacthandal.php" method="post">
            <div class="mb-3">
                <label for="cont_name" class="form-label">Name</label>
                <input type="text" name="cont_name" class="form-control" id="cont_name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="cont_mobile" class="form-label">Mobile No</label>
                <input type="text" name="cont_mobile" class="form-control" id="cont_mobile" aria-describedby="emailHelp">
            </div>
            
            <div class="mb-3">
                <label for="cont_email" class="form-label">Email address</label>
                <input type="email" name="cont_email" class="form-control" id="cont_email" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="cont_mobile" class="form-label">Subject</label>
                <input type="text" name="cont_sub" class="form-control" id="cont_mobile" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control" name="cont_message" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php
    require('./partial/_footer.php')
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>