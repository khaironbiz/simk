                    <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
                        <a class="navbar-brand" href="<?= $site_url?>/pasien"><?= $data_pengguna['ruangan']?></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                            <span class="text-white"><i class="fas fa-sliders-h"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/perawat/penempatan.php">Perawat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/perawat/register.php">Pasien</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/perawat/register.php">Jadwal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/perawat/register.php">Pasien Kelolaan</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Dokumen Legal
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">STR Rekap</a>
                                        <a class="dropdown-item" href="#">SIPP Rekap</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">STR Ke SDM</a>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                    </nav>