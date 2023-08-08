<?php
session_start();
echo '<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php">!Discuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Top Category
                </a>
                <ul class="dropdown-menu">';
                $sql = "SELECT categary_id,categary_name FROM `categary`LIMIT 5";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo'
                    <li><a class="dropdown-item" href="threadlist.php?catid=' . $row['categary_id'] . '">'.$row['categary_name'].'</a></li>
                    ';
                }
            echo '</ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>


        <form class="d-flex" role="search" action="search.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search here" name="search_querry" aria-label="Search">
            <button class="btn btn-success me-2" type="submit">Search</button>
        </form>';



if (isset($_SESSION['user_login']) && $_SESSION['user_login'] == true) {
    echo '
            <div class="d-flex">
            <p class="text-light my-auto mx-2 ">WelCome ' . $_SESSION['user_name'] . '<p>
            </div>
            <a href="partial/_logout.php" class="btn btn-outline-success me-2">Logout</a>
            ';
} else {
    echo '
            <button class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#loginmodal">login</button>
            <button class="btn btn-outline-success nav-item" data-bs-toggle="modal" data-bs-target="#signupmodal">Sign Up</button>
            ';
}
echo '</div>
</div>
</nav>';



include('./partial/_loginmodal.php');
include('./partial/_signupmodal.php');
if (isset($_GET['ShowAlert'])) {
    echo '<div class="alert alert-success alert-dismissible fade show m-0" role="alert">
    <strong>Success!</strong> ' . $_GET['ShowAlert'] . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

}
if (isset($_GET['ShowError'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
    <strong>Error!</strong> ' . $_GET["ShowError"] . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>