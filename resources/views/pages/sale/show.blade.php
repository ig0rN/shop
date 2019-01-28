@extends('layouts.app')

@section('title', 'Sale list')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header text-center">
                    <strong>SALE LIST:</strong>
            </div>

            <div class="card-body clearfix"> 
                
                <div class="float-right">
                    <a href="{{ route('sale.create') }}" class="btn btn-success">Create New Sale</a>
                </div>

                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>End Date</th>
                        <th>Created By</th>
                        <th>Edited By</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @include('pages.sale._list')
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('add-ons.dataTable')
@endsection