<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Chiemi Recipe</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
            <section class="chiemi-recipe">
            <?php
           
            $servername = getenv('chiemi-cloned-chiemik.c9users.io');
            $username = 'chiemik';
            $password = "";
            $database = "c9";
            $dbport = 3306;
            $dbname = "project3";

            $db = new mysqli($servername, $username, $password, $database, $dbport);
            
            if ($db->connect_error) {
                die("Connection Failed: " . $db->connect_error);
            }
            
            echo ("Connected Successfully: " . $db->host_info);
            
            mysqli_select_db($db, $dbname);
            
            if (empty($result)) {
                $sql = "CREATE TABLE ChiemiRecipe(
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    menue VARCHAR(30) NOT NULL ,
                    recipe VARCHAR(3000) NOT NULL
                    )";
                    
            if ($db->query($sql) === TRUE) {
                print_r("<br>Table ChiemiRecipe was created successfully.");
            } else {
                print_r("<br>OK: " . $db->error);
            }
                    
            }
            
            $menue = mysqli_real_escape_string($db, $_POST['Menue']);
            $recipe = mysqli_real_escape_string($db, $_POST['Recipe']);
          
            $recipe_insert = "INSERT INTO ChiemiRecipe (menue, recipe) VALUES ('$menue', '$recipe' )";
            
            if (mysqli_query($db, $recipe_insert)) {
                print_r("<br>Record added successfully.");
            } else {
                print_r("<br>" . mysqli_error($db));
            }
            
            print_r("<h1> Current Chiemi's Menue</h1>");
            
            $sql = "SELECT  id, menue, recipe FROM ChiemiRecipe";
            $reciperesult = $db->query($sql);

            if ($reciperesult->num_rows > 0) {
              
                while ($row = $reciperesult->fetch_assoc()) {
                echo "Menu ID: " . $row["id"] . "<br> Menue: " . $row["menue"] . "<br> Recipe: " . $row["recipe"] . "<br><br>";
                }
                
            } else {
                print_r("<br>No results to display.");
            }
 
            $db->close();
            ?>

            <a href="../index.html">Back to Form</a>

       </section>
        <script src="../js/main.js"></script>
    </body>
</html