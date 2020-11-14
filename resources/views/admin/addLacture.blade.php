@extends('template')

@section('content')
    @if (session()->has('msg'))
    <div class="alert alert-success">
        {{session()->get('msg')}}
    </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            {{$errors->first()}}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add Lacture
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ Url('admin/addLacture') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="coursename" class="col-md-4 col-form-label text-md-right">Course Name</label>
                                <div class="col-md-6">
                                    <select id="coursename" class="form-control"  name="coursename"  required  autofocus>
                                        @for ($i = 0; $i < sizeof($courses); $i++)
                                            <option value={{$courses[$i]}}>{{$courses[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coursebatch" class="col-md-4 col-form-label text-md-right">Course Batch</label>
                                <div class="col-md-6">
                                    <select id="coursebatch" class="form-control"  name="coursebatch"  required >
                                        <option value='all'>All</option>
                                        @php
                                            $val=['First','Second','Third'];
                                        @endphp
                                        @for ($i = 0; $i < 3; $i++)
                                            <option value={{$val[$i]}}>{{$val[$i]}}</option>
                                        @endfor    
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="lacturermail" class="col-md-4 col-form-label text-md-right">Lacturer</label>
                                <div class="col-md-6">
                                    <select id="lacturermail" class="form-control"  name="lacturermail"  required  autofocus>
                                        @for ($i = 0; $i < sizeof($lacturer); $i++)
                                            <option value={{$lacturer[$i]}}>{{$lacturer[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lacturedate" class="col-md-4 col-form-label text-md-right col-form-label">Lacture Date</label>
                                <div class="col-md-6">
                                    <input type="date" id="lacturedate" name="lacturedate"  class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Lacture
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>                            
                </div>
            </div>                    
        </div>    
    </div>    
@endsection
