<?php
require 'aws/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
//Create a S3Client
$s3Client = new Aws\S3\S3Client([
    'version' => 'latest',
    'region' => 'ap-northeast-2'
]);
// Send a PutObject request and get the result object.
$result = $s3Client->putObject([
    'ACL'=>'public-read',
    'Bucket' => 'my-photo-server',
    'Key' => $_FILES['uploaded_file']['name'],
    'SourceFile' => $_FILES['uploaded_file']['tmp_name']
]);
$s3URL = $result->toArray()['ObjectURL'];
$conn = mysqli_connect('db.cdbrt00yi2pz.ap-northeast-2.rds.amazonaws.com', 'admin', 'qwertyuiop', 'mydb');
$sql = "INSERT INTO topic (title, description, thumbnail) VALUES('{$_POST['title']}', '{$_POST['description']}', '{$s3URL}')";
mysqli_query($conn, $sql);
header('Location: index.php');
?>