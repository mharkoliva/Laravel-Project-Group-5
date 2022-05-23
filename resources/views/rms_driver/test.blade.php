<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
</head>
<body>
	{{-- {{Session::get('result')}} --}}
	<?php $result = session('result') ?>
	@if (session('result')) 
        <?php echo $text.'()';?>
        <?php extract($result);?>
    @endif
{{-- 	<table border="1">
		<tr>
			<td>ID Number</td>
			<td>Password</td>
		</tr> --}}
		{{-- $data = {{Session::get('result')}}
		@foreach ($data as $datas)
		<tr>
			<td>{{$datas->id_no}}</td>
			<td>{{$datas->password}}</td>
		</tr>
	</table>
	{{$datas}}<br> --}}
		{{-- @endforeach --}}

{{-- <p> --}}
		{{-- @foreach ($result as $datas => $value)
            Hello Driver {{ $trip }}
            {{ $datas }} = {{$value}} <br>
		@endforeach --}}
            {{ $trip }} <br>
            {{ $day }} <br>
            {{ $dayy }} <br>
            {{ $yearr }} <br>
            {{ $tableName }} <br>

            {{-- @foreach ($range as $dates => $valuee)
            	{{ $dates }} => {{ $valuee }} <br>
            @endforeach
 --}}
              <p>
  {{--           Hello Driver <?php echo $account->$id_no ?>,  --}}your computed revenue from {{$startDate}} to {{$endDate}} is <h1><br>&#8369; {{$totalRevenue}}.00</h1><br>Calculated with the following factors:</p>
                    <p>Transportation Rate: <h3>&#8369;{{$fare}}.00/person</h3></p>
                    <p>Total Passenger Count: <h3>{{$totalPassengerCount}}</h3></p>
                    <p>Total Number of Trip: <h3>{{$trip}}</h3></p>
                    <h2>THANK YOU FOR YOUR SERVICE!</h2>


		 @if (session('error'))
					<div style="margin-top:6px;">
				        {{ session('error') }}
				    </div>
				@endif
</body>
</html>