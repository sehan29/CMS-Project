<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complaint Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .logo {
            width: 120px;
        }

        .address {
            font-size: 10px;
            text-align: right;
            line-height: 1.4;
        }

        h4, h5 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        .badge-warning {
            color: #fff;
            background-color: #f0ad4e;
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 10px;
        }

        .status, .date {
            width: 90px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div>
            <img src="{{ public_path('../assets/images/logo.png') }}" alt="Logo" class="logo" width="100" height="100">
        </div>
        <div class="address">
            <strong>DIESEL & MOTOR ENGINEERING PLC</strong><br>
            DIESEL & MOTOR ENGINEERING PLC.<br>
            DIESEL & MOTOR ENGINEERING PLC<br>
        </div>
    </div>

    <div class="title-section">
        <h2>Complaint Reports</h2>
    </div>

    <h3>Overall Complaints Summary</h3>
    <table>
        <thead>
            <tr>
                <th>Month Name</th>
                <th>Total Complaint</th>
                <th>Closed Complaint</th>
                <th>Not Assign Complaint</th>
                <th>In Progress Complaint</th>
                <th>Average Rating</th>
                <th>New Users</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>April</td>
                <td>120</td>
                <td>20</td>
                <td>30</td>
                <td>3.5/5</td>
                <td>5/5</td>
                <td>10</td>
            </tr>
        </tbody>
    </table>

    <h3>Complaints Summary</h3>
    <table>
        <thead>
            <tr>
                <th>Ref No</th>
                <th class="date">Date</th>
                <th>Customer Name</th>
                <th>Passport No/NIC</th>
                <th>Contact No</th>
                <th class="status">Status</th>
                <th>Assigned Division</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 9; $i++)
            <tr>
                <td>CUS 123455</td>
                <td>12-April-2025</td>
                <td>Jhon Jhon</td>
                <td>200999</td>
                <td>1234560</td>
                <td><span class="badge-warning">In Progress</span></td>
                <td>Tourist Police</td>
            </tr>
            @endfor
        </tbody>
    </table>

    <p><strong>Note:</strong> Chart graphics are not supported in PDF generation via DomPDF. Consider exporting chart data as tables or using static images if needed.</p>

</body>
</html>
