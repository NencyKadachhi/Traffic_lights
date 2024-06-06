@extends("layout.app")
@section("section")
<div class="container">
    <form action="{{route('storeData')}}" id="myform" method="post">
        @csrf
        <div class="traffic-lights shape">
            <div>
                <div class="light"></div>
                <input type="number" class="form-control" name="first_inp" id="first_inp" placeholder="Light A" />
            </div>
            <div>
                <div class="light"></div>
                <input type="number" class="form-control" name="sec_inp" id="sec_inp" placeholder="Light B" />
            </div>
            <div>
                <div class="light"></div>
                <input type="number" class="form-control" name="third_inp" id="third_inp" placeholder="Light C" />
            </div>
            <div>
                <div class="light"></div>
                <input type="number" class="form-control" name="four_inp" id="four_inp" placeholder="Light D" />
            </div>
            <hr>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <label for="green_l_i"><span>Green light interval</span></label>
                    <input type="number" class="form-control green_l_i" name="green_l_i" id="green_l_i" placeholder="Green Light Interval" />
                </div>
                <div class="col-md-12">
                    <label for="yellow_l_i"><span>Yellow light interval</span></label>
                    <input type="number" class="form-control yellow_l_i" name="yellow_l_i" id="yellow_l_i" placeholder="Yellow Light Interval" />
                </div>
            </div>
            <hr>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <input type="submit" name="start" value="Start" class="btn btn-success form-control"></input>
                </div>
                <br>
                <div class="col-md-6">
                    <button type="button" id="end" class="btn btn-warning form-control">End</button>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection
@section("css")
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section("script")
<script>
    var storeData = "{{route('storeData')}}";
    var getData = "{{route('getData')}}";
</script>
<script type="text/javascript" src="{{asset('js/app.js') }}"></script>
@endsection

</html>