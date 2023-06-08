@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container">
        <form action="{{route('leave.store')}}" method="post" class="col-md-6">
            @csrf
            <label for="dataLeave">Title (your reason for leaving)</label>
            <select name="name" id="dataLeave" onchange="selection()" class="form-control border p-2">
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Cuti">Cuti</option>
                <option value="Cuti Lainnya">Cuti Lainnya</option>
            </select>
            <input type="text" id="input1" class="form-control border p-2 d-none mt-2"
                placeholder="Write your reason here">

            <label for="dataStart">leave start date *M/D/Y</label>
            <input required type="date" onchange="dataSetStart()" name="start_leave" id="dataStart" class="form-control border p-2">

            <label for="dataEnd">leave end date *M/D/Y</label>
            <input required type="date" onchange="dateset()" name="end_leave" id="dataEnd" class="form-control border p-2">

            <input required type="text" name="status" value="pending" id="" hidden>
            <input required type="text" name="id_luser" value="{{Auth::user()->id}}" id="" hidden>

            <p>total <span id="span"></span> <span id="span2"></span></p>

            @foreach($user as $row)
            <input required type="text" name="id_manager" value="{{$row->dept->id_manager}}" id="" hidden>

            <input required type="text" name="id_supervisor" value="{{$row->dept->id_supervisor}}" id="" hidden>
            @endforeach

            <div class="text-end mt-4 d-flex justify-content-end">
                <p class="my-1 me-2">*The rest of your leave this year is {{$result}} day</p>
                <button class="btn btn-success" type="submit" id="send-leave" onclick="sendLeave()">Send</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    function dataSetStart() {
        const startdate =  document.getElementById('dataStart').value;

        document.getElementById('dataEnd').min = new Date(startdate).toISOString().split("T")[0];

        document.getElementById('dataEnd').value = new Date(startdate).toISOString().split("T")[0];
    }

    function dateset() {
    const startdate =  document.getElementById('dataStart').value;
    const enddate =  document.getElementById('dataEnd').value;

    const date1 = new Date(startdate);
    const date2 = new Date(enddate);

    const time = Math.abs(date2 - date1 + 1);
    const days = Math.ceil(time / (1000 * 60 * 60 * 24));


    document.getElementById('span').innerText = days

    if(days <= 12) {
        document.getElementById("send-leave").setAttribute('type', 'submit');
        document.getElementById("send-leave").classList.remove('btn-leave');
    } else {
        document.getElementById("send-leave").setAttribute('type', 'button');
        document.getElementById("send-leave").classList.add('btn-leave');
        Swal.fire(
            'Wanna Leave?',
            'your leave limit in one request is 12 day',
            'warning'
        )
    }
   }
   
</script>

<script>

    document.getElementById('dataStart').value = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000)
        .toISOString().split("T")[0];
    document.getElementById('dataEnd').value = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000)
        .toISOString().split("T")[0];

    document.getElementById('dataStart').min = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000)
        .toISOString().split("T")[0];
    document.getElementById('dataEnd').min = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000)
        .toISOString().split("T")[0];

    function selection() {
        var selected = $("#dataLeave").prop('selectedIndex');
        if (selected == 3) {
            $("#dataLeave").removeAttr('name')
            $("#input1").attr('name', 'name')
            $("#input1").attr('required', 'required')
            document.getElementById("input1").classList.remove("d-none");

        } else {
            $("#dataLeave").attr('name', 'name')
            $("#input1").removeAttr('name')
            $("#input1").removeAttr('required')
            document.getElementById("input1").classList.add("d-none");
        }
    }

</script>
@endsection
