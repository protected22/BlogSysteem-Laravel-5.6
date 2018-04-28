@extends('main')

@section('title', 'All Posts')

@section('content')
<div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
						<a class="nav-link  active" href="posts">Posts <span class="sr-only">(current)</span></a>
						<a class="nav-link" href="categories">Categories <span class="sr-only">(current)</span></a>
						<a class="nav-link" href="#">Tagg <span class="sr-only">(current)</span></a>
						
                    </li>
                </ul>
				<hr>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/">View website</a>
						<a class="nav-link" href="blog">View blog posts</a>
                    </li>
                </ul>
            </nav>
 
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
           
	<div class="row">
		<div class="col-md-10">
			<h1 class="button-post"> All Posts</h1>
		</div>
		
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn  btn-block btn-primary btn-h1-spacing btn-sm">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of row -->
	
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>					
				</thead>
				
				<tbody>
				
					@foreach ($posts as $post)
						
						<tr>
							<th>{{  $post->id }}</th>
							<td>{{  $post->title }}</td>
							<td>{{  substr(strip_tags($post->body), 0,50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
							<td>{{  $post->created_at->diffForHumans() }}</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-secondary">Edit</a></td>
						</tr>
					
					@endforeach
				
				</tbody>
			</table>
			</div class="text-center">
			{!! $posts->links(); !!}
			</div>
		</div>
	</div>
	
	</main>
        </div>
    </div>

@endsection