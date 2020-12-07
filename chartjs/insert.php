<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Your page title here :)</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>

<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="twelve columns" style="margin-top: 10%">
        <h1>Ohjelmoijakysely</h1>
        <?php
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $experience_years = $_POST['experience_years'];
        $programming = $_POST['programming'];
        $web_frontend = $_POST['web_frontend'];
        $web_backend = $_POST['web_backend'];
        $mobile_native = $_POST['mobile_native'];
        $mobile_hybrid = $_POST['mobile_hybrid'];
        $relational_database = $_POST['relational_database'];
        $nosql_database = $_POST['nosql_database'];

        define('DB_HOST', '127.0.0.1');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'programmer_query');

        //get connection
        $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if(!$mysqli)
        {
        	die("Connection failed: " . $mysqli->error);
        }
        $sql = "INSERT INTO programmer_data(age,gender,experience_years,programming,web_frontend,web_backend,mobile_native,mobile_hybrid,relational_database,nosql_database)
        VALUES ($age,$gender,$experience_years,$programming,$web_frontend,$web_backend,$mobile_native,$mobile_hybrid,$relational_database,$nosql_database)";

        if ($mysqli->query($sql) === TRUE)
        {
          echo "<p>Tietojen lisäys tietokantaan onnistui</p>";
        }
        else
        {
          echo "<p>Error: " . $sql . "<br/>" . $mysqli->error;
        }

        //close connection
        $mysqli->close();
        ?>
        <a href="record-count.html" class="button">Katso tulokset</a>
      </div>
    </div>
  </div>

  <!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>

</html>
