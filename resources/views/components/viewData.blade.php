@extends("layouts.app")

@section("content")
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h4 class="page-title mb-1">User Activity</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Home / Activity</li>
                    </ol>
                </div> 
                <div class="col-md-5 d-flex justify-content-between">
                    <form action="/rand-add" method="POST" class="d-flex aling-items-center">
                        @csrf
                        <input type="number" name="number" placeholder="Enter the number of Fake Data" class="form-control mr-2">
                        <button type="submit" class="btn btn-light text-primary">Submit</button>
                    </form>
                    <a href="/add-data" class="btn btn-light text-primary"><i class="mdi mdi-plus"></i> Add Data</a>
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
            <div class="row d-flex justify-content-between">
                @foreach($data as $key=>$d)
                    <div class="col-md-3">
                        <div class="card p-0">
                            <div class="card-body p-2 d-flex aling-items-center justify-content-center">  
                                <p class="p-0 m-0"><b>{{ $d->user_id }} => {{ $d->content_id}}</b></p> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection