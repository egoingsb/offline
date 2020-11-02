<?php
$conn = mysqli_connect('db.cdbrt00yi2pz.ap-northeast-2.rds.amazonaws.com', 'admin', 'qwertyuiop', 'mydb');
$sql = 'SELECT * FROM topic';
?>
<html>
    <body>
        <h1><a href="/index.php">CLOUD</a></h1>
        <ul>
            <?php
            $query = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($query)){
            ?>
                <li><a href="index.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></li>
            <?php
            }
            ?>
        </ul>
        <?php
        if(empty($_GET['id'])){
        ?>
            Hello is ..
        <?php
        } else {
            $query = mysqli_query($conn, "SELECT * FROM topic WHERE id = ".$_GET['id']);
            $result = mysqli_fetch_array($query);
        ?>
            <h1><?php print($result['title']);?></h1>
            <?php print($result['description']); ?>
            <br><img src="<?php print($result['thumbnail']); ?>" width="100"><br>
        <?php
        }
        ?>
        <?php
            print($_SERVER['SERVER_ADDR']);
        ?>
        <a href="write.php">write</a>
    </body>
</html>