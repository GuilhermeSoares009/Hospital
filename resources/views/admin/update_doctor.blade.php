<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper d-flex flex-column">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">

                    </button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="container">
                <form action="{{ url('editdoctor', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px;">
                        <label for="">Doctor Name</label>
                        <input value="{{ $data->name }}" type="text" name="name" style="color: black;"
                            required="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Phone</label>
                        <input value="{{ $data->phone }}" type="number" name="phone" id=""
                            placeholder="Write the number" style="color: black;" required="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Speciality</label>
                        <input type="text" name="speciality" style="color: black;" required=""
                            value="{{ $data->speciality }}" id="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Room No</label>
                        <input value="{{ $data->room }}" type="text" name="room" id=""
                            placeholder="Write the room number" style="color: black;" required="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Old Image</label>
                        <img src="doctorimage/{{ $data->image }}" width="150" height="150" alt="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Change Image</label>
                        <input type="file" name="image">
                    </div>
                    <div style="padding: 15px;">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>

    </div>
    @include('admin.script')
</body>

</html>
