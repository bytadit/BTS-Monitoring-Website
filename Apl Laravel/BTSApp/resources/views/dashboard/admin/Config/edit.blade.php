<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Config - BTS Admin</title>
    <link rel="icon" type="image/x-icon" href="image/BTS logo.png">
    <link rel="stylesheet" href="css/dbAdmin.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Header Awal -->
    <header>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-bts-1">
            <a class="navbar-brand ps-3 d-flex bg-bts-3" href="#" style="padding-bottom:18px; border-top-right-radius: 40px; justify-content: center;">
                <img src="image/BTS logo3.png" id="logo" alt="logo" style="margin-left: -25px; margin-top:18px; width: 100px;">
            </a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="messageList.html" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                        </li>
                        <!-- <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                     aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="editProfileAdmin.html">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Header Akhir -->


    <div id="layoutSidenav">
        <!-- Sidebar Awal -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark bg-bts-3" id="sidenavAccordion" style="background-color: #52784F; border-bottom-right-radius: 20px;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">
                            <div class="d-flex sb-nav-link-icon">
                                <img src="./image/pp.png" style="width:50px; margin-right: 10px;">
                                <div class="d-flex flex-column">
                                    <small class="font-weight-normal" style="color:#F4D2EB; font-weight:lighter">Welcome</small>
                                    <p >{{ auth()->user()->name }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="sb-sidenav-menu-heading">General</div>
                        <a class="nav-link" href="dashboardAdmin.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Master Data</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Akun
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="editProfileAdmin.html">Edit Profil</a>
                                <a class="nav-link" href="editConfig.html">Edit Config</a>
                                <a class="nav-link" href="editSurveyor.html">Edit Surveyor</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Data BTS
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="editBTSInfo.html">Edit Info BTS</a>
                                <a class="nav-link" href="editBTSPemilik.html">Edit Pemilik BTS</a>
                                <a class="nav-link" href="editBTSWilayah.html">Edit Wilayah BTS</a>
                                <a class="nav-link" href="editListSurvey.html">Edit Survey</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar Akhir -->

        <div id="layoutSidenav_content">
            <!-- Main Awal -->
            <main>
                <div class="container-fluid px-l-5">
                    <h1 class="mt-4">Edit Configuration</h1>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">System</div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <label class="labels" for="metode">Home Page</label>
                                        <select class="form-control" id="metode">
                                            <option>Home</option>
                                            <option>Information - Diskominfo Surakarta</option>
                                            <option>Information - Data BTS Tower</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3"><label class="labels">Default Theme</label><input type="text" class="form-control" value="Green Theme"></div>
                                    <div class="col-md-12 mt-3"><label class="labels">Timezone</label><input type="text" class="form-control" value="Default Timezone"></div>
                                    <div class="col-md-12 mt-3"><label class="labels">Short display date format</label><input type="text" class="form-control" value="April 27, 2022"></div>
                                    <div class="col-md-12 mt-3"><label class="labels">Long display date format</label><input type="text" class="form-control" value="April 27, 2022 - 00:00:01AM"></div>
                                </div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">Site</div>
                                <div class="card-body">
                                    <div class="col-md-12"><label class="labels">Site Title</label><input type="text" class="form-control" value="Diskominfo Surakarta - BTS"></div>
                                    <div class="col-md-12 mt-3"><label class="labels">Default Language</label><input type="text" class="form-control" value="id"></div>
                                    <div class="col-md-12 mt-3"><label class="labels">Language Supported</label><input type="text" class="form-control" value="en"></div>
                                    <div class="col-md-12 mt-3"><label class="labels">Default Author</label><input type="text" class="form-control" value="Paijo"></div>
                                    <div class="col-md-12 mt-3"><label class="labels">Default Email</label><input type="text" class="form-control" value="emailkita@gmail.com"></div>
                                </div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Config</button></div>
                    </div>
                </div>
            </main>
            <!-- Main Akhir -->

            <!-- Footer Awal -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Diskominfo BTS Surakarta 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer Akhir -->
        </div>
    </div>
</body>

</html>
