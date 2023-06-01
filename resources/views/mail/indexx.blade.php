<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mail</title>

    <style>
        .container-fluid {

            margin: 20px;

            display: flex;

            justify-content: center;

        }

        .container-fluid-p {

            font-size: 3rem;

            font-weight: bold;

        }

        hr {

            height: 2px;

            width: 80%;

        }

        .container {

            margin-left: 11vw;

            display: flex;

            flex-direction: column;

        }

        .container-p {

            font-size: 1.2rem;

        }

        .mb {

            margin-bottom: 3rem;

        }

        .justify-content-end {

            justify-content: end;

        }

        .justify-content-end-a {

            margin-right: 11vw;

            border: none;

            color: white;

            background: #22a78c;

            padding: 15px;

            border-radius: 10px;

            text-decoration: none;

        }

    </style>

</head>

<body>

    <div class="container-fluid">

        <p class="container-fluid-p">PT Toyotomo</p>

    </div>

    <div class="container-fluid">

        <hr>

    </div>

    <div class="container">

        <p class="mb">To {{$data['supervisor']}}</p>

        <p class="container-p">Leave permittion from {{$data['user']}}</p>

        <p class="container-p">Leave Description</p>
        <p class="container-p">{{$data['desc']}}</p>
        <p class="container-p">{{$data['start']}} - {{$data['end']}} 
            <span>
                @php
                $date1=date_create($data['start']);
                $date2=date_create($data['end']);
                $diff=date_diff($date1,$date2)->format('%d');
                echo '(' . ($diff + 1) . ' Days)';
                @endphp
            </span>
        </p>

    </div>

    <div class="container-fluid justify-content-end">

        <a class="justify-content-end-a" href="http://localhost:8000/leave">Jump to website</a>

    </div>

</body>

</html>
