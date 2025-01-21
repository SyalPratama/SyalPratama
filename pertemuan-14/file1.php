<?php
include "koneksi.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container mt-5">
            <!-- Tabel 1 --->
            <div class="card">
                <div class="card-title text-center mt-2 mb-2"><h4>Tabel 1</h4></div>
                <div class="card-body shadow">
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table table-striped table-hover table-borderless table-primary align-middle"
                        >
                            <thead class="table-light">
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <?php
                                $tabel1 =mysqli_query($conn,"select * from tabel_2");
                                While($dataku=mysqli_fetch_row($tabel1)) echo "<tr class='table-primary'>
                                <td>$dataku[0]</td>
                                <td>$dataku[1]</td>
                                <td>$dataku[2]</td>
                                </tr>";

                            ?>
                            </tbody>
                            <tfoot>
                                
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>

            <!-- Akhir Tabel 1 --->

            <!-- Tabel 2 --->
            
            <div class="card mt-5">
                <div class="card-body shadow">
                <div class="card-title text-center mt-2 mb-2"><h4>Tabel 2</h4></div>
                    <div
                        class="table-responsive"
                    >
                        <table
                            class="table table-striped table-hover table-borderless table-primary align-middle"
                        >
                            <thead class="table-light">
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <?php
                                $tabel1 =mysqli_query($conn,"select * from tabel_1");
                                While($dataku=mysqli_fetch_row($tabel1)) echo "<tr class='table-primary'>
                                <td>$dataku[0]</td>
                                <td>$dataku[1]</td>
                                <td>$dataku[2]</td>
                                </tr>";

                            ?>
                            </tbody>
                            <tfoot>
                                
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>
            <!-- Akhir Tabel 2 --->

            <!-- Form Input --->

            <div class="card mt-5 mb-5 shadow">
                <div class="card-title">
                    <div class="card-body">
                    <?php
                        session_start();
                        if (isset($_SESSION['message'])) {
                            echo '<div class="alert alert-' . $_SESSION['message_type'] . ' alert-dismissible fade show" role="alert">';
                            echo $_SESSION['message'];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                            // Hapus pesan setelah ditampilkan
                            unset($_SESSION['message']);
                            unset($_SESSION['message_type']);
                        }
                    ?>
                        <form action="aksi.php" method="post">
                           <div class="mb-3">
                               <label for="kode" class="form-label">Kode Barang</label>
                               <select class="form-select form-select-lg" name="kode" id="kode" required>
                               <?php
                                   $tabel1=mysqli_query($conn,"select * from tabel_2");
                                   While($data1=mysqli_fetch_row($tabel1)) echo '<option
                                   value="'.$data1[0].'">'.$data1[0].'/'.$data1[1].'</option>';
                               ?>
                               </select>
                               <div class="mb-3">
                                   <label for="jumlah" class="form-label">Jumlah</label>
                                   <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                               </div>
                               <button
                                   type="submit"
                                   class="btn btn-primary"
                               >
                                   Submit
                               </button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Akhir Form Input -->
            
        </div>
        
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
