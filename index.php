<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Atilla Seyid</title>   
    </head>
    <body>
        <?php
        session_start();
        $ar = array();
        $names = array();
        $picture = array();
        $desc = "";
        $desc1 = array();
        $flag = 0;
        if (($dataread = fopen("recipes.txt", "r")) !== FALSE) {

            while (($data = fgets($dataread)) !== FALSE) {
                if ($data[0] == '#') {
                    if ($flag == 1) {
                        array_push($desc1, $desc);
                        $desc = "";
                    }
                    array_push($names, substr($data, 1, strlen($data)));
                    $flag = 1;
                } else if ($data[0] == '*') {
                    array_push($picture, substr($data, 1, strlen($data)));
                } else {
                    $desc = $desc . $data . "<br>";
                }
            }
            array_push($desc1, $desc);
            $desc = "";
            $_SESSION['names'] = $names;
            $_SESSION['desc'] = $desc1;
            $_SESSION['picture'] = $picture;
        }
        ?>
        
        <!-- The Dropdown select menu -->
        <form method="post" action="index1.php" class="rec">
            <h1>The Cake Cooking Recipes</h1>
            <select  name="cakes" onchange="javascript:this.form.submit()">
                <?php
                $i = 0;
                ?>
                <option value="">Choose the cake</option>
                    <?php
                for ($j = 0; $j <= 6; $j++) {
                    ?>
                    <option value="<?php echo $j ?>"><?php echo $names[$j] ?>
                    </option>
                    <?php
                }
                ?>  
            </select>
            <input type="hidden" name="form_submitted" value="1" />       
        </form>
    </body>
</html>