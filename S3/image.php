<?php
require'../vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

if(isset($_FILES['image'])){
    $type       = $_FILES['image']['type'];
    $file_name  = "s3/$type/".$_FILES['image']['name'];
    $temp_file_location = $_FILES['image']['tmp_name'];


    $client = S3Client::factory([
        'version' => 'latest',
        'region'  => 'idn',
        'endpoint' => 'https://nos.wjv-1.neo.id',
        'credentials' => [
            'key'    => "31f93ec1f85a1b163b43",
            'secret' => "zV3DSK2IisodFhJXUJcwVhtk+nSF+3S3biHdI4/I"
        ]
    ]);

    try {
        $client->putObject([
            'Bucket'        =>'atm-sehat',
            'Key'           => $file_name,
            'ContentType'   => $type,
            'SourceFile'    => $temp_file_location,    // like /var/www/vhosts/mysite/file.csv
            'ACL'           => 'public-read',
        ]);
    } catch (S3Exception $e) {
        // Catch an S3 specific exception.
        echo $e->getMessage();
    }
}
?>
<html>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit"/>
</form>
</html>