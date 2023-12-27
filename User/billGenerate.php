<?php
session_start();
include('config/dbconn.php');
// require "dbconfig.php";
require('TCPDF/tcpdf.php');

ob_clean();

class CustomPDF extends TCPDF
{


    public function Header()
    {
        $this->SetFillColor(209, 208, 205); // Set the background color
        $this->Rect(0, 10, 350, 30, 'F'); // Draw a rectangle with the specified background color

        // Logo
        $imagePath = 'logo.jpg'; // Replace with your logo image path
        $this->Image($imagePath, 10, 10, 40, 40, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Title and subtitle
        $this->SetFont('helvetica', 'B', 16);

        // Set the text color to red
        $this->SetTextColor(0, 0, 0);

        // Save the current position
        $x = $this->GetX() + 8;
        $y = $this->GetY() + 3;

        // Set the border color and width
        $this->SetDrawColor(21, 0, 255);
        $this->SetLineWidth(1);

        // Draw the rounded rectangle border
        $this->RoundedRect($x, $y, 100, 10, 5, '1111', 'D');

        // Print the text inside the rectangle
        $this->Cell(110, 15, 'Siddhi Car Rental Services', 0, 1, 'C');

        $this->SetTextColor(0, 0, 0);

        $this->SetFont('helvetica', 'B', 12);
        $this->Cell(200, 15, 'Drive the Road to Adventure with Our Car Rental Services.', 0, 1, 'C');
    }

    public function Footer()
    {
        $this->SetY(-28); // Set the position of the footer

        $this->SetFont('helvetica', '', 12);
        $this->MultiCell(0, 10, 'NOTE:    1. Cheque Should Be drawn in favor of "Siddhi Car Rental Services"' . "\n" .
            '               2. GST 5% on Renting of Motor Vehicles' . "\n" .
            '               3. Rates are subject to change without prior notice.' . "\n" .
            '               4. Govt. Taxes May vary as per Govt. Policies and are to be paid as per actual.', 0, 'L');


    }
}

// Create new PDF instance
$pdf = new CustomPDF('P', 'mm', 'A4', true, 'UTF-8');

$pdfFilename = __DIR__ . '/../uploads/pdf_report/booking_form_' . date('YmdHis') . '.pdf';

// Create the directory if not present
$pdfDirectory = '../uploads/pdf_report/';
if (!is_dir($pdfDirectory)) {
    mkdir($pdfDirectory, 0777, true);
}

// $pdf = new CustomPDF('P', 'mm', 'A4', true, 'UTF-8');


if (isset($_SESSION['usename'])) {

    $usename = $_SESSION['usename'];

    $sql = "SELECT * FROM tripregister where customername='$usename' AND (tripstatus = 'Approved')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {

            // Set document information
            $pdf->SetCreator('Rohan Raikar');
            $pdf->SetAuthor('Rohan Raikar');
            $pdf->SetTitle('Siddhi Car Rental Services');

            // Add a page
            $pdf->AddPage();

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFillColor(245, 245, 245); // Off-white color
            $pdf->SetFont('helvetica', 'B', 12);

            $labelWidth = 50;
            $valueWidth = 150;
            $cellHeight = 8;
            $headerY = 42;
            $headerX = 10;
            $labels = array('Customer Name:', 'Mobile No:', 'Address:');
            $values = array($row['customername'], $row['customerphone'], $row['customeraddress']);

            $tableX = $headerX;
            $tableY = $headerY;
            $tableWidth = $labelWidth + $valueWidth;
            $tableHeight = $cellHeight * count($labels);

            $pdf->Rect($tableX, $tableY, $tableWidth, $tableHeight, 'F'); // Draw plain table without border

            for ($i = 0; $i < count($labels); $i++) {
                $x = $tableX;
                $y = $tableY + ($cellHeight * $i);

                $pdf->Rect($x, $y, $labelWidth, $cellHeight, 'F'); // Draw plain cell without border
                $pdf->MultiCell($labelWidth, $cellHeight, $labels[$i], 0, 'L', 0, 1, $x, $y, true);

                $pdf->Rect($x + $labelWidth, $y, $valueWidth, $cellHeight, 'F'); // Draw plain cell without border
                $pdf->MultiCell($valueWidth, $cellHeight, $values[$i], 0, 'L', 0, 1, $x + $labelWidth, $y, true);
            }




            $pdf->SetFont('times', 'B', 14);
            $pdf->SetFillColor(59, 59, 59); // #3b3b3b color
            $pdf->SetTextColor(255, 255, 255); // White color
            $pdf->SetFont('helvetica', 'B', 14);
            $sectionHeight = 15;
            $sectionX = ($pdf->GetPageWidth() - $pdf->GetStringWidth('Billing DETAILS & CALCULATIONS')) / 6;
            $sectionY = 68;
            $pdf->Rect(0, $sectionY, 210, $sectionHeight, 'F', array(), array(59, 59, 59));
            $pdf->SetXY($sectionX, $sectionY);
            $pdf->Cell(0, $sectionHeight, 'Billing DETAILS & CALCULATIONS', 0, 0, 'C', 0);




            $pdf->SetTextColor(0, 0, 0);
            // Set background color
            $pdf->SetFillColor(245, 245, 245); // Off-white color

            $centerX = ($pdf->GetPageWidth() - $pdf->GetStringWidth('Description Details')) / 4; // Adjusted the center position calculation

            $pdf->SetXY($centerX, $pdf->GetY() + 25);

            $pdf->SetTextColor(245, 245, 245);

            $pdf->SetFillColor(227, 47, 41); // Set the background color
            $pdf->Cell(80, 10, 'Description', 1, 0, 'C', 1); // Adjusted to 80 width and 10 height

            $pdf->SetFillColor(227, 47, 41); // Set the background color
            $pdf->Cell(40, 10, 'Details', 1, 1, 'C', 1); // Adjusted to 40 width and 10 height

            $pdf->SetFont('times', '', 12);


            $carRentalFee = $row['carrentalfee']; // Assuming $row['carrentalfee'] holds the car rental fee
            $tripRatePerKm = $row['tripratekm']; // Assuming $row['tripratekm'] holds the trip rate per kilometer
            $tripKilometers = $row['tripkilometers']; // Assuming $row['tripkilometers'] holds the total trip kilometers

            $totalAmount = $carRentalFee + ($tripRatePerKm * $tripKilometers);

            $gstRate = 5; // GST rate in percentage
            $gstAmount = ($totalAmount * $gstRate) / 100;
            $totalAmountWithGST = $totalAmount + $gstAmount;

            $tableData = array(
                array('Car Name', $row['carname']),
                array('Car Number', $row['carno']),

                array('PickUp Address', $row['pickupaddress']),
                array('DropOff Adress', $row['dropoffadress']),

                array('Trip Route', $row['triproute']),

                array('Driver Name', $row['drivername']),
                array('Car Rental Fee', $row['carrentalfee']),
                array('Car Rate Per KM', $row['tripratekm']),
                array('Total Trip Kilometers', $row['tripkilometers']),
                array('Trip Time', $row['triptime']),
                array('Taxable Amount (Excluding Tax)', 'Rs. ' . number_format($totalAmount, 2)),
                array('Tax', '5% GST Applicable'),


                array('Total Amount (GST added)', 'Rs. ' . number_format($totalAmountWithGST, 2)),
                array('Security Deposit Amount(Refundable)', 'Rs. ' . number_format(10000 - $totalAmountWithGST, 2)),
                array('Total Amount To Be Paid', 'Rs. ' . number_format(10000, 2)),

            );



            $pdf->SetTextColor(0, 0, 0);


            $startX = $centerX;
            $startY = $pdf->GetY(); // Adjusted the starting Y position
            $cellWidth = 80; // Adjusted to 80
            $cellHeight = 10; // Adjusted to 10

            foreach ($tableData as $row) {
                $pdf->SetXY($startX, $startY);

                $pdf->SetFillColor(247, 200, 198); // Set the background color

                if ($row[0] === 'Total Amount (GST added)' || $row[0] === 'Taxable Amount (Excluding Tax)') {
                    $pdf->SetFillColor(255, 145, 140); // Set the background color
                }

                $pdf->Cell($cellWidth, $cellHeight, $row[0], 1, 0, 'C', 1);

                $pdf->SetFillColor(255, 255, 255); // Set the background color

                if ($row[0] === 'Total Amount (GST added)' || $row[0] === 'Taxable Amount (Excluding Tax)') {
                    $pdf->SetFillColor(199, 199, 199); // Set the background color
                }

                $pdf->SetXY($startX + $cellWidth, $startY); // Adjusted the X position for the second cell
                $pdf->Cell(40, $cellHeight, $row[1], 1, 1, 'C', 1); // Adjusted to 40 width and 10 height

                $startY += $cellHeight;
            }



            $lineY = $pdf->GetPageHeight(); // Adjust the Y-coordinate as needed
            $pdf->Line(0, 265, 10300, 250);


            $pdf->Output($pdfFilename, 'F');
            $_SESSION['pdf_files'][] = $pdfFilename;
        }

        // Output the last generated PDF to the browser
        $pdf->Output('booking_form.pdf', 'I');
    } else {
        ?>
        <tr>
            <td>No Record Found</td>
        </tr>
        <?php
    }
}

?>