<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Gourmet List</title>
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
            
            $menu = mysqli_real_escape_string($db, $_POST['menue']);
            $recipe =  mysqli_real_escape_string($db, $_POST['recipe']);
          
            $recipe_insert = "INSERT INTO ChiemiRecipe (menue, recipe) VALUES ('$menue', '$recipe' )";
            
            if (mysqli_query($db, $recipe_insert)) {
                print_r("<br>Record added successfully.");
            } else {
                print_r("<br>" . mysqli_error($db));
            }
          
            $db->close();

            ?>
            <br>
            <br>            
            <a href="../php/menu.php">Next to Result</a>

       </section>
        <script src="../js/main.js"></script>
    </body>
</html
