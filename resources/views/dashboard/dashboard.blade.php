@extends('dashboard.main')

@section('container')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-6">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Avenger | Project Monitoring</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                <a href="#" class="btn btn-secondary btn-round">Add Project</a>
            </div>
        </div>
    </div>
</div>
@endsection