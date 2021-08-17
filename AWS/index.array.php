<?php
$list = array(
    array('id'=>1, 'title'=>'html'),
    array('id'=>2, 'title'=>'css'),
    array('id'=>3, 'title'=>'js')
);
?>
<!doctype html>
<html>
<head>
    <title>WEB1</title>
    <meta charset="utf-8">
</head>
<body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
        <?php
        foreach($list as $item){
            print("<li><a href=\"index.php?id={$item['id']}\">{$item['title']}</a></li>");
        }
        ?>
    </ol>
    <?php
    if(empty($_GET['id'])){
        print('<h2>Welcome</h2>Hello, WEB');  
    } else{
        foreach($list as $item){
            if($item['id'] == $_GET['id']){
                print("<h2>{$item['title']}</h2>{$item['title']}");
            }
        }
    }
    ?>
</body>
</html>