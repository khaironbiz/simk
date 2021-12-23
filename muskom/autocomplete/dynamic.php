<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        <title>Autocomplete Input Dengan PHP MySQLi &minus; MasRud.com</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="container">
            <?php
                if(isset($_POST['nira'])){
                    $met    = $_SERVER['REQUEST_METHOD'];
                    echo $_POST['nira'].$met;
                }
                
            ?>
            
            <form action="" method="post">
                <h3>Calon Pertama</h3>
                    <input type="text" id="buah" name="buah" placeholder="Nama Perawat" value="">
                    <input type="text" id="nira" name="nira" value="" readonly>
                <h3>Calon Kedua</h3>
                    <input type="text" id="nama" name="nama" placeholder="Nama Perawat" value="">
                    <input type="text" id="nira" name="nira" value="" readonly>
                    <button type="submit">Tambah</button>
            </form>
        </div>
        <!-- Memanggil jQuery.js -->
        <script src="jquery-3.2.1.min.js"></script>
        <!-- Memanggil Autocomplete.js -->
        <script src="jquery.autocomplete.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                // Selector input yang akan menampilkan autocomplete.
                $( "#buah" ).autocomplete({
                    serviceUrl: "source.php",   // Kode php untuk prosesing data.
                    dataType: "JSON",           // Tipe data JSON.
                    onSelect: function (suggestion) {
                        $( "#nira" ).val("" + suggestion.buah);
                    }
                });
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                // Selector input yang akan menampilkan autocomplete.
                $( "#nama" ).autocomplete({
                    serviceUrl: "source2.php",   // Kode php untuk prosesing data.
                    dataType: "JSON",           // Tipe data JSON.
                    onSelect: function (suggestion2) {
                        $( "#nira" ).val("" + suggestion2.nama);
                    }
                });
            })
        </script>
    </body>
</html>
