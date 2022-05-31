<?php
    function tgl_indo($tanggal){
        $bulan = array(
            1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
        );
        $pecahkan = explode('-', $tanggal);
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    function haribulantahun($tanggalnya, $cetak_hari = false){
        $hari = array(
            1 => 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'
        );
        $bulan = array(
            1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
        );
        
        $split = explode('-', $tanggalnya);
        $tglkutang = $split[2]. ' '. $bulan[ (int)$split[1] ] . ' '. $split[0];

        if($cetak_hari){
            $num = date('N', strtotime($tanggalnya));
            return $hari[$num] . ', ' . $tglkutang;
        }

        return $tglkutang;
    }

    function format_harijam($waktu){
        $hari_array = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');

        $hr     = date('w', strtotime($waktu));
        $hari   = $hari_array[$hr];
        $tanggal = date('j', strtotime($waktu));
        $bulan_array = array(
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        );

        $bl = date('n',strtotime($waktu));
        $bulan = $bulan_array[$bl];
        $tahun = date('Y', strtotime($waktu));
        $jam   = date('H:i:a', strtotime($waktu));

        return "$hari, $tanggal $bulan $tahun <i>$jam</i>";
    }
?>