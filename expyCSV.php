<?php
if(isset($_POST['tabledata'])) {
    $tableData = json_decode($_POST['tabledata'], true);

    if (!empty($tableData)) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="export.csv"');

        $output = fopen('php://output', 'w');

        foreach ($tableData as $row) {
            fputcsv($output, $row);
        }

        fclose($output);
        echo 'success'; // Echoing success if CSV generation is successful
        exit;
    } else {
        echo "No data received.";
    }
} else {
    echo "No data received.";
}
?>
