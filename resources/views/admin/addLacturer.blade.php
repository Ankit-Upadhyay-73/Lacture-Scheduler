@extends('template')

@section('content')
    @if($errors->any())
    <div class="alert alert-danger">
        {{$errors->first()}}
    </div>
    @endif
    @if (session()->has('msg'))
        <div class="alert alert-success">
            {{session()->get('msg')}}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add Lacturer
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ Url('admin/addLacturer') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="lacturermail" class="col-md-4 col-form-label text-md-right">Lacturer Email</label>
                                <div class="col-md-6">
                                    <input id="lacturermail" class="form-control" type="email"   name="lacturermail"  required  autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lacturerpass" class="col-md-4 col-form-label text-md-right">Lacturer Password</label>
                                <div class="col-md-6">
                                    <input id="lacturerpass" class="form-control" type="text"   name="lacturerpass"  required  >
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Lacturer
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
