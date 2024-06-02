<?php
if (!function_exists('bulan')) {
    function bulan($bulan)
    {
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

if (!function_exists('upload_image')) {
    function upload_image($file, $path)
    {
        $ci_instance = &get_instance(); // Inisialisasi objek CodeIgniter
        $ci_instance->load->library('session');

        $config['upload_path']          = './assets/uploads/'.$path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2000; // maksimum ukuran file dalam kilobit
        $config['file_name']            = date('ymdhis');

        $ci_instance->load->library('upload', $config);

        $results = [];
        if (!$ci_instance->upload->do_upload($file)) {
            $results = array('status'=>false,'data' => $ci_instance->upload->display_errors());
        } else {
            $results = array('statys'=>true,'data' => $ci_instance->upload->data());
        }

        return $results;
    }
}


if (!function_exists('delete_image')) {
    function delete_image($nama_file)
    {
        $results = [];
        if (file_exists($nama_file)) {
            // Menghapus file menggunakan fungsi unlink
            if (unlink($nama_file)) {
              $results = ['status'=>true, 'code'=>200, 'msg'=>"File $nama_file berhasil dihapus."]; 
            } else {
                $results = ['status' => false, 'code' => 200, 'msg' => "File $nama_file gagal dihapus."]; 
            }
        } else {
            $results = ['status' => false, 'code' => 404, 'msg' => "File $nama_file tidak ditemukan."]; 
        }
        return $results;
    }
}

if (!function_exists('is_login')) {
    function is_login()
    {
        $ci_instance = &get_instance();
        if(!$ci_instance->session->userdata('is_login')){
            redirect('auth');
        }
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $pecahkan = explode(' ', $tanggal);
        $tgl = explode('-', $pecahkan[0]);

        return $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0] . ' ';
    }
}