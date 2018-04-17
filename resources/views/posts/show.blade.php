@extends('main')

@section('title', 'View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
		@if(!empty($post->image))
				<img src="{{asset('/images/' . $post->image)}}" width="800" height="400" />
			@endif
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!}</p>
			
			<hr>
			<div class="tags">
			@foreach ($post->tags as $tag)
				<span class="badge badge-secondary">{{ $tag->name }}</span>
			@endforeach
			</div>
			
			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small class="text-muted">{{ $post->comments()->count() }} total </small></h3>
				
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								<a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-xs btn-primary"><img src="/icons/pencil-2x.png"></a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><img src="/icons/trash-2x.png"></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				
				</table>
			</div>
			
		</div>
		
		<div class="col-md-4">
			<div class="card card-body bg-light">
				<dl class="dl-horizontal">
				  <dt>URL:</dt>
				  <dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
				</dl>
				<dl class="dl-horizontal">
				  <dt>Category:</dt>
				  <dd>{{ $post->category->name }}</dd>
				</dl>
				<dl class="dl-horizontal">
				  <dt>Created at:</dt>
				  <dd>{{ date('j M, Y H:i', strtotime($post->created_at)) }}</dd>
				</dl>
				
				<dl class="dl-horizontal">
				  <dt>Last Updated:</dt>
				  <dd>{{ date('j M, Y H:i', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block' )) !!}
						
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
						
						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
					
						{!! Form::close() !!}
					
					</div>
				</div>
				
				<div class="row"
					<div class="col-md-12">
					{{ Html::linkRoute('posts.index', 'See All Posts', [], ['class' => 'btn btn-outline-secondary btn-block btn-h1-spacing']) }}
				</div>
				
			</div>
		</div>
	</div>

@endsection