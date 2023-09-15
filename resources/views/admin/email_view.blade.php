<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">

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
                <form action="{{ url('sendemail', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px;">
                        <label for="">Greeting</label>
                        <input type="text" name="greeting" id="" placeholder="Write the name"
                            style="color: black;" required="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Body</label>
                        <input type="number" name="body" id="" placeholder="Write the number"
                            style="color: black;" required="">
                    </div>                
                    <div style="padding: 15px;">
                        <label for="">Action Text</label>
                        <input type="text" name="actiontext" id="" style="color: black;" required="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">Action Url</label>
                        <input type="text" name="actionurl" id="" style="color: black;" required="">
                    </div>
                    <div style="padding: 15px;">
                        <label for="">End Part</label>
                        <input type="text" name="endpart" id="" style="color: black;" required="">
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
