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
                    <th style="padding: 10px;">Customer Name</th>
                    <th style="padding: 10px;">Email</th>
                    <th style="padding: 10px;">Phone</th>
                    <th style="padding: 10px;">Doctor Name</th>
                    <th style="padding: 10px;">Date</th>
                    <th style="padding: 10px;">Status</th>
                    <th style="padding: 10px;">Approved</th>
                    <th style="padding: 10px;">Canceled</th>
                </tr>
                @foreach ($data as $appoint)
                    <tr style="background-color:white;">
                        <th style="padding: 10px;color: black">{{$appoint->name}}</th>
                        <th style="padding: 10px;color: black">{{$appoint->email}}</th>
                        <th style="padding: 10px;color: black">{{$appoint->phone}}</th>
                        <th style="padding: 10px;color: black">{{$appoint->doctor}}</th>
                        <th style="padding: 10px;color: black">{{$appoint->message}}</th>
                        <th style="padding: 10px;color: black">{{$appoint->status}}</th>
                        <th style="padding: 10px;color: black">
                            <a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approved</a>
                        </th>
                        <th style="padding: 10px;color: black">
                            <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Canceled</a>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
      </div>

    </div>
      @include('admin.script')
  </body>
</html>