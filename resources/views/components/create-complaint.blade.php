@extends('dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">MAKE COMPLAINT</h4>
                <form id="complaintForm" method="POST" action="{{ route('complaint.store') }}" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="category">Category <label class="text-danger">*</label></label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Crime">Crime</option>
                                <option value="Service And Quality Issues">Service And Quality Issues</option>
                                <option value="Harassment">Harassment</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="details">Description <label class="text-danger">*</label></label>
                            <textarea class="form-control" id="details" name="details" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="dropzone">Attachments</label>
                            <div class="dropzone" id="myDropzone"></div>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Submit">
                        <input class="btn btn-danger" type="reset" value="Reset">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<script>
    Dropzone.autoDiscover = false;

    let myDropzone = new Dropzone("#myDropzone", {
        url: "{{ route('complaint.upload') }}",
        maxFilesize: 5,
        acceptedFiles: ".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx",
        addRemoveLinks: true,
        dictDefaultMessage: "Drag & drop files here or click to upload",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(file, response) {
            let inputFile = document.createElement('input');
            inputFile.setAttribute('type', 'hidden');
            inputFile.setAttribute('name', 'attachments[]');
            inputFile.setAttribute('value', response.file_path);
            document.querySelector('#complaintForm').appendChild(inputFile);
        }
    });

    document.querySelector('#complaintForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("{{ route('complaint.store') }}", {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => alert('Complaint submitted successfully!'))
        .catch(error => alert('Error submitting complaint.'));
    });
</script>
@endsection
