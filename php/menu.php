<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Gourmet List</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
            <section class="chiemi-recipe">
                
            <a href="../index.html">Back to Form</a>   
            <br>
                
            <?php
           
            $servername = getenv('chiemi-cloned-chiemik.c9users.io');
            $username = 'chiemik';
            $password = "";
            $database = "c9";
            $dbport = 3306;
            $dbname = "project3";

            $db = new mysqli($servername, $username, $password, $database, $dbport);

            mysqli_select_db($db, $dbname);
            
            $menu = mysqli_real_escape_string($db, $_POST['menue']);
            $recipe =  mysqli_real_escape_string($db, $_POST['recipe']);
          
            $recipe_insert = "INSERT INTO ChiemiRecipe (menue, recipe) VALUES ('$menue', '$recipe' )";
           
            print_r("<h1> Current Gourmet Menu</h1>");

            $sql = "SELECT  id, menue, recipe FROM ChiemiRecipe";
            $reciperesult = $db->query($sql);

            if ($reciperesult->num_rows > 0) {
              
                while ($row = $reciperesult->fetch_assoc()) {
                echo "Gourmet ID: " . $row["id"] . "<br> Menue: " . $row["menue"] . "<br> Recipe: " . $row["recipe"] . "<br><br>";
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