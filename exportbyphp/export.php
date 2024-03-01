<?php
require_once('../TCPDF/tcpdf.php');

if(isset($_GET['type']) && ($_GET['type'] == 'pdf' || $_GET['type'] == 'csv') && isset($_GET['data'])) {
    $data = unserialize(urldecode($_GET['data']));

    if($_GET['type'] == 'pdf') {
        // Create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Table Export');
        $pdf->SetSubject('Table Export');
        $pdf->SetKeywords('Table, Export, PDF');
        
        // Set default header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        
        // Add a page
        $pdf->AddPage();
        
        // Set font
        $pdf->SetFont('helvetica', '', 10);
        
        // Output table
        $html = '<table border="1">';
        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td>' . htmlspecialchars($cell) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // Close and output PDF
        $pdf->Output('table.pdf', 'D');
        exit;
    } else {
        // Export as CSV logic goes here
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="table.csv"');
        $output = fopen('php://output', 'w');
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
        exit;
    }
} else {
    echo "Invalid export type or data.";
}
?>
