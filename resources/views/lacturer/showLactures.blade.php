@extends('template')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">CourseName</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < sizeof($lct[0]); $i++)
                            <tr>
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$lct[0][$i]}}</td>
                                    <td>{{$lct[1][$i]}}</td>
                                    <td>{{$lct[2][$i]}}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>                    
        </div>    
    </div>    
@endsection
