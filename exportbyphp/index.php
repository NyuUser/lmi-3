<?php
// Sample data for the table
$data = array(
    array("Name", "Age", "Country"),
    array("John", 25, "USA"),
    array("Emily", 30, "Canada"),
    array("David", 40, "UK")
);

// Function to generate HTML table
function generate_table($data) {
    $html = '<table border="1">';
    foreach ($data as $row) {
        $html .= '<tr>';
        foreach ($row as $cell) {
            $html .= '<td>' . htmlspecialchars($cell) . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
}

// Generate HTML table
$table_html = generate_table($data);

// Output HTML
echo $table_html;

// Offer export options
echo '<br>';
echo '<a href="export.php?type=csv&data=' . urlencode(serialize($data)) . '">Export as CSV</a>';
echo '<br>';
echo '<a href="export.php?type=pdf&data=' . urlencode(serialize($data)) . '">Export as PDF</a>';
?>
