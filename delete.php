<?php
    include("koneksi.php");
    $nim = $_GET["nim"];
    function hapus($nim){
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim'");

        return mysqli_affected_rows($koneksi);
    }
    if( hapus($nim) > 0 ){
        echo "
            <script>
                alert('Data Berhasil di hapus');
                document.location.href = 'data.php';
            </script>
        ";
    }else{
        "
            <script>
                alert('Data Gagal di hapus');
                document.location.href = 'data.php';
            </script>
        ";
    }
?>