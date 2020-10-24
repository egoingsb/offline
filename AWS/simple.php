<html>
    <body>
        <h1><a href="/index.php">CLOUD</a></h1>
        <ul>
            <li><a href="index.php?id=S3">S3</a></li>
            <li><a href="index.php?id=EC2">EC2</a></li>
            <li><a href="index.php?id=CF">CF</a></li>
        </ul>
        <?php
        if(empty($_GET['id'])){
            print('Hello Cloud');
        } else if($_GET['id'] === 'S3'){
            print('S3 is ...');
        } else if($_GET['id'] === 'EC2'){
            print('EC2 is ...');
        } else if($_GET['id'] === 'CF'){
            print('CloudFront is ..');
        } 
        ?>
    </body>
</html>