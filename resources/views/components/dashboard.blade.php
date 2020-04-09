@extends("layouts.app")

@section("content")
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h4 class="page-title mb-1">Admin Dashboard</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Recombee Content Recommdation System</li>
                    </ol>
                </div> 
                <div class="col-md-3">
                    <a class="btn btn-light text-primary" href="/reset-data"><i class="mdi mdi-map"></i> Reset & Add New Data</a>
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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="/get-recom" method="POST">
                                @csrf
                                <select name="user" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Get Recommdation</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Recommended Contents</h4>
            @if(count($contents) > 0)
                <div class="row d-flex justify-content-between">
                    @foreach($contents as $key=>$content)
                        <div class="col-md-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p><b>{{ $key+1}}</b>: {{$content->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection