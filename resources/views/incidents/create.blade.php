@extends('layouts.app')

@section('content')
	<div id="incidents">

		@include('layouts.breadcrumbs')

		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div class="panel panel-default" id="incident">
			<div class="panel-heading col-xs-12 text-center repository-margin-bottom-1rem">
				<div class="col-xs-10 col-xs-offset-1">
					<h2 class="panel-title">
						Report an Incident
					</h2>
				</div>
			</div><!-- .panel-heading -->

			<div class="panel-body">
				{{ Form::open(['action' => 'IncidentController@store', 'files' => true]) }}
					<div class="form-group required">
						{{ Form::label('title', 'Title:', ['class' => 'control-label']) }}
						{{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
					</div>
					
					<div class="form-group required">
					    {{ Form::label('date', 'Date of incident:', ['class' => 'control-label']) }}
					    {{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'required']) }}
				  	</div>

				  	<div class="form-group required">
					    {{ Form::label('time', 'Time of incident:', ['class' => 'control-label']) }}
					    {{ Form::time('time', \Carbon\Carbon::now()->toTimeString(), ['class' => 'form-control', 'required' => 'required']) }}
				  	</div>

				  	<div class="form-group required">
					    {{ Form::label('locations', 'Location(s) the incident took place:', ['class' => 'control-label']) }}
					    {{ Form::select('locations[]', $locations, null, ['class' => 'selectpicker form-control',
					    												'multiple' => 'multiple']) }}
				  	</div>

					<div class="form-group">
						{{ Form::label('patron_name', 'Patron Name:') }}
						{{ Form::text('patron_name', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('card_number', 'Patron Library Card Number:') }}
						{{ Form::text('card_number', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('patron_description', 'Patron Description:') }}
						{{ Form::text('patron_description', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group required">
						{{ Form::label('description', 'Describe the incident:', ['class' => 'control-label']) }}
						{{ Form::textarea('description', null,
										  ['class' => 'form-control', 'rows' => '6', 'required' => 'required']) }}
					</div>

					<div class="form-group">
						{{ Form::label('patron_photos', 'Patron Picture:') }}
						{{ Form::file('patron_photos[]', ['class' => 'form-control-file', 'aria-describedby' => 'patron_photos', 'multiple' => 'multiple']) }}
					</div>

					{{ Form::hidden('user', Auth::id()) }}

					<div class="panel-footer text-right repository-margin-top-1rem">
						{{ Form::button('Save Incident',
										['class' => 'btn btn-default btn-success', 'type' => 'submit', 'title' => 'Save']) }}
					</div>

				{{ Form::close() }}
			</div><!-- .panel-body -->
		</div> <!-- .panel -->
	</div> <!-- #incidents -->
  
@endsection