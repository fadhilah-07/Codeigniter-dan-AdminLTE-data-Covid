<?php 

class Covid extends CI_Controller{

	public $data;
	public function __construct()
  	{
    parent::__construct();
    $this->load->helper("url");//meload helper di config
    $this->load->model('m_project');// meload model
    $this->load->library('excel');//meload libraris excel
    $this->load->library('dompdf_gen');


  	}
  	//function halaman utama
	public function index()
	{
    $data['tb_covid'] = $this->m_project->get_all_data();//memanggil fungsi get_all_data di m_project
    $this->load->view('templates/template', $data);
    $this->load->view('templates/content', $data);
 
  	}

	public function tambah_data(){ //fungsi untuk menginput data di database
		$kecamatan		= $this->input->post('kecamatan');//isi sesuai nama field yang ada database
		$pp				= $this->input->post('pp');//isi sesuai nama field yang ada database
		$odp 			= $this->input->post('odp');//isi sesuai nama field yang ada database
		$pdp 			= $this->input->post('pdp');//isi sesuai nama field yang ada database
		$positif		= $this->input->post('positif');//isi sesuai nama field yang ada database
		$data = array(
			'kecamatan' 	=> $kecamatan,
			'pp'		=> $pp,
			'odp'	=> $odp,
			'pdp'		=> $pdp,
			'positif'	=> $positif
		);

		$this->m_project->input_data($data, 'tb_covid');//statistik ngeload nama file dari view
		redirect ('Covid/index');
	}

	public function hapus ($id)
	{
		$where = array ('id' => $id);
		$this->m_project->hapus_data($where, 'tb_covid');
		redirect ('Covid/index');
	}

	public function edit_datacovid($id)//$id untuk menampilkan tabel yang akan di edit mengarah hanya pada id yang kita klik
	{
		$where = array ('id'=>$id);
		$c['Covid'] = $this->m_project->edit_data($where,'tb_covid')->result();//Covid : adalah milik nama controller
		$this->load->view("templates/template",$c);
		$this->load->view("crud_view",$c);
		$this->load->view("templates/footer");
	}

	public function update(){
		//mengambil data dari database yang akan di update 
		$id			= $this->input->post('id');// id, sesuai nama field yang ada di tb_covid
		$kecamatan			= $this->input->post('kecamatan');//kecamatan, sesuai nama field yang ada di tb_covid
		$pp			= $this->input->post('pp');//pp, sesuai nama field yang ada di tb_covid
		$odp			= $this->input->post('odp');//odp, sesuai nama field yang ada di tb_covid
		$pdp		= $this->input->post('pdp');//pdp, sesuai nama field yang ada di tb_covid
		$positif		= $this->input->post('positif'); //positif, sesuai nama field yang ada di tb_covid
		
		$c = array(
			'id'		=> $id,
			'kecamatan' 	=> $kecamatan,
			'pp'		=> $pp,
			'odp'		=> $odp,
			'pdp'=> $pdp,
			'positif'	=> $positif
		);
		$where = array(
			'id' => $id
		);
		$this->m_project->update_data($where,$c,'tb_covid');
		redirect('Covid/index');
	}

	public function saveimport()
        {
            if(isset($_FILES["file"]["name"]))
            {
                $path 		= $_FILES["file"]["tmp_name"];
                $object 	= PHPExcel_IOFactory::load($path);
                foreach($object->getWorksheetIterator() as $worksheet)
                {
                    $highestRow 		= $worksheet->getHighestRow();
                    $highestColumn 		= $worksheet->getHighestColumn();
                    for($row=2; $row<=$highestRow; $row++)
                    {
                        $id 		= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $kecamatan	= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $pp 		= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $odp		= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $pdp		= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $positif	= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $data[] 	= array(
                            'id'        =>    $id,
                            'kecamatan' =>    $kecamatan,
                            'pp' 		=> $pp,
                            'odp' 		=> $odp,
                            'pdp'   	=> $pdp,
                            'positif' 	=> $positif
                        );
                    }
                }
                $this->m_project->insertimport($data);
                redirect('Covid/index');
            }
        }

	public function export1() {
    error_reporting(E_ALL);
    
    include_once "libraries/PHPExcel.php"; 
    $objPHPExcel = new PHPExcel();

    $data = $this->m_project->fetch_data();

    $objPHPExcel = new PHPExcel(); 
    $objPHPExcel->setActiveSheetIndex(0); 
    $rowCount = 1; 
    //Penamaan label header pada Excel, untuk baris dan kolom A digunakan untuk ID
    //begitu seterusnya 
    
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "id");
    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "kecamatan");
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "pp");
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "odp");
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "pdp");
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "positif");
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "tanggal_pengambilan");
    $rowCount++;
    //pemanggilan data dari database
    foreach($data as $value){
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->kecamatan); 
        $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$rowCount, $value->pp);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->odp); 
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->pdp); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->positif); 
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->tanggal_pengambilan); 
        $rowCount++; 
    } 

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
    $objWriter->save('Data corona.xlsx'); //hasil save terletak folder assets/excel dengan nama file Data corona

    $this->load->helper('download');
    force_download('Data corona.xlsx', NULL);
  }

  public function statistik()
	{
		$data['stat'] = $this->m_project->kecamatan();
		
		$this->load->view('statistik', $data);
		
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data['tb_covid'] = $this->m_project->get_all_data();
		$this->load->view('laporan_pdf',$data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_datacorona.pdf", array('Attacment' =>0));

	}
}