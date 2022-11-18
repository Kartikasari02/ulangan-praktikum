<?php
    include('./input-config.php');
    if ($_SESSION["login"] != TRUE){
        header('location:login.php');
    }

        echo "<div class='container'>";
        echo "Selamat Datang " .$_SESSION["username"] . "<br>";
        echo "Anda Sebagai : " .$_SESSION["role"] . "<br>";
        echo "<hr>";
        echo "<a class='btn btn-sm btn-secondary' href='logout.php'>Logout</a>";
        echo "<hr>";
        echo "<a class='btn btn-sm btn-primary' href='input-datadiri-tambah.php'>Tambah Data</a>";
        echo " - <a class='btn btn-sm btn-warning' href='input-datadiri-pdf.php'>Cetak PDF</a>";
        echo "<hr>";
        //Menampilkan data diri database
        $no = 1 ;
        $tabledata = "" ;
        $data = mysqli_query($mysqli, " SELECT * FROM datanilai ");
        while($row = mysqli_fetch_array($data)) {
            $nilairatarata=($row["nilaikehadiran"]+$row["nilaitugas"]+$row["nilaipts"]+$row["nilaipas"])/4;
            $tabledata .= "
                <tr>
                    <td>".$row["nis"]."</td>
                    <td>".$row["namalengkap"]."</td>
                    <td>".$row["jeniskelamin"]."</td>
                    <td>".$row["kelas"]."</td>
                    <td>".$row["nilaikehadiran"]."</td>
                    <td>".$row["nilaitugas"]."</td>
                    <td>".$row["nilaipts"]."</td>
                    <td>".$row["nilaipas"]."</td>
                    <td>".$nilairatarata."</td>

                    <td>
                        
                        <a class='btn btn-sm btn-success' href='input-datadiri-edit.php?nis=".$row["nis"]."'>Edit</a>
                        &nbsp;-&nbsp;
                        <a class='btn btn-sm btn-danger' href='input-datadiri-hapus.php?nis=".$row["nis"]."'
                        onclick='return confirm(\"Yakin Hapus\");'>Hapus</a>

                    </td>
                    
                </tr>    
            ";
            $no++;
        }

        echo "
            <table class='table table-dark table-table-bordered table-striped'>
                <tr>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Nilai Kehadiran</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai PTS</th> 
                    <th>Nilai PAS</th>
                    <th>Nilai Rata-Rata</th>
                    <th>Aksi</th>
                </tr>
                $tabledata
            </table>
        ";
        echo "</div>";
?>