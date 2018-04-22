@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "$titleTag")

@section('content')

	<div class="row">
		<div class="col-md-8 offset-md-2">
			@if(!empty($post->image))
				<img src="{{asset('/images/' . $post->image)}}" width="800" height="400" />
			@endif
			<h1>{{ $post->title }}</h1>
			<!-- Go to www.addthis.com/dashboard to customize your tools --> 
			<div class="addthis_inline_share_toolbox"></div> 
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Posted: {{ $post->updated_at->diffForHumans() }}</p>
			<p>Posted In: {{ $post->category->name }}</p>
		</div>
	</div>
	
	<div class="row">
		<div id="comment-form" class="col-md-8 offset-md-2" style="margin-top: 50px;">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', "Name:") }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-12">
						{{ Form::label('comment', "Comment:") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

						{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
			</div>
			
		</div>
			
			{{ Form::close() }}
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h3 class="comments-title"><img src="/icons/comment-square-3x.png">  {{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">

						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=retro" }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F dS, Y - G:i' ,strtotime($comment->created_at)) }}</p>
						</div>

					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>

				</div>
			@endforeach
		</div>
	</div>
	
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<!--Change this code with your own Addthis code to make your social buttons work -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ad64d55536c04fe"></script> 

@endsection