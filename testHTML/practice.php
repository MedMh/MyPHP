<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <form method="POST" action="practice.php">
                <textarea name="script"></textarea>
                <input type="submit" value="Run">
            </form>
        </div>
        <div>
            <?php
                if(isset($_POST['script'])){
                    $code = $_POST['script'];
                    echo eval($code);
                }
            ?>
        </div>   
    </body>
</html>
