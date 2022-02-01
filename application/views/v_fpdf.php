<?php
		$pdf = new FPDF('l','mm','A5');
		//buat halaman baru
		$pdf->AddPage();
		//setting font
		$pdf->SetFont('Arial','B','16');
		//cetak string
		$pdf->Cell(190,7,'Dosen UPH',0,1,'C');

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,'Fakultas Ilmu Komputer',0,1,'C');
		//space agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(20,6,'NIDN',1,0);
		$pdf->Cell(30,6,'Nama Dosen',1,0);
		$pdf->Cell(50,6,'Nama Prodi',1,0);
		$pdf->Cell(70,6,'Email Dosen',1,1);
		
		$pdf->SetFont('Arial','',10);

		foreach ($dosen as $row){
			$pdf->Cell(20,6,$row->nidn,1,0);
			$pdf->Cell(30,6,$row->nama_dosen,1,0);
			$pdf->Cell(50,6,$row->nama_prodi,1,0);
			$pdf->Cell(70,6,$row->email_dosen,1,1);
		}
		$pdf->Output();
		
?>