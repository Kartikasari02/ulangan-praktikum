<?php
    if ( isset($_GET["nis"]) ){
        $nis = $_GET["nis"];
        $check_nis = "SELECT * FROM datanilai WHERE nis = '$nis';";
        include('./input-config.php');
        $querry = mysqli_query($mysqli, $check_nis);
        $row = mysqli_fetch_array($querry);
    }
?>

<div class="container">
<h1>Edit Data</h1>
<form action="input-datadiri-edit.php" method="POST">
    <label for="nis"> Nomor Induk siswa :</label>
    <input class="form-control" value="<?php echo $row["nis"]; ?>" readonly type="number" name="nis" placeholder="Ex. 12001142" /><br>

    <label for="namalengkap"> Nama Lengkap :</label>
    <input class="form-control" value="<?php echo $row["namalengkap"]; ?>" type="text" name="namalengkap" placeholder="Ex. David Lutfhi" /><br>

    <label for="jeniskelamin"> Jenis Kelamin :</label>
    <input class="form-control" value="<?php echo $row["jeniskelamin"]; ?>" type="text" name="jeniskelamin" placeholder="Ex. P" /><br>

    <label for="kelas"> Kelas :</label>
    <input class="form-control" value="<?php echo $row["kelas"]; ?>" type="text" name="kelas" placeholder="Ex. 11 rp 1"/><br>

    <label for="nilaikehadiran"> Nilai Kehadiaran :</label>
    <input class="form-control" value="<?php echo $row["nilaikehadiran"]; ?>" type="number" name="nilaikehadiran" placeholder="Ex. 80.56" /><br>

    <label for="nilaitugas"> Nilai Tugas :</label>
    <input class="form-control" value="<?php echo $row["nilaitugas"]; ?>" type="number" name="nilaitugas" placeholder="Ex. 80.56" /><br>

    <label for="nilaipts"> Nilai PTS :</label>
    <input class="form-control" value="<?php echo $row["nilaipts"]; ?>" type="number" name="nilaipts" placeholder="Ex. 80.56" /><br>

    <label for="nilaipas"> Nilai PAS :</label>
    <input class="form-control" value="<?php echo $row["nilaipas"]; ?>" type="number" name="nilaipas" placeholder="Ex. 80.56" /><br>



    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-warning' href="input-datadiri.php">kembali</a>
</form>
</div>
<?php
    if ( isset($_POST["simpan"])) {
        $nis = $_POST["nis"];
        $namalengkap = $_POST["namalengkap"];
        $jeniskelamin = $_POST["jeniskelamin"];
        $kelas = $_POST["kelas"];
        $nilaikehadiran = $_POST["nilaikehadiran"];
        $nilaitugas = $_POST["nilaitugas"];
        $nilaipts = $_POST["nilaipts"];
        $nilaipas = $_POST["nilaipas"];
       
        

        //Edit - Memperbarui Data 
        $query ="
            UPDATE datanilai SET namalengkap = '$namalengkap',
            jeniskelamin = '$jeniskelamin',
            kelas = '$kelas',
            nilaikehadiran = '$nilaikehadiran',
            nilaitugas = '$nilaitugas',
            nilaipts = '$nilaipts',
            nilaipas = '$nilaipas'
            WHERE nis = '$nis';
        ";
        include ('./input-config.php');
        $update = mysqli_query($mysqli, $query);

        if($update){
            echo "
                <script>
                    alert('Data Berhasil Diperbaharui');
                    window.location='input-datadiri.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal diperbaharui');
                window.location='input-datadiri-edit.php?nis=$nis';
            </script>
            ";
        }
    }
?>