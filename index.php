<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSI 127b</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center">COSI 127b</h1><br>
        <h3 style="text-align:center">Connecting Front-End to MySQL DB</h3><br>
    </div>
    <!-- <div class="container">
        <form id="ageLimitForm" method="post" action="index.php">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter minimum age" name="inputAge" id="inputAge">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="submitted" id="button-addon2">Query</button>
                </div>
            </div>
        </form>
    </div> -->

    

    <div class="container">
        <form id="movies" method="post" action="index.php">
             <button class="btn btn-primary" type="submit" name="view_movies" id="button-movie">View all movies</button>
            
        </form>
    </div>
    <div class="container">
        <form id="actors" method="post" action="index.php">
             <button class="btn btn-primary" type="submit" name="view_actors" id="button-actor">View all actors</button>
        </form>
    </div>

    <form>
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Jane Doe">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="username" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name = "username" placeholder="18">
        </div>
        
        <div class="form-group">
            <label for="movies">Example multiple select</label>
            <select multiple class="form-control" id="movies" name="movies">
            <option>Movie1</option>
            <option>Movie2</option>
            <option>Movie3</option>
            </select>
        </div>
    </form>
    <div class="container">
        <form id="likes" method="post" action="index.php">
             <button class="btn btn-primary" type="submit" name="collect_likes" id="button-actor">Press here to like this movie</button>
        </form>
    </div>

    <div class="container">
        <!-- <h1>Guests</h1>
        <?php
        // we want to check if the submit button has been clicked (in our case, it is named Query)
        if(isset($_POST['submitted']))
        {
            // set age limit to whatever input we get
            // ideally, we should do more validation to check for numbers, etc. 
           $ageLimit = $_POST["inputAge"]; 
        }
        else
        {
            // if the button was not clicked, we can simply set age limit to 0 
            // in this case, we will return everything
            $ageLimit = 0;
        }

        // we will now create a table from PHP side 
        echo "<table class='table table-md table-bordered'>";
        echo "<thead class='thead-dark' style='text-align: center'>";

        // initialize table headers
        // YOU WILL NEED TO CHANGE THIS DEPENDING ON TABLE YOU QUERY OR THE COLUMNS YOU RETURN
         echo "<tr><th class='col-md-2'>Firstname</th><th class='col-md-2'>Lastname</th></tr></thead>";

        // generic table builder. It will automatically build table data rows irrespective of result
        class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
                return "<td style='text-align:center'>" . parent::current(). "</td>";
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "</tr>" . "\n";
            }
        }

        // SQL CONNECTIONS
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "COSI127b";

        try {
            // We will use PDO to connect to MySQL DB. This part need not be 
            // replicated if we are having multiple queries. 
            // initialize connection and set attributes for errors/exceptions
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare statement for executions. This part needs to change for every query
            $stmt = $conn->prepare("SELECT first_name, last_name FROM guests where age>=$ageLimit");

            // execute statement
            $stmt->execute();

            // set the resulting array to associative. 
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            // for each row that we fetched, use the iterator to build a table row on front-end
            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                echo $v;
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        echo "</table>";
        // destroy our connection
        $conn = null;
    
    ?> -->

    <?php
    if(isset($_POST['view_movies'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "COSI127b";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT MotionPicture.id, MotionPicture.name, Movie.mpid, MotionPicture.rating, MotionPicture.production, MotionPicture.budget, Movie.box_office_collection, MotionPicture.likes FROM Movie JOIN MotionPicture ON Movie.mpid = MotionPicture.id");

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            echo "<div class='container'>";
            echo "<h1>Movies</h1>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-2'> Name </th><th class='col-md-2'>MPID</th><th class='col-md-2'>Rating</th><th class='col-md-2'>Production</th><th class='col-md-2'>Budget</th><th class='col-md-2'>Box Office Collection</th></thead>";

            while($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td style='text-align:center'>" . $row['name'] . "</td>";
                echo "<td style='text-align:center'>" . $row['mpid'] . "</td>";
                echo "<td style='text-align:center'>" . $row['rating'] . "</td>";
                echo "<td style='text-align:center'>" . $row['production'] . "</td>";
                echo "<td style='text-align:center'>" . $row['budget'] . "</td>";
                echo "<td style='text-align:center'>" . $row['box_office_collection'] . "</td>";
                echo "<td style='text-align:center'>" . $row['likes'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }
    ?>

    <?php
        if(isset($_POST['view_actors'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "COSI127b";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT People.name, People.nationality, People.dob, People.gender FROM People JOIN Role ON People.id = Role.pid WHERE Role.role_name = 'actor'");

                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                echo "<div class='container'>";
                echo "<h1>Actors</h1>";
                echo "<table class='table table-md table-bordered'>";
                echo "<thead class='thead-dark' style='text-align: center'>";
                echo "<tr><th class='col-md-2'> Name </th><th class='col-md-2'>Nationality</th><th class='col-md-2'> Date of Birth</th><th class='col-md-2'>Gender</th></tr></thead>";

                while($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td style='text-align:center'>" . $row['name'] . "</td>";
                    echo "<td style='text-align:center'>" . $row['nationality'] . "</td>";
                    echo "<td style='text-align:center'>" . $row['dob'] . "</td>";
                    echo "<td style='text-align:center'>" . $row['gender'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    ?>
    <div>

</body>
</html>
