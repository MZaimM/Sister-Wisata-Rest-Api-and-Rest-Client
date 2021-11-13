<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wisata</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Muhammad Zaim Maulana (19650058)</span>
                                <img class="img-profile rounded-circle" src="img/icon_user.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                            <h6 class="m-0 font-weight-bold text-primary">Data Wisata</h6>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Harga Masuk</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataBody as $data)
                                            <tr>
                                                <td><img src="{{ $data['gambar'] }}" alt="" width="300"></td>
                                                <td>{{ $data['nama'] }}</td>
                                                <td>{{ $data['harga_masuk'] }}</td>
                                                <td>{{ $data['deskripsi'] }}</td>
                                                <td>
                                                    <button href="#" class=" d-sm-inline-block btn btn-sm btn-info shadow-sm mb-1" data-toggle="modal" data-target="#update<?= $data['id'] ?>">
                                                        <i class="far fa-eye fa-sm text-white-50"></i> Lihat</button>

                                                    <button href="#" class=" d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#delete<?= $data['id'] ?>">
                                                        <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</button>
                                                </td>
                                            </tr>

                                            <!-- Update Modal-->
                                            <div class="modal fade" id="update<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data Wisata</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- body -->
                                                            <form class="user" action="/update" method="POST">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                        <label style="font-size: 14px;" for="nama">Nama</label>
                                                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $data['nama'] ?>">
                                                                        <input hidden type="text" class="form-control form-control-user" id="id" name="id" value="<?= $data['id'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                        <label style="font-size: 14px;" for="nik">Gambar</label>
                                                                        <input type="text" class="form-control form-control-user" id="gambar" name="gambar" value="<?= $data['gambar'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                        <label style="font-size: 14px;" for="pekerjaan">Harga Masuk</label>
                                                                        <input type="text" class="form-control form-control-user" id="harga_masuk" name="harga_masuk" value="<?= $data['harga_masuk'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                                        <label style="font-size: 14px;" for="pekerjaan">Deskripsi</label>
                                                                        <textarea class="form-control" id="deskripsi" name="deskripsi" cols="30" rows="10"><?= $data['deskripsi'] ?></textarea>
                                                                        <!-- <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" value="<?= $data['deskripsi'] ?>"> -->
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                    <input type="submit" value="Simpan" class="btn btn-info" name="simpan" id="simpan">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin menghapusnya?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- body -->
                                                            Pilih "Hapus" di bawah ini jika Anda siap untuk menghapus data <b><?php echo $data['nama']; ?></b> secara permanen.
                                                            <form action="/delete" method="post">
                                                                @csrf
                                                                <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?php echo $data['id'] ?>">
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                    <input type="submit" value="Hapus" class="btn btn-info" name="hapus" id="hapus">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Muhammad Zaim Maulana 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Tambah Modal-->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Wisata</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- body -->
                
                <form class="user" action="/create" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label style="font-size: 14px;" for="nama">Nama</label>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label style="font-size: 14px;" for="nik">Gambar</label>
                                <input type="text" class="form-control form-control-user" id="gambar" name="gambar" placeholder="Link Gambar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label style="font-size: 14px;" for="pekerjaan">Harga Masuk</label>
                                <input type="text" class="form-control form-control-user" id="harga_masuk" name="harga_masuk" placeholder="Harga masuk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label style="font-size: 14px;" for="pekerjaan">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" cols="30" rows="10"></textarea>
                                <!-- <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Deskripsi"> -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <input type="submit" value="Simpan" class="btn btn-info" name="simpan" id="simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <!-- Page level custom scripts -->
    
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>


</body>

</html>