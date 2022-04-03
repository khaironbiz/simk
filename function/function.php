<?php
//Diagnosa
function dx_medis($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM dx_medis WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['dx_medis'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function dx_kep($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM dx_kep WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['dx_kep'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function dokter($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM dokter WHERE id_dokter = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['nama_dokter'];
    }else{
        $master = "NULL";
    }
    return $master;
}

function risiko_jatuh($skor){
    if($skor >0){
        if($skor < 6){
            $keterangan = "Risiko Jatuh Rendah";
            }elseif($skor < 14){
                $keterangan = "Risiko Jatuh Sedang";
            }elseif($skor >= 14){
                $keterangan = "Risiko Jatuh Tinggi";
            
        }else{
            $keterangan = "NULL";
        }
    }else{
        $keterangan = "NULL";
    }
    
    return $keterangan;
}
function label_risiko_jatuh($skor){
    if($skor >0){
        if($skor < 6){
            $keterangan = "secondary";
            }elseif($skor < 14){
                $keterangan = "secondary";
            }elseif($skor >= 14){
                $keterangan = "warning";
            
        }else{
            $keterangan = "NULL";
        }
    }else{
        $keterangan = "NULL";
    }
    
    return $keterangan;
}

//master

function master($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM db_master WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['nama_master'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function sub_master($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM db_sub_master WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
    $data     = mysqli_fetch_array($sql);
    $master   = $data['nama_submaster'];
    }else{
        $master = "NULL";
    }
    return $master;
}
//newss

function newss_nafas($nafas){
        if($nafas <30){
            $master     = 2;
        }if($nafas <21){
            $master     = 1;
        }if($nafas <18){
            $master     = 0;
        }if($nafas < 9){
            $master     = 1;
        }if($nafas < 8){
            $master     = 2;
        }if($nafas > 29){
            $master     = 3;
        }
    return $master;
}
function newss_nadi($nadi){
        if($nadi <130){
            $master     = 2;
        }if($nadi <111){
            $master     = 1;
        }if($nadi <101){
            $master     = 0;
        }if($nadi < 51){
            $master     = 1;
        }if($nadi < 40){
            $master     = 2;
        }
        if($nadi >= 130){
            $master     = 3;
        }
    return $master;
}
function newss_suhu($suhu){
        if($suhu <=38.55){
            $master     = 1;
        }if($suhu <37.6){
            $master     = 0;
        }if($suhu <36.05){
            $master     = 1;
        }if($suhu < 35.05){
            $master     = 2;
        }if($suhu > 38.55){
            $master     = 2;
        }
    return $master;
}
function newss_sistolik($sistolik){
        if($sistolik <=220){
            $master     = 2;
        }if($sistolik <200){
            $master     = 1;
        }if($sistolik <160){
            $master     = 0;
        }if($sistolik < 101){
            $master     = 1;
        }if($sistolik < 81){
            $master     = 2;
        }if($sistolik < 71){
            $master     = 3;
        }
        if($sistolik > 220){
            $master     = 3;
        }
    return $master;
}
function newss($newss_score){
        if($newss_score <6){
            $master     = "orange";
        }if($newss_score < 4){
            $master     = "yellow";
        }if($newss_score < 2){
            $master     = "success";
        }if($newss_score > 6){
            $master     = "danger";
        }if($newss_score == "NULL"){
            $master     = "black";
        }
    return $master;
}

//pasien

function pasien_daftar_has($has_px_daftar){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar WHERE has_px_daftar = '$has_px_daftar'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['nrm'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function pasien_key_trx($key_trx){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar WHERE key_trx = '$key_trx'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['nrm'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function key_trx($has_px_daftar){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar WHERE has_px_daftar = '$has_px_daftar'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['key_trx'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function key_trx_ruangan($has_pasien_daftar_ruangan){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar_ruangan WHERE has_pasien_daftar_ruangan = '$has_pasien_daftar_ruangan'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['key_trx'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function has_px_daftar($key_trx){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_daftar WHERE key_trx = '$key_trx'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['has_px_daftar'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function nama_pasien($nrm){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM pasien_db WHERE nrm = '$nrm'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['nama_pasien'];
    }else{
        $master = "NULL";
    }
    return $master;
}
//perawat
function perawat($nira){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM nira WHERE nira = '$nira'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['nama'];
    }else{
        $master = "NULL";
    }
    return $master;
}

//ruangan

function ruangan($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['ruangan'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function kamar($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['ruangan'];
    }else{
        $master = "NULL";
    }
    
    return $master;
}
function has_ruangan($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE id = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['has_ruangan'];
    }else{
        $master = "NULL";
    }
    
    return $master;
}
function id_ruangan($ruangan){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM ruangan WHERE ruangan = '$ruangan'");
    if(mysqli_num_rows($sql) >0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['id'];
    }else{
        $master = "NULL";
    }
    
    
    return $master;
}
//shift

function nama_shift($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM shift_perawat WHERE kode = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['nama_shift'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function masuk_shift($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM shift_perawat WHERE kode = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['jam_mulai'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function keluar_shift($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM shift_perawat WHERE kode = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['jam_selesai'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function count_shift($shift){
    include('../auth/koneksi.php');
    $sql    = mysqli_query($host,"SELECT * FROM laporan_shift_perawat WHERE shift = '$shift'");
    $count  = mysqli_num_rows($sql);    
    return $count;
}
function has_shift($id){
    include('../auth/koneksi.php');
    $sql      = mysqli_query($host,"SELECT * FROM shift_perawat WHERE kode = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data     = mysqli_fetch_array($sql);
        $master   = $data['has_shift'];
    }else{
        $master = "NULL";
    }
    return $master;
}
//usia
function usia($tgl){
    $tgl_now        = date('Y-m-d');
    $tgl_awal       = new DateTime($tgl);
    $today          = new DateTime();
    $umur           = $today->diff($tgl_awal);
    return $umur;
}
    // $tgl    = "1984-11-12";
    // echo usia($tgl)->y;
//wilayah
function provinsi($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM id_desa WHERE lokasi_propinsi = '$id' AND lokasi_kabupatenkota = '0'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['lokasi_nama'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function kota($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM id_desa WHERE lokasi_kabupatenkota = '$id' AND lokasi_kecamatan = '0'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['lokasi_nama'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function kecamatan($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM id_desa WHERE lokasi_kecamatan = '$id' AND lokasi_kelurahan = '0'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['lokasi_nama'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function kelurahan($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM id_desa WHERE lokasi_kelurahan = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['lokasi_nama'];
    }else{
        $master = "NULL";
    }
    return $master;
}
//jabfung
function unsur($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM jabfung_ak WHERE id_a = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['unsur'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function sub_unsur($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM jabfung_ak WHERE id_b = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['sub_unsur'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function jenis_kegiatan($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM jabfung_ak WHERE id_c = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['jenis'];
    }else{
        $master = "NULL";
    }
    return $master;
}
function kegiatan($id){
    include('../auth/koneksi.php');
    $sql        = mysqli_query($host,"SELECT * FROM jabfung_ak WHERE id_d = '$id'");
    if(mysqli_num_rows($sql)>0){
        $data   = mysqli_fetch_array($sql);
        $master = $data['uraian'];
    }else{
        $master = "NULL";
    }
    return $master;
}
?>