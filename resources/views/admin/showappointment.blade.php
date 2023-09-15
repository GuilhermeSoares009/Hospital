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
                    <th style="padding: 10px;">Send Mail</th>
                </tr>
                @foreach ($data as $appoint)
                    <tr style="background-color:white;">
                        <td style="padding: 10px;color: black">{{$appoint->name}}</td>
                        <td style="padding: 10px;color: black">{{$appoint->email}}</td>
                        <td style="padding: 10px;color: black">{{$appoint->phone}}</td>
                        <td style="padding: 10px;color: black">{{$appoint->doctor}}</td>
                        <td style="padding: 10px;color: black">{{$appoint->message}}</th>
                        <td style="padding: 10px;color: black">{{$appoint->status}}</td>
                        <td style="padding: 10px;color: black">
                            <a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approved</a>
                        </td>
                        <td style="padding: 10px;color: black">
                            <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Canceled</a>
                        </td>
                        <td style="padding: 10px;color: black">
                            <a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send Mail</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
      </div>

    </div>
      @include('admin.script')
  </body>
</html>