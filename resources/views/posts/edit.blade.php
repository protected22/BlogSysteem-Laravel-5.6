@extends('main')
@section('title', '| Edit post') 
@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}
	<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
  tinymce.init({
			selector: 'textarea',
			plugins: 'link code table',
			menubar: "table",
			
			
		});
  </script>

@endsection
@section('content')
	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
		<div class="form-row">
			<div class="col-md-8 mb-3">
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, ["class" => 'form-control']) }}
				
				{{ Form::label('slug', 'Slug:') }}
				{{ Form::text('slug', null, ["class" => 'form-control']) }}
				
				{{ Form::label('category_id', "Category:") }}
				{{ Form::select('category_id',$categories, null, ['class' => 'form-control'] ) }}
				
				{{ Form::label('tags'), 'Tags:'}}
				{{ Form::select('tags[]',$tags, null, ['class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple'] ) }}
				
				{{ Form::label('featured_image', 'Update Featured Image:')}}
				{{ Form::file('featured_image') }}
				<br>
				{{ Form::label('body', "Your blog:") }}
				{{ Form::textarea('body', null, ["class" => 'form-control']) }}
			</div>
		 <div class="col-md-4 mb-3"> 
			<div class="card">
				<div class="card-body bg-light">
					<dl class="dl-horizontal">
						<dt>Created at:</dt>
						<dd>{{ $post->created_at->diffForHumans() }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ $post->updated_at->diffForHumans() }}</dd>
					</dl>
					<hr/>
					<div class="row">
					<div class="col-sm-6"> <!-- Laravel way to create an anchor element linked to a route --> 
					{{ Form::submit('Save', ['class' => 'btn btn-success btn-block']) }}						
					</div>
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
					</div>
				</div>
			 </div>
		 </div>
	 </div>
 </div>
 {!! Form::close()!!}
 @endsection﻿
 @section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-multiple').select2();
	});
	</script>
@endsection
