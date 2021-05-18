<?php 
    require './functions.php';

    $allLocs = getAll('locations');
    $locCount = count(getAll('locations'));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <h1>All <?=$locCount?> locations from the database.</h1> 
            <button onclick="window.location.href='../index.php'">Go to characters</button>
        </header>
        <div id="container">
            <ul>
                <?php foreach($allLocs as $loc) { ?> 
                    <li>
                        <button class="delete" onclick="window.location.href='./locations.php?delete=<?=$loc['id']?>'"><i class="fas fa-trash-alt"></i>Delete</button>
                        <span><?=$loc["name"]?></span>
                    </li>    
                <?php 
                }

                if(isset($_GET['delete'])) {
                    deleteLocation($_GET['delete']);
                    header('Refresh:0 locations.php?success=true'); 
                    echo '<script>alert(\'Succesfully deleted location\')</script>';
                }
                
            
            ?>    
            </ul>     







            <form method="POST">
                <input name="location" placeholder="Put location here&hellip;"></input>
                <button type="submit" name="submit">Add location</button>
            </form>
            <?php
                if(isset($_POST['location'])){
                    $newLoc = $_POST['location'];
                    if(strlen($newLoc) < 1){
                        header('Refresh:0locations.php?success=false'); 
                        echo '<script>alert(\'Empty input\')</script>';
                    }
                    else {   
                        AddLocation($newLoc);
                        header('Refresh:0 locations.php?success=true'); 
                        echo '<script>alert(\'Succesfully added location\')</script>'; 
                    }
                }
            ?>
        </div>
        <footer>&copy; Ricardo Froeliger & Enrique Groeneveld 2021</footer>
    </body>
</html>