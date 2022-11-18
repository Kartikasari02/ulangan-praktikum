<div class="container">
<h1>Tambah Data</h1>
<form action="input-datadiri-tambah.php" method="POST">
    <label for="nis">Nomor Induk Siswa:</label>
    <input class="form-control" type="number" name="nis" placeholder="Ex. 12100848" /><br>

    <label for="namalengkap">Nama Lengkap :</label>
    <input class="form-control" type="text" name="namalengkap" placeholder="Ex. Lala" /><br>

    <label for="jeniskelamin">Jenis Kelamin :</label>
    <input class="form-control" type="text" name="jeniskelamin" placeholder="Ex. L/P"/><br>

    <label for="kelas">Kelas :</label>
    <input class="form-control" type="text" name="kelas" placeholder="Ex. XI RPL 1" /><br>

    <label for="nilaikehadiran">Nilai Kehadiran :</label>
    <input class="form-control" type="text" name="nilaikehadiran" placeholder="Ex. 90" /><br>

    <label for="nilaitugas">Nilai Tugas :</label>
    <input class="form-control" type="text" name="nilaitugas" placeholder="Ex. 90" /><br>

    <label for="nilaipts">Nilai PTS :</label>
    <input class="form-control" type="text" name="nilaipts" placeholder="Ex. 90" /><br>

    <label for="nilaipas">Nilai PAS :</label>
    <input class="form-control" type="text" name="nilaipas" placeholder="Ex. 90" /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-datadiri.php">Kembali</a>
</form>    
</div>

<?php 
     include('./input-config.php');
     if ( $_SESSION["login"] != TRUE) {
         header('location:login.php');
     }
      if ( $_SESSION["role"] != "admin" ) {
        echo "
        <script>
            alert('Akses tidak diberikan, Kamu Bukan Admin');
            window.location='input-datadiri.php';
        </script>
        ";
      }

    if( isset($_POST["simpan"]) ){
        $nis = $_POST["nis"];
        $namalengkap = $_POST["namalengkap"];
        $jeniskelamin = $_POST["jeniskelamin"];
        $kelas = $_POST["kelas"];
        $nilaikehadiran = $_POST["nilaikehadiran"];
        $nilaitugas = $_POST["nilaitugas"];
        $nilaipts = $_POST["nilaipts"];
        $nilaipas = $_POST["nilaipas"];
       

        //CREATE - Menammbahkan Data ke Database
        $query = "
            INSERT INTO datanilai VALUES
            ('$nis','$namalengkap','$jeniskelamin','$kelas',' $nilaikehadiran','$nilaitugas',' $nilaipts',' $nilaipas','$nilairatarata')
         ";

        
         $insert = mysqli_query($mysqli, $query);

         if ($insert){
                echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    window.location='input-datadiri.php';
                </script>
            ";
         }

    }
    ?>