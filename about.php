<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>!Discuss-About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="min-vh-100 m-0 p-0 d-flex flex-column">
    <?php
    require('./partial/_dbconnection.php');
    require('./partial/_header.php');
        ?>

<section class="card mb-5 container mt-4 col-md-9 ">
  <div class="card-header card-info">
    <h2>About Idescuss</h2>
  </div>
  <div class="card-body ">
    <p>Idiscuss is a forum for programmers to come together and discuss all things coding.</p>
    <p>We were founded in 2023 by a group of experienced programmers who wanted to create a community where programmers of all levels could come together and learn from each other.</p>
    <p>We believe that everyone has something to learn from everyone else, and we're committed to creating a welcoming and supportive environment for everyone.</p>
    <p>If you're a programmer, we encourage you to join our community and start contributing today!</p>
    <p>Here are some of the things that make Idescuss unique:</p>
    <ul>
      <li>We have a wide range of topics, covering everything from programming languages to web development to game development.</li>
      <li>We have a large and active community of programmers of all levels.</li>
      <li>We offer a variety of features to help you learn and grow as a programmer, including:</li>
        <ul>
          <li>Question and answer forums</li>
          <li>Coding challenges</li>
          <li>Tutorials</li>
          <li>Blog posts</li>
          <li>Live coding sessions</li>
        </ul>
      <li>We're committed to creating a welcoming and supportive environment for everyone.</li>
    </ul>
    <p>We hope you'll join us on Idescuss and become part of our community!</p>
  </div>
</section>


    <?php
    require('./partial/_footer.php')
        ?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</html>