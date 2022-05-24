<!DOCTYPE html>
<html>
    <head>
        <title>WEB</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
            <li><a href="index.php?id=1">html</a></li>
            <li><a href="index.php?id=2">css</a></li>
            <li><a href="index.php?id=3">js</a></li>
        </ol>
        <?php
            if(empty($_GET['id'])){
                echo '<h2>Welcome</h2>Hello, WEB';
            }else if($_GET['id'] == '1'){
                echo '<h2>html</h2> html is ...';
            } else if($_GET['id'] == '2'){
                echo '<h2>css</h2> css is ...';
            } else if($_GET['id'] == '3'){
                echo '<h2>js</h2> js is ...';
            }  
        ?>
    </body>
</html>
