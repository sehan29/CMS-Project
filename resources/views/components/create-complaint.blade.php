@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Validation</h4>
                    <form class="cmxform" id="signupForm" method="get" action="#">
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Catergory</label>
                                <select>
                                    <option>Select Catergory</option>
                                    <option>Crime</option>
                                    <option>Service And Quality Issues</option>
                                    <option>Harasment</option>
                                    <option>Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="details">Email</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="details">Email</label><br>
                                <input type="file" id="myDropify" class="border" />
                            </div>

                            <input class="btn btn-primary" type="submit" value="Submit">
                            <input class="btn btn-danger" type="reset" value="Reset">

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
