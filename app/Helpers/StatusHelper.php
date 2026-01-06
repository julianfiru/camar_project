<?php
if (!function_exists('get_status_style')) {
    function get_status_style($status) {
        return match((int) $status) {
            2 => 'bgc-green',
            1 => 'bgc-yellow',
            0 => 'bgc-red',
            default=> 'bg-secondary'
        };
    }
}
if (!function_exists('statusProyek')) {
    function statusProyek($status) {
        return match((int) $status) {
            2 => 'Aktif',
            1 => 'Pending',
            0 => 'Dibatalkan',
            default     => ucwords($status)
        };
    }
}
if (!function_exists('statusProgres')) {
    function statusProgres($status) {
        return match((int) $status) {
            2  => 'Selesai',
            1  => 'Proses',
            0  => 'Gagal',
            default     => ucwords($status)
        };
    }
}
if (!function_exists('statusVerifikasi')) {
    function statusVerifikasi($status) {
        return match((int) $status) {
            2  => 'Terverifikasi',
            1  => 'Proses',
            default     => ucwords($status)
        };
    }
}
if (!function_exists('format_angka_singkat')) {
    function format_angka_singkat($angka, $presisi = 1) {
        if (!is_numeric($angka)) return 0;
        if ($angka >= 1000000000000) {
            $hasil = $angka / 1000000000000;
            $suffix = 'T';
        } elseif ($angka >= 1000000000) {
            $hasil = $angka / 1000000000;
            $suffix = 'M';
        } elseif ($angka >= 1000000) {
            $hasil = $angka / 1000000;
            $suffix = 'Jt';
        } elseif ($angka >= 1000) {
            $hasil = $angka / 1000;
            $suffix = 'Rb';
        } else {
            return number_format($angka, 0, ',', '.');
        }
        return number_format($hasil, $presisi, ',', '.') . $suffix;
    }
}
if (!function_exists('format_ukuran_kb')) {
    function format_ukuran_kb($kb, $presisi = 1) {
        if (!is_numeric($kb)) return '0 KB';
        if ($kb >= 1048576) { 
            $hasil = $kb / 1048576;
            $satuan = ' GB';
        }
        elseif ($kb >= 1024) {
            $hasil = $kb / 1024;
            $satuan = ' MB';
        }
        else {
            $hasil = $kb;
            $satuan = ' KB';
            $presisi = 0;
        }
        return number_format($hasil, $presisi, ',', '.') . $satuan;
    }
}