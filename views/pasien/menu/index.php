                    <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
                        <a class="navbar-brand" href="<?= $site_url?>/pasien">Data Pasien</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                            <span class="text-white"><i class="fas fa-sliders-h"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/pasien/admisi.php"><?= $_SERVER['REQUEST_METHOD']?> <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/pasien/admisi.php">Kunjungan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/pasien/register.php">Perawatan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="<?= $site_url?>/pasien/register.php">Pasien Kelolaan</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                    Askep
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Pasien</a>
                                        <a class="dropdown-item" href="#">Diagnosa Keperawatan</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Diagnosa Medis</a>
                                    </div>
                                </li>
                            </ul>
                            
                        </div>
                    </nav>