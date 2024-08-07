<?php
    require"fpdf/fpdf.php";
    $db = new PDO('mysql:host=localhost;dbname=cvsuadmissionsystem','root','');
    class myPDF extends FPDF{
        function header(){
        
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(276,5,'LIST OF STUDENTS',0,0,'C');
            $this->Ln();
            $this->SetFont('Times','',12);
            $this->Cell(276,10,'Cavite State University Imus Campus',0,0,'C');
            $this->Ln(20);
        }
        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial', '',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/(nb)',0,0,'C');
        }
        function headerTable(){
            $this->SetFont('Times', 'B', 12);
            $this->Cell(31,10, 'LRN',1,0,'C');
            $this->Cell(31,10, 'LAST NAME',1,0,'C');
            $this->Cell(31,10, 'FIRST NAME',1,0,'C');
            $this->Cell(15,10, 'M.I',1,0,'C');
            $this->Cell(15,10, 'SEX',1,0,'C');
            $this->Cell(34,10, 'CELLPHONE#',1,0,'C');
            $this->Cell(44,10, 'EMAIL',1,0,'C');
            $this->Cell(44,10, 'COURSE',1,0,'C');
            $this->Cell(31,10, 'STATUS',1,0,'C');
            $this->Ln();
        }
        function viewTable($db){
            $this->SetFont('Times','',12);
            $stmt = $db->query('SELECT pi.student_id, pi.firstname, pi.middlename, pi.lastname, pi.sex, pi.cellphone_number, pi.email, ai.lrn, ai.preferred_course, ai.status
                                FROM personalinformation pi
                                INNER JOIN admissioninformation ai
                                ON pi.student_id = ai.student_id;');
            while($data=$stmt->fetch(PDO::FETCH_OBJ)){
                $this->Cell(31,10, $data->lrn,1,0,'C');
                $this->Cell(31,10, $data->lastname,1,0,'C');
                $this->Cell(31,10, $data->firstname,1,0,'C');
                $this->Cell(15,10, $data->middlename,1,0,'C');
                $this->Cell(15,10, $data->sex,1,0,'C');
                $this->Cell(34,10, $data->cellphone_number,1,0,'C');
                $this->Cell(44,10, $data->email,1,0,'C');
                $this->Cell(44,10, $data->preferred_course,1,0,'C');
                $this->Cell(31,10, $data->status,1,0,'C');
                $this->Ln();
            }
        }
    }
    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewTable($db);
    $pdf->Output();
?>