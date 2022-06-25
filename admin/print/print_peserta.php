<?php
    include_once('../../config/database.php');
    // CARI VENDOR PHPOFFICE
    require "../../vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    if(isset($_POST['cetak'])){
        // BUAT EXCEL
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Peserta");
        
        // AMBIL DATA
        $peserta = "SELECT * FROM `peserta`";
        $data_peserta = mysqli_query($mysqli, $peserta);
        $i = 2;
        $sheet->setCellValue("A1", "ID Client");
        $sheet->setCellValue("B1", "NAMA");
        $sheet->setCellValue("C1", "jenis Kelamin");

        foreach($data_peserta as $hasil){
            $jk = '';
            if($hasil['JK'] == 1){
                $jk = 'Perempuan';
            }else{
                $jk = 'Laki - Laki';
            }
            $sheet->setTitle("Users");
            $sheet->setCellValue("A".$i, $hasil["ID_CLIENT"]);
            $sheet->setCellValue("B".$i, $hasil["NAMA"]);
            $sheet->setCellValue("C".$i, $jk);
            $i++;
        }

        // Download
            $writer = new Xlsx($spreadsheet);
            

            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header("Content-Disposition: attachment;filename=\"peserta.xlsx\"");
            header("Cache-Control: max-age=0");
            header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: cache, must-revalidate");
            header("Pragma: public");
            $writer->save("php://output");

    }
?>