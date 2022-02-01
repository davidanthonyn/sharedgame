<?php
    $pdf = new TCPDF('L', 'mm', 'A5');
    $pdf->SetTitle('Laporan Dosen');
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
    $pdf->AddPage();
	
	$html='<h3 align="center">Data Dosen UPH</h3>
			<h3 align="center">Fakultas Ilmu Komputer</h3>
			<table border="1">
			<tr >
				<th>NIDN</th>
				<th>Nama Dosen</th>				
				<th>Nama Prodi</th>
				<th>Email Dosen</th>
			</tr>';
	foreach ($dosen as $listDosen) 
	{

		$html.='
		<tr>
			<td> '.$listDosen->nidn.' </td>
			<td> '.$listDosen->nama_dosen.' </td>
			<td> '.$listDosen->nama_prodi.' </td>
			<td> '.$listDosen->email_dosen.' </td>
		</tr>';
	}
	$html.='</table>';
	$pdf->writeHTML($html); 	
    $pdf->Output('contoh1.pdf');
?>