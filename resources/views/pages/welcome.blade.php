@extends('main')

@section('title', 'Home')

@section('content')
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron">
				  <h1 class="display-4">Welcome to My Blog!</h1>
				  <p class="lead">This is a Laravel Blog test enz.</p>
				  <p class="lead">
					<a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a>
				  </p>
				</div>
			</div>
		</div> <!-- end of header row-->
		<div class="row">
			<div class="col-md-8">
			
			@foreach($posts as $post)
			
				<div class="post">
				@if(!empty($post->image))
				<img src="{{asset('/images/' . $post->image)}}" width="800" height="400" />
			@endif
					<h3> {{  $post->title }} </h3>
					<p> {{  substr(strip_tags($post->body), 0,300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }} </p>
					<p>Posted: {{ $post->updated_at->diffForHumans() }} in {{ $post->category->name }} </p>
					<a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read more</a>
				</div>
				
				<hr>
			@endforeach
				
			</div>
		<div class="col-md-3 offset-md-1">
			<h2>Sidebar</h2>
			
			</div>
		</div>
	@endsection