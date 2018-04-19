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
			<p>Share post:</p>
			<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-via="protected22" data-hashtags="BenJeHack" data-show-count="true">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			<a href="https://twitter.com/intent/tweet?button_hashtag=BenJeHack&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #BenJeHack</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			<div class="fb-share-button" data-href="https://benjehack.simondev.nl/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fbenjehack.simondev.nl%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Delen</a></div>
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
			<a href="https://twitter.com/protected22?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @protected22</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			
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
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ad64d55536c04fe"></script> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@endsection