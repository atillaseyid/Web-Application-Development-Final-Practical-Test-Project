<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Recipes</title>
    </head>

    <?php
    if ((isset($_POST['form_submitted']))) {
        session_start();


        
        $name = $_SESSION['names'];
        $picture = $_SESSION['picture'];
        $desc = $_SESSION['desc'];
        $i = (int) $_POST['cakes'];
        ?>
        <h2><?php echo $name[$i] ?></h2>
        <br>
        <div class="Picture">
            <img  class = "product_image" src="<?php echo $picture[$i] ?>" width="300px" height="300px">;
        </div>
        <br>
        <h1>Here is the recipe of chosen cake:</h1>
        <div class="itemDesc">

            <p><?php echo $desc[$i] ?></p>
        </div>
        
        <!-- For turning back -->
        <div class="buttons">
            <button class = "back" type="button" onclick="sessionStorage.clear();window.location.href = 'index.php'">Back</button>
        </div>
        

        <?php
    }
    else
    {
        header("Location: index.php");
    }
    ?>
</html>