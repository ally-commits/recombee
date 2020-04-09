@extends("layouts.app")

@section("content")
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h4 class="page-title mb-1">Content</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Home / Content</li>
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
            <div class="row d-flex justify-content-between">
                @foreach($contents as $key=>$content)
                    <div class="col-md-3">
                        <div class="card p-0">
                            <div class="px-2 py-3 row">
                                <div class="col-md-2">
                                    <span><b>{{$key+1}}</b></span>
                                </div>
                                <div class="col-md-10">
                                    <p><b>ID:</b> {{$content->id}}</p>
                                    <p><b>Name:</b> {{$content->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection