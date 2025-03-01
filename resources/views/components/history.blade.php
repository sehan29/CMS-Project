@extends('dashboard')

@section('content')


<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>REF NO</th>
                                <th>COMPLAINT NAME</th>
                                <th>REG DATE</th>
                                <th>OVER DUE DAYS</th>
                                <th>STATUS</th>
                                <th>ACTION</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark</td>
                             </tr>
                            <tr>
                                <th>2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <th>2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                            </tr>
                             
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>
    </div>
</div>



@endsection