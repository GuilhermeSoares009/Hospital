<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')

      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper" style="text-align:center">
        <div style="padding-top: 100px;">
            <table style="padding:100px; ">
                <tr style="background-color:black;">
                    <th style="padding: 10px;">Doctor Name</th>
                    <th style="padding: 10px;">Phone</th>
                    <th style="padding: 10px;">Speciality</th>
                    <th style="padding: 10px;">Room no</th>
                    <th style="padding: 10px;">Image</th>
                    <th style="padding: 10px;">Delete</th>
                    <th style="padding: 10px;">Update</th>
                </tr>
                @foreach ($data as $doctor)
                    <tr style="background-color:white;">
                        <th style="color: black">{{$doctor->name}}</th>
                        <th style="color: black">{{$doctor->phone}}</th>
                        <th style="color: black">{{$doctor->speciality}}</th>
                        <th style="color: black">{{$doctor->room}}</th>
                        <td><img src="doctorimage/{{$doctor->image}}" height="100"
                        width="100"></td>
                        <td><a onclick="return confirm('Are you sure delete this?')" class="btn btn-danger" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>
                        <td><a class="btn btn-primary" href="{{url('deletedoctor',$doctor->id)}}">Update</a></td>
                @endforeach
            </table>
        </div>
      </div>
    </div>
      @include('admin.script')
  </body>
</html>