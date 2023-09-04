<!DOCTYPE html>
<html lang="en">

<head>
    <style>
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
        <div class="container-fluid page-body-wrapper">
            <div class="container" style="padding-top: 100px;align=center">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            
                        </button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px;">
                        <label for="">Doctor Name</label>
                        <input type="text" name="name" id="" placeholder="Write the name"
                            style="color: black;" required="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Phone</label>
                        <input type="number" name="Phone" id="" placeholder="Write the number"
                            style="color: black;" required="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Speciality</label>
                        <select name="speciality" style="color:black; width:200px" id="" required="">
                            <option>--Select--</option>
                            <option value="skin">skin</option>
                            <option value="heart">heart</option>
                            <option value="eye">eye</option>
                            <option value="nose">nose</option>
                        </select>
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Room No</label>
                        <input type="text" name="room" id="" placeholder="Write the room number"
                            style="color: black;" required="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Doctor Image</label>
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
