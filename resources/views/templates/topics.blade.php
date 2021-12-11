@extends('layouts.main')

@section('content')
<div class="row mt-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="m-0">Topics</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mg-b-0 ble-table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subscribers</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        	@if( $topics->isEmpty() )
                        	<tr>
                        		<td class="text-center" colspan="4">No topics </td>
                        	</tr>
                        	@else
                        	@foreach( $topics as $topic )
                        	<tr>
                        		<td>{{ $topic->title }}</td>
                        		<td>{{ $topic->subscribe_count }}</td>
                        		<td>{{ $topic->active ? 'Active' : 'Inactive' }}</td>
                        		<td>
                        			<a href="#">
                                        Edit
                                    </a>
                        		</td>
                        	</tr>
                        	@endforeach
                        	@endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
    	<div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="m-0">Add Topics</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h3>Error</h3>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route( 'topic.store' ) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" required class="form-control" name="title" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="active" id="status">
                        	<option value="">Please select an option</option>
                            @foreach([ 1 => 'Active', 0 => 'Inactive'] as $key => $value )
                            <option value="{{ $key }}" {{ @$edit->active === $key ? 'selected="selected"': '' }}> {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $edit ? 'Update': 'Create' }}</button>
                    @if($edit)
                        <a href="#" class="btn btn-danger top-margin-medium">Cancel</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection