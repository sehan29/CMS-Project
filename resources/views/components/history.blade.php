@extends('dashboard')

@section('content')
    <div class="row">
        
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Complaint History</h4>

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
                                    <th>RATING</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>12345677</th>
                                    <td>COMPLAINT NAME COMPLAINT NAME</td>
                                    <td>COMPLAINT NAME</td>
                                    <td>COMPLAINT NAME</td>
                                    <td><span class="badge badge-success">Complete</span></td>
                                    <td> <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View</button></td>
                                    <td>
                                    <div class="star-rating animated-stars">
                                        <input type="radio" id="star5" name="rating" value="5">
                                        <label for="star5" class="bi bi-star-fill"></label>
                                        <input type="radio" id="star4" name="rating" value="4">
                                        <label for="star4" class="bi bi-star-fill"></label>
                                        <input type="radio" id="star3" name="rating" value="3">
                                        <label for="star3" class="bi bi-star-fill"></label>
                                        <input type="radio" id="star2" name="rating" value="2">
                                        <label for="star2" class="bi bi-star-fill"></label>
                                        <input type="radio" id="star1" name="rating" value="1">
                                        <label for="star1" class="bi bi-star-fill"></label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <th>2</th>
                                    <td><span class="badge badge-danger">Not Processed Yet</span></td>
                                    <td><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;View</button>
                                    </td>
                                    <td>
                                        <div class="star-rating animated-stars">
                                            <input type="radio" id="star5" name="rating" value="5">
                                            <label for="star5" class="bi bi-star-fill"></label>
                                            <input type="radio" id="star4" name="rating" value="4">
                                            <label for="star4" class="bi bi-star-fill"></label>
                                            <input type="radio" id="star3" name="rating" value="3">
                                            <label for="star3" class="bi bi-star-fill"></label>
                                            <input type="radio" id="star2" name="rating" value="2">
                                            <label for="star2" class="bi bi-star-fill"></label>
                                            <input type="radio" id="star1" name="rating" value="1">
                                            <label for="star1" class="bi bi-star-fill"></label>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
