@extends('main')

@section('title', 'Login')

@section('content')
<div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="home">Home <span class="sr-only">(current)</span></a>
						<a class="nav-link" href="posts">Posts <span class="sr-only">(current)</span></a>
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
                <h1> Welcome {{ Auth::user()->name }} </h1>
                
            </main>
        </div>
    </div>
@endsection
