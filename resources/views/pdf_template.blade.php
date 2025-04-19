{{-- <!DOCTYPE html>
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
 --}}

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Monthly Complaints Report - {{ $month }}</title>
     <style>
         body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
         .header { display: flex; justify-content: space-between; margin-bottom: 20px; }
         .logo { width: 120px; }
         .address { font-size: 10px; text-align: right; line-height: 1.4; }
         h2, h3, h4 { margin-bottom: 10px; text-align: center; }
         table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
         table th, table td { border: 1px solid #000; padding: 6px; text-align: left; }
         .badge { padding: 3px 6px; border-radius: 4px; font-size: 10px; color: white; }
         .badge-warning { background-color: #f0ad4e; }
         .badge-success { background-color: #5cb85c; }
         .badge-danger { background-color: #d9534f; }
         .badge-info { background-color: #5bc0de; }
         .badge-secondary { background-color: #6c757d; }
         .summary-table { width: 80%; margin: 0 auto 30px; }
         .page-break { page-break-after: always; }
         .text-center { text-align: center; }
     </style>
 </head>
 <body>

@php
    $logoPath = public_path('assets/images/logo.png');
    $logoData = file_get_contents($logoPath);
    $logoBase64 = 'data:image/png;base64,' . base64_encode($logoData);
@endphp
     <div class="header">
         <div>
             <img src="{{ $logoBase64 }}" alt="Logo" class="logo"/>
         </div>
         <div class="address">
             <strong>DIESEL & MOTOR ENGINEERING PLC</strong><br>
             Address Line 1<br>
             Address Line 2<br>
             Report Date: {{ now()->format('d-M-Y') }}
         </div>
     </div>
 
     <h2>Monthly Complaints Report</h2>
     <h3>{{ $month }}</h3>
 
     <h4>Summary Statistics</h4>
     <table class="summary-table">
         <thead>
             <tr>
                 <th>Total Complaints</th>
                 <th>Closed</th>
                 <th>In Progress</th>
                 <th>Not Assigned</th>
                 <th>Reconsideration</th>
                 <th>Overdue</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td class="text-center">{{ $stats['total'] }}</td>
                 <td class="text-center">{{ $stats['closed'] }}</td>
                 <td class="text-center">{{ $stats['in_progress'] }}</td>
                 <td class="text-center">{{ $stats['not_assigned'] }}</td>
                 <td class="text-center">{{ $stats['reconsider'] }}</td>
                 <td class="text-center">{{ $stats['overdue'] }}</td>
             </tr>
         </tbody>
     </table>
 
     <h4>Complaints by Division</h4>
     <table>
         <thead>
             <tr>
                 <th>Division</th>
                 <th>Number of Complaints</th>
             </tr>
         </thead>
         <tbody>
             @foreach($divisions as $division => $count)
             <tr>
                 <td>{{ $division }}</td>
                 <td class="text-center">{{ $count }}</td>
             </tr>
             @endforeach
         </tbody>
     </table>
 
{{--      <div class="page-break"></div>
 --}} 
     <h4>Detailed Complaints List</h4>
     <table>
         <thead>
             <tr>
                 <th>Ref No</th>
                 <th>Date</th>
                 <th>Customer</th>
                 <th>Category</th>
                 <th>Division</th>
                 <th>Status</th>
                 <th>Priority</th>
             </tr>
         </thead>
         <tbody>
             @foreach($complaints as $complaint)
             <tr>
                 <td>{{ $complaint->id }}</td>
                 <td>{{ $complaint->created_at->format('d-M-Y') }}</td>
                 <td>{{ $complaint->user->name }}</td>
                 <td>{{ $complaint->category }}</td>
                 <td>{{ $complaint->division }}</td>
                 <td>
                     <span class="badge badge-{{ $complaint->status_badge_color }}">
                         {{ $complaint->status_text }}
                     </span>
                 </td>
                 <td>
                     <span class="badge badge-{{ $complaint->priority_badge_color }}">
                         {{ ucfirst($complaint->priority) }}
                     </span>
                 </td>
             </tr>
             @endforeach
         </tbody>
     </table>
 </body>
 </html>