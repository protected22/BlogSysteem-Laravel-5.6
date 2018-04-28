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
			<div class="sidebar-module">
                    <h4>Latest Posts</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">March 2017</a></li>
                        <li><a href="#">February 2017</a></li>
                        <li><a href="#">January 2017</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                        <li><a href="#">October 2013</a></li>
                        <li><a href="#">September 2013</a></li>
                        <li><a href="#">August 2013</a></li>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                    </ol>
                </div>
                <div class="sidebar-module">
                    <h4>Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
			</div>
		</div>
	@endsection