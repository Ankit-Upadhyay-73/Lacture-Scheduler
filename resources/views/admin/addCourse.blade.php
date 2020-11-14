@extends('template')

@section('content')
    <script src="/js/app.js"></script>
    @if (session()->has('msg'))
    <div class="alert alert-success">
        {{session()->get('msg')}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4  ml-auto">
            <a href="{{Url('admin/lacturer')}}" class="btn btn-primary">Add Lacturer</a>
        </div>

        <div class="col-md-4  ml-auto">
            <a href="{{Url('admin/lacture')}}"  class="btn btn-primary">Add Lacture</a>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add Course
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ Url('/admin/addCourse') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="coursename" class="col-md-4 col-form-label text-md-right">Course Name</label>
    
                                <div class="col-md-6">
                                    <input id="coursename" class="form-control" type="text"   name="coursename"  required  autofocus>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="courselevel" class="col-md-4 col-form-label text-md-right">Course Level</label>
    
                                <div class="col-md-6">
                                    <select name="courselevel" id="courselevel" class="form-control">
                                        <option value="EntryLevel">EntryLevel</option>
                                        <option value="Intermediate">IntermediateLevel</option>
                                        <option value="Expert">ExpertLevel</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coursedescription" class="col-md-4 col-form-label text-md-right">Course description</label>    
                                <div class="col-md-6">
                                    <input id="coursedescription" class="form-control" type="text"   name="coursedescription"  required >                                    
                                </div>
                            </div>
    

                            <div class="form-group row">
                                <label for="courseimg" class="col-md-4 col-form-label text-md-right">Course Image</label>    
                                <div class="col-md-6">
                                    <input id="courseimg" class="form-control" type="file"   name="courseimg"  required >                                    
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Course
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
