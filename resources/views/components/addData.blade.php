@extends("layouts.app")

@section("content")
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h4 class="page-title mb-1">Content</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Home / Add Data</li>
                    </ol>
                </div> 
                <div class="col-md-2">
                    <button class="btn btn-light text-primary">Settings</button>
                </div>
            </div> 
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ Session::get('message') }}
            </div>
        @endif 
            <form class="row d-flex justify-content-between" action="/add-data" method="POST">
                @csrf
                <div class="col-md-4">
                    <div class="card">
                        <div class="form-group card-body">
                            <label for="">Select User</label>
                            <select name="user" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->id }}</option>
                                @endforeach
                            </select>
                        </div> 
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card">
                        <div class="form-group card-body">
                            <label for="">Select Content</label>
                            <select name="content" class="form-control">
                                @foreach($contents as $content)
                                    <option value="{{ $content->id }}">{{ $content->id }}</option>
                                @endforeach
                            </select>
                        </div> 
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card"> 
                        <div class="card-body form-group">
                            <label for="">Submit the value</label><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div>
@endsection