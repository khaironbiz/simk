                    <nav class="navbar navbar-expand-lg navbar-light bg-dark ">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                            <span class="text-white"><i class="fas fa-sliders-h"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/spk/file.php">File SPK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/spk/active.php">Aktivasi SPK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="rekap.php">Rekap SPK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Pasien Kelolaan</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Dokumen Legal
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">STR Rekap</a>
                                        <a class="dropdown-item" href="#">SIPP Rekap</a>
                                        <a class="dropdown-item" href="<?= $site_url?>/shift/master.php">Master Shift</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">STR Ke SDM</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Jadwal Kerja
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?= $site_url?>/shift/rencana.php">Rencana Jadwal</a>
                                        <a class="dropdown-item" href="<?= $site_url?>/shift/laporan.php">Laporan Jadwal</a>
                                        <a class="dropdown-item" href="#">Laporan Rumah Sakit</a>
                                        <a class="dropdown-item" href="<?= $site_url?>/shift/master.php">Master Shift</a>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                    </nav>