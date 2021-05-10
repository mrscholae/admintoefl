<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->model("Soal_model");
        $this->load->model("Tes_model");
    
        // Load Pagination library
        $this->load->library('pagination');

        ini_set('xdebug.var_display_max_depth', '10');
        ini_set('xdebug.var_display_max_children', '256');
        ini_set('xdebug.var_display_max_data', '1024');
        
        if(!$this->session->userdata('admintoefl')){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-times-circle text-danger mr-1"></i> Maaf Anda harus login terlebih dahulu<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div');
			redirect(base_url("auth"));
		}
    }
    
    public function index(){
        // navbar and sidebar
        $data['menu'] = "Tes";

        // for title and header 
        $data['title'] = "List Tes";

        // for modal 
        $data['modal'] = ["modal_tes"];
        
        // javascript 
        $data['js'] = [
            "modules/other.js", 
            "modules/tes.js",
            "load_data/reload_tes.js",
        ];

        $this->load->view("pages/tes/list-tes", $data);
    }

    public function hasil($id){
        // navbar and sidebar
        $data['menu'] = "Tes";

        // for title and header 
        $data['title'] = "List Hasil Tes";

		$jumlah_data = COUNT($this->Main_model->get_all("peserta_toefl", ["md5(id_tes)" => $id]));
		
		$config['base_url'] = base_url().'tes/hasil/'.$id.'/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 600;
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);
        $respon = $this->Main_model->get_all_limit("peserta_toefl", ["md5(id_tes)" => $id], "", "", $from, $config['per_page']);
        $data['respon'] = [];
        foreach ($respon as $i => $respon) {
            $data['respon'][$i] = $respon;
            $jawaban = explode("###", $respon['text']);
            $data['respon'][$i]['text'] = $jawaban;
        }

        $this->load->view("pages/tes/hasil-tes", $data);
    }

    public function list_hard($id){
        // navbar and sidebar
        $data['menu'] = "Tes";

        // for title and header 
        $data['title'] = "List Sertifikat Hard Copy";

		$jumlah_data = COUNT($this->Main_model->get_all("peserta_toefl", ["id_tes" => $id, "sertifikat" => "Hard File"]));
		
		$config['base_url'] = base_url().'tes/list_hard/'.$id.'/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 600;
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);
        $respon = $this->Main_model->get_all_limit("peserta_toefl", ["id_tes" => $id, "sertifikat" => "Hard File"], "", "", $from, $config['per_page']);
        $data['respon'] = [];
        foreach ($respon as $i => $respon) {
            $data['respon'][$i] = $respon;
            $jawaban = explode("###", $respon['text']);
            $data['respon'][$i]['text'] = $jawaban;
        }

        $this->load->view("pages/tes/hasil-tes", $data);
    }

    public function list_soft($id){
        // navbar and sidebar
        $data['menu'] = "Tes";

        // for title and header 
        $data['title'] = "List Sertifikat Soft Copy";

		$jumlah_data = COUNT($this->Main_model->get_all("peserta_toefl", ["id_tes" => $id, "sertifikat" => "Soft File"]));
		
		$config['base_url'] = base_url().'tes/list_hard/'.$id.'/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 600;
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);
        $respon = $this->Main_model->get_all_limit("peserta_toefl", ["id_tes" => $id, "sertifikat" => "Soft File"], "", "", $from, $config['per_page']);
        $data['respon'] = [];
        foreach ($respon as $i => $respon) {
            $data['respon'][$i] = $respon;
            $jawaban = explode("###", $respon['text']);
            $data['respon'][$i]['text'] = $jawaban;
        }

        $this->load->view("pages/tes/hasil-tes", $data);
    }

    public function list_peserta($id){

        $data['id'] = $id;

        // navbar and sidebar
        $data['menu'] = "Tes";

        // for title and header 
        $data['title'] = "List Hasil Tes";

        // for modal 
        $data['modal'] = ["modal_tes"];
        
        // javascript 
        $data['js'] = [
            "modules/other.js",
            "modules/hasil.js",
            "load_data/reload_hasil.js",
        ];

        $this->load->view("pages/tes/hasil_tes", $data);
    }

    public function loadRecord($rowno=0){
        // Row per page
        $rowperpage = 6;
    
        // Row position
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
     
        // All records count
        // $allcount = $this->Tes_model->getrecordCount();
        $allcount = COUNT($this->Main_model->get_all("tes", ["hapus" => 0], "tgl_tes", "DESC"));
    
        // Get records
        $record = $this->Main_model->get_all_limit("tes", ["hapus" => 0], "tgl_tes", "DESC", $rowno, $rowperpage);

        $users_record = [];
        foreach ($record as $i => $record) {
            $users_record[$i] = $record;
            $users_record[$i]['id_hasil'] = md5($record['id_tes']);
            $users_record[$i]['link'] = 'https://toefltest.id/soal/id/'.md5($record['id_tes']);
            $users_record[$i]['tgl_tes'] = date("d-M-Y", strtotime($record['tgl_tes']));
            $users_record[$i]['tgl_pengumuman'] = $this->hari_ini(date("D", strtotime($record['tgl_pengumuman']))) . ", " . $this->tgl_indo(date("d-M-Y", strtotime($record['tgl_pengumuman'])));
            $users_record[$i]['peserta'] = COUNT($this->Main_model->get_all("peserta_toefl", ["id_tes" => $record['id_tes']]));
        }
        // $users_record = $this->Tes_model->getData($rowno,$rowperpage);
     
        // Pagination Configuration
        $config['base_url'] = base_url().'tes/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '>>';
        $config['prev_link']        = '<<';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pagination-md justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
    
        // Initialize
        $this->pagination->initialize($config);
    
        // Initialize $data Array
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['total_rows'] = $allcount;
    
        echo json_encode($data);
     
    }
    
    public function loadPesertaTes(){
        $id_tes = $this->input->post("id_tes");
        $list = $this->Tes_model->datatables_tes($id_tes);

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $peserta) {
            $no++;
            $row = array();
            $row[] = '<center>'.$no.'</center>';

            $url = base_url();
            $row[] = "<a href='#uploadGambar' class='uploadGambar' data-toggle='modal' data-id='{$peserta->id}'><img src='{$url}assets/foto/{$peserta->file}' width='25'></a>".$peserta->nama;

            // skor 
            $skor = round((($this->istima($peserta->nilai_listening) + $this->tarakib($peserta->nilai_structure) + $this->qiroah($peserta->nilai_reading)) * 10) / 3);
            
            $row[] = $this->istima($peserta->nilai_listening);
            $row[] = $this->tarakib($peserta->nilai_structure);
            $row[] = $this->qiroah($peserta->nilai_reading);
            $row[] = $skor;

            if($peserta->sertifikat == "") $sertifikat = '<a href="#addSertifikat" data-toggle="modal" class="btn btn-sm btn-success addSertifikat" data-id="'.$peserta->id.'"><i class="fa fa-award"></i> add</a>';
            else $sertifikat = '<a href="#editSertifikat" data-toggle="modal" class="btn btn-sm btn-info editSertifikat" data-id="'.$peserta->id.'"><i class="fa fa-award mr-2"></i>'.$peserta->sertifikat.'</a>';

            $row[] = $sertifikat;

            if($peserta->sertifikat != "Hard File") $polosan = '<center>-</center>';
            else $polosan = '<a href="'.base_url().'tes/sertifikat/polosan/'.md5($peserta->id).'" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-award mr-2"></i></a>';

            $row[] = $polosan;

            if($peserta->sertifikat == "") $gambar = '<center>-</center>';
            else $gambar = '<a href="'.base_url().'tes/sertifikat/gambar/'.md5($peserta->id).'" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-award mr-2"></i></a>';

            $row[] = $gambar;

            $row[] = '<a href="#editPeserta" data-toggle="modal" class="btn btn-sm btn-info editPeserta" data-id="'.$peserta->id.'">detail</a>';

            $row[] = '<a target="_blank" href="https://toefltest.id/sertifikat/no/'.md5($peserta->id).'" class="btn btn-sm btn-info editPeserta" data-id="'.$peserta->id.'">link</a>';

            $data[] = $row;
        }

        $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->Tes_model->count_all_tes($id_tes),
                    "recordsFiltered" => $this->Tes_model->count_filtered_tes($id_tes),
                    "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function sertifikat($tipe, $id){
        $peserta = $this->Main_model->get_one("peserta_toefl", ["md5(id)" => $id]);
        $tes = $this->Main_model->get_one("tes", ["id_tes" => $peserta['id_tes']]);
        $peserta['jk'] = ucwords(strtolower($peserta['jk']));
        $peserta['nama'] = $peserta['nama'];
        $peserta['t4_lahir'] = ucwords(strtolower($peserta['t4_lahir']));
        $peserta['tahun'] = date('Y', strtotime($tes['tgl_tes']));
        $peserta['bulan'] = $this->getRomawi(date('m', strtotime($tes['tgl_tes'])));
        $peserta['istima'] = $this->istima($peserta['nilai_listening']);
        $peserta['tarakib'] = $this->tarakib($peserta['nilai_structure']);
        $peserta['qiroah'] = $this->qiroah($peserta['nilai_reading']);
        $peserta['tgl_tes'] = $tes['tgl_tes'];

        $skor = (($this->istima($peserta['nilai_listening']) + $this->tarakib($peserta['nilai_structure']) + $this->qiroah($peserta['nilai_reading'])) * 10) / 3;
        $peserta['skor'] = $skor;
        
        if($skor >= 210 && $skor <= 300){
            $peserta['nilai'] = "ضعيف جدا";
        } else if($skor >= 301 && $skor <= 400){
            $peserta['nilai'] = "ضعيف";
        } else if($skor >= 401 && $skor <= 500){
            $peserta['nilai'] = "مقبول";
        } else if($skor >= 451 && $skor <= 500){
            $peserta['nilai'] = "جيد";
        } else if($skor >= 501 && $skor <= 600){
            $peserta['nilai'] = "جيد جدا";
        } else if($skor >= 601 && $skor <= 680){
            $peserta['nilai'] = "ممتاز";
        }

        $peserta['no_doc'] = "{$peserta['no_doc']}/{$peserta['bulan']}/{$peserta['tahun']}";
        
        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 330], 'orientation' => 'L',
        // , 'margin_top' => '43', 'margin_left' => '25', 'margin_right' => '25', 'margin_bottom' => '35',
            'fontdata' => $fontData + [
                'rockb' => [
                    'R' => 'ROCKB.TTF',
                ],'rock' => [
                    'R' => 'ROCK.TTF',
                ],
                'arial' => [
                    'R' => 'arial.ttf',
                    'useOTL' => 0xFF,
                    'useKashida' => 75,
                ],
                'bodoni' => [
                    'R' => 'BOD_R.TTF',
                ],
                'calibri' => [
                    'R' => 'CALIBRI.TTF',
                ],
                'cambria' => [
                    'R' => 'CAMBRIAB.TTF',
                ]
            ], 
        ]);
    
        $peserta['tipe'] = $tipe;
        if($tipe == "gambar") {
            $mpdf->SetTitle("{$peserta['nama']}");
            $mpdf->WriteHTML($this->load->view('pages/tes/sertifikat', $peserta, TRUE));
            $mpdf->Output("{$peserta['nama']}.pdf", "I");
        } else {
            $mpdf->SetTitle("{$peserta['nama']}");
            $mpdf->WriteHTML($this->load->view('pages/tes/sertifikat-polosan', $peserta, TRUE));
            $mpdf->Output("Polosan {$peserta['nama']}.pdf", "I");
        }

    }

    // add 
        public function add_tes(){
            $data = [
                "tgl_tes" => $this->input->post("tgl_tes"),
                "tgl_pengumuman" => $this->input->post("tgl_pengumuman"),
                "tipe_soal" => $this->input->post("tipe_soal"),
                "password" => $this->input->post("password"),
                "waktu" => $this->input->post("waktu"),
                "catatan" => $this->input->post("catatan"),
                "status" => "Berjalan",
            ];

            $data = $this->Main_model->add_data("tes", $data);
            if($data){
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }
        }
        
        public function add_sertifikat(){
            $id = $this->input->post("id");
            $sertifikat = $this->input->post("sertifikat");

            $this->db->select("CONVERT(no_doc, UNSIGNED INTEGER) AS num");
            $this->db->from("peserta_toefl");
            $this->db->order_by("num", "DESC");
            $data = $this->db->get()->row_array();

            if($data) $no = $data['num']+1;
            else $no = 1;

            if($no > 0 && $no < 10) $no_doc = "000".$no;
            elseif($no >= 10 && $no < 100) $no_doc = "00".$no;
            elseif($no >= 100 && $no < 1000) $no_doc = "0".$no;
            elseif($no >= 1000) $no_doc = $no;

            
            $this->load->library('qrcode/ciqrcode'); //pemanggilan library QR CODE
    
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/qrcode/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
    
            $image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim
    
            $params['data'] = "https://toefltest.id/sertifikat/no/".md5($id); //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


            $data = $this->Main_model->edit_data("peserta_toefl", ["id" => $id], ["no_doc" => $no_doc, "sertifikat" => $sertifikat]);
            if($data) echo json_encode(1);
            else echo json_encode(0);
        }

        public function upload_data(){
            if(isset($_FILES['file']['name'])) {

                $id = $this->input->post("id");

                $nama_file = $_FILES['file'] ['name']; // Nama Audio
                $size        = $_FILES['file'] ['size'];// Size Audio
                $error       = $_FILES['file'] ['error'];
                $tipe_audio  = $_FILES['file'] ['type']; //tipe audio untuk filter
                $folder      = "./assets/foto/"; //folder tujuan upload
                $valid       = array('jpg','png','gif','jpeg', 'JPG', 'PNG', 'GIF', 'JPEG'); //Format File yang di ijinkan Masuk ke server
                
                if(strlen($nama_file)){   
                     // Perintah untuk mengecek format gambar
                     list($txt, $ext) = explode(".", $nama_file);
                     if(in_array($ext,$valid)){   

                         // Perintah untuk mengupload file dan memberi nama baru
                        switch ($tipe_audio) {
                            case 'image/jpeg':
                                $tipe_audio = "jpg";
                                break;
                            case 'image/png':
                                $tipe_audio = "png";
                                break;
                            case 'image/gif':
                                $tipe_audio = "gif";
                                break;
                            default:
                                break;
                        }

                         $img_peserta = $id.".".$tipe_audio;

                         $tmp = $_FILES['file']['tmp_name'];
                        
                         
                        if(move_uploaded_file($tmp, $folder.$img_peserta)){   
                            $this->Main_model->edit_data("peserta_toefl", ["id" => $id], ["file" => $img_peserta]);
                            echo json_encode(1);
                            
                        } else { // Jika Audio Gagal Di upload 
                            echo json_encode(0);
                        }
                     } else{ 
                        echo json_encode(2);
                    }
            
                }
                
            }
        }
    // add 
    
    // get 
        public function get_tes(){
            $id_tes = $this->input->post("id_tes");

            $data = $this->Main_model->get_one("tes", ["id_tes" => $id_tes]);
            echo json_encode($data);
        }

        public function get_peserta(){
            $id = $this->input->post("id");

            $data = $this->Main_model->get_one("peserta_toefl", ["id" => $id]);
            echo json_encode($data);
        }
    // get 

    // edit 
        public function edit_tes(){
            $id_tes = $this->input->post("id_tes");
            
            $data = [
                "tgl_tes" => $this->input->post("tgl_tes"),
                "tgl_pengumuman" => $this->input->post("tgl_pengumuman"),
                "tipe_soal" => $this->input->post("tipe_soal"),
                "password" => $this->input->post("password"),
                "waktu" => $this->input->post("waktu"),
                "catatan" => $this->input->post("catatan"),
                "status" => $this->input->post("status"),
            ];

            $data = $this->Main_model->edit_data("tes", ["id_tes" => $id_tes], $data);
            if($data){
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }
        }

        public function edit_peserta(){
            $id = $this->input->post("id");
            
            unset($_POST['id']);
            $data = $this->Main_model->edit_data("peserta_toefl", ["id" => $id], $_POST);

            if($data) echo json_encode(1);
            else echo json_encode(0);
        }

        public function edit_sertifikat(){
            $id = $this->input->post("id");
            
            unset($_POST['id']);
            $data = $this->Main_model->edit_data("peserta_toefl", ["id" => $id], $_POST);

            if($data) echo json_encode(1);
            else echo json_encode(0);
        }
    // edit 

    // delete 
        public function hapus_tes(){
            $id_tes = $this->input->post("id_tes");

            $data = $this->Main_model->edit_data("tes", ["id_tes" => $id_tes], ["hapus" => 1, "status" => "Selesai"]);
            if($data){
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }
        }
    // delete

    // other 
        function hari_ini($hari){
            // $hari = date ("D");
        
            switch($hari){
                case 'Sun':
                    $hari_ini = "Minggu";
                break;
        
                case 'Mon':			
                    $hari_ini = "Senin";
                break;
        
                case 'Tue':
                    $hari_ini = "Selasa";
                break;
        
                case 'Wed':
                    $hari_ini = "Rabu";
                break;
        
                case 'Thu':
                    $hari_ini = "Kamis";
                break;
        
                case 'Fri':
                    $hari_ini = "Jumat";
                break;
        
                case 'Sat':
                    $hari_ini = "Sabtu";
                break;
                
                default:
                    $hari_ini = "Tidak di ketahui";		
                break;
            }
        
            return $hari_ini;
        
        }

        public function tgl_indo($tgl){
            $data = explode("-", $tgl);
            $hari = $data[0];
            $bulan = $data[1];
            $tahun = $data[2];
    
            if($bulan == "01") $bulan = "Januari";
            if($bulan == "02") $bulan = "Februari";
            if($bulan == "03") $bulan = "Maret";
            if($bulan == "04") $bulan = "April";
            if($bulan == "05") $bulan = "Mei";
            if($bulan == "06") $bulan = "Juni";
            if($bulan == "07") $bulan = "Juli";
            if($bulan == "08") $bulan = "Agustus";
            if($bulan == "09") $bulan = "September";
            if($bulan == "10") $bulan = "Oktober";
            if($bulan == "11") $bulan = "November";
            if($bulan == "12") $bulan = "Desember";
    
            return $hari . " " . $bulan . " " . $tahun;
        }
    //

    // generate 
    public function generate_jawaban(){
        $tes = $this->Main_model->get_one("tes", ["id_tes" => "22"]);
        // $tes = $this->Main_model->get_one("tes", ["id_tes" => "13"]);
        $peserta = $this->Main_model->get_all("peserta_toefl", ["id_tes" => $tes['id_tes'], "generate" => 0]);

        foreach ($peserta as $i => $peserta) {
            if($i == 300) {
                echo "Sukses";
                exit();
            }

            $jawaban = str_replace("/salah", "", $peserta['text']);
            $jawaban = str_replace("/benar", "", $jawaban);
            $data_jawaban = explode("###", $jawaban);

            // var_dump($jawaban);
            // exit();

            if($tes['tipe_soal'] == 1){
                $soal = $this->Soal_model->get_soal_istima();
            } else if($tes['tipe_soal'] == 2){
                $soal = $this->Soal_model->get_soal_istimav2();
            }
    
            // $jawaban = $this->input->post("soal_istima");
            $jawaban = array_slice($data_jawaban, 0, 50);
            // var_dump($jawaban);
            $text = "";
            $nilai_listening = 0;
    
            foreach ($soal as $i => $soal) {
                if($soal['jawaban'] == $jawaban[$i]){
                    $nilai_listening += 1;
                    $status = "benar";
                } else {
                    $status = "salah";
                }
    
                $text .= $jawaban[$i]."/".$status."###";
            }
    
            if($tes['tipe_soal'] == 1){
                $soal = $this->Soal_model->get_soal_tarakib();
            } else if($tes['tipe_soal'] == 2){
                $soal = $this->Soal_model->get_soal_tarakibv2();
            }
            // $jawaban = $this->input->post("soal_tarakib");
            $jawaban = array_slice($data_jawaban, 50, 40);
    
            $nilai_structure = 0;
    
            foreach ($soal as $i => $soal) {
                if($soal['jawaban'] == $jawaban[$i]){
                    $nilai_structure += 1;
                    $status = "benar";
                } else {
                    $status = "salah";
                }
    
                $text .= $jawaban[$i]."/".$status."###";
            }
    
            if($tes['tipe_soal'] == 1){
                $soal = $this->Soal_model->get_soal_qiroah();
            } else if($tes['tipe_soal'] == 2){
                $soal = $this->Soal_model->get_soal_qiroahv2();
            }
    
            // $jawaban = $this->input->post("soal_qiroah");
            $jawaban = array_slice($data_jawaban, 90, 50);
    
            $nilai_reading = 0;
    
            foreach ($soal as $i => $soal) {
                if($soal['jawaban'] == $jawaban[$i]){
                    $nilai_reading += 1;
                    $status = "benar";
                } else {
                    $status = "salah";
                }
    
                $text .= $jawaban[$i]."/".$status."###";
            }
    
            $data = [
                "nilai_listening" => $nilai_listening,
                "nilai_structure" => $nilai_structure,
                "nilai_reading" => $nilai_reading,
                "text" => $text,
                "generate" => 1
            ];
    
            $id = $this->Main_model->edit_data("peserta_toefl", ["id" => $peserta['id']], $data);
        }
    }

    function istima($nilai){
        switch ($nilai) {
            case 0:
                $data = 24;
                break;
            case 1:
                $data = 25;
                break;
            case 2:
                $data = 26;
                break;
            case 3:
                $data = 27;
                break;
            case 4:
                $data = 28;
                break;
            case 5:
                $data = 29;
                break;
            case 6:
                $data = 30;
                break;
            case 7:
                $data = 31;
                break;
            case 8:
                $data = 32;
                break;
            case 9:
                $data = 32;
                break;
            case 10:
                $data = 33;
                break;
            case 11:
                $data = 35;
                break;
            case 12:
                $data = 37;
                break;
            case 13:
                $data = 37;
                break;
            case 14:
                $data = 38;
                break;
            case 15:
                $data = 41;
                break;
            case 16:
                $data = 41;
                break;
            case 17:
                $data = 42;
                break;
            case 18:
                $data = 43;
                break;
            case 19:
                $data = 44;
                break;
            case 20:
                $data = 45;
                break;
            case 21:
                $data = 45;
                break;
            case 22:
                $data = 46;
                break;
            case 23:
                $data = 47;
                break;
            case 24:
                $data = 47;
                break;
            case 25:
                $data = 48;
                break;
            case 26:
                $data = 48;
                break;
            case 27:
                $data = 49;
                break;
            case 28:
                $data = 49;
                break;
            case 29:
                $data = 50;
                break;
            case 30:
                $data = 51;
                break;
            case 31:
                $data = 51;
                break;
            case 32:
                $data = 52;
                break;
            case 33:
                $data = 52;
                break;
            case 34:
                $data = 53;
                break;
            case 35:
                $data = 54;
                break;
            case 36:
                $data = 54;
                break;
            case 37:
                $data = 55;
                break;
            case 38:
                $data = 56;
                break;
            case 39:
                $data = 57;
                break;
            case 40:
                $data = 57;
                break;
            case 41:
                $data = 58;
                break;
            case 42:
                $data = 59;
                break;
            case 43:
                $data = 60;
                break;
            case 44:
                $data = 61;
                break;
            case 45:
                $data = 62;
                break;
            case 46:
                $data = 63;
                break;
            case 47:
                $data = 65;
                break;
            case 48:
                $data = 66;
                break;
            case 49:
                $data = 67;
                break;
            case 50:
                $data = 68;
                break;
        }
        return $data;
    }
    
    function tarakib($nilai){
        switch ($nilai) {
            case 0:
                $data = 20;
                break;
            case 1:
                $data = 20;
                break;
            case 2:
                $data = 21;
                break;
            case 3:
                $data = 22;
                break;
            case 4:
                $data = 23;
                break;
            case 5:
                $data = 25;
                break;
            case 6:
                $data = 26;
                break;
            case 7:
                $data = 27;
                break;
            case 8:
                $data = 29;
                break;
            case 9:
                $data = 31;
                break;
            case 10:
                $data = 33;
                break;
            case 11:
                $data = 35;
                break;
            case 12:
                $data = 36;
                break;
            case 13:
                $data = 37;
                break;
            case 14:
                $data = 38;
                break;
            case 15:
                $data = 40;
                break;
            case 16:
                $data = 40;
                break;
            case 17:
                $data = 41;
                break;
            case 18:
                $data = 42;
                break;
            case 19:
                $data = 43;
                break;
            case 20:
                $data = 44;
                break;
            case 21:
                $data = 45;
                break;
            case 22:
                $data = 46;
                break;
            case 23:
                $data = 47;
                break;
            case 24:
                $data = 48;
                break;
            case 25:
                $data = 49;
                break;
            case 26:
                $data = 50;
                break;
            case 27:
                $data = 51;
                break;
            case 28:
                $data = 52;
                break;
            case 29:
                $data = 53;
                break;
            case 30:
                $data = 54;
                break;
            case 31:
                $data = 55;
                break;
            case 32:
                $data = 56;
                break;
            case 33:
                $data = 57;
                break;
            case 34:
                $data = 58;
                break;
            case 35:
                $data = 60;
                break;
            case 36:
                $data = 61;
                break;
            case 37:
                $data = 63;
                break;
            case 38:
                $data = 65;
                break;
            case 39:
                $data = 67;
                break;
            case 40:
                $data = 68;
                break;
        }
        return $data;
    }

    function qiroah($nilai){
        switch ($nilai) {
            case 0:
                $data = 24;
                break;
            case 1:
                $data = 25;
                break;
            case 2:
                $data = 26;
                break;
            case 3:
                $data = 27;
                break;
            case 4:
                $data = 28;
                break;
            case 5:
                $data = 29;
                break;
            case 6:
                $data = 30;
                break;
            case 7:
                $data = 31;
                break;
            case 8:
                $data = 32;
                break;
            case 9:
                $data = 32;
                break;
            case 10:
                $data = 33;
                break;
            case 11:
                $data = 35;
                break;
            case 12:
                $data = 37;
                break;
            case 13:
                $data = 37;
                break;
            case 14:
                $data = 38;
                break;
            case 15:
                $data = 41;
                break;
            case 16:
                $data = 41;
                break;
            case 17:
                $data = 42;
                break;
            case 18:
                $data = 43;
                break;
            case 19:
                $data = 44;
                break;
            case 20:
                $data = 45;
                break;
            case 21:
                $data = 45;
                break;
            case 22:
                $data = 46;
                break;
            case 23:
                $data = 47;
                break;
            case 24:
                $data = 47;
                break;
            case 25:
                $data = 48;
                break;
            case 26:
                $data = 48;
                break;
            case 27:
                $data = 49;
                break;
            case 28:
                $data = 49;
                break;
            case 29:
                $data = 50;
                break;
            case 30:
                $data = 51;
                break;
            case 31:
                $data = 51;
                break;
            case 32:
                $data = 52;
                break;
            case 33:
                $data = 52;
                break;
            case 34:
                $data = 53;
                break;
            case 35:
                $data = 54;
                break;
            case 36:
                $data = 54;
                break;
            case 37:
                $data = 55;
                break;
            case 38:
                $data = 56;
                break;
            case 39:
                $data = 57;
                break;
            case 40:
                $data = 57;
                break;
            case 41:
                $data = 58;
                break;
            case 42:
                $data = 59;
                break;
            case 43:
                $data = 60;
                break;
            case 44:
                $data = 61;
                break;
            case 45:
                $data = 62;
                break;
            case 46:
                $data = 63;
                break;
            case 47:
                $data = 65;
                break;
            case 48:
                $data = 66;
                break;
            case 49:
                $data = 67;
                break;
            case 50:
                $data = 68;
                break;
        }
        return $data;
    }

    function getRomawi($bln){
        switch ($bln){
            case 1: 
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}

/* End of file Tes.php */
