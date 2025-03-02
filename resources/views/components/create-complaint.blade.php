@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">MAKE COMPLAINT</h4>
                    <form class="cmxform" id="signupForm" method="get" action="#">
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Catergory<label class="text-danger">*</label></label>
                                <select>
                                    <option>Select Catergory</option>
                                    <option>Crime</option>
                                    <option>Service And Quality Issues</option>
                                    <option>Harasment</option>
                                    <option>Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="details">Description<label class="text-danger">*</label></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="Enter Description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="myDropify" class="form-label">Attachments <label class="text-danger">(Valid Formats Only .jpg / .jpeg / .png / .gif /. pdf / .doc / .docx)</label></label>
                                <input type="file" class="form-control" id="myDropify">
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
