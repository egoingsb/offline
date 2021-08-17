<?php
$json = file_get_contents('topic.json');
$list = json_decode($json, true); // true는 객체 대신 associative 모드로 배열을 가져오기 위한 옵션입니다.  
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