@extends('user.layouts.app')
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  @include('user.layouts.hero')

  @include('user.layouts.featuredpost')

	<!-- Latest Posts -->
	<section class="latest-posts"> 
	  <div class="container">
	    <header> 
	      <h2>Latest from the blog</h2>
	      <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	    </header>
	    <div class="row">
	      @forelse($latest_posts as $latest_post)
	      <div class="post col-md-4">
	        <div class="post-thumbnail">
	          {{ Html::image(Storage::disk('local')->url($latest_post->image), 'Post image', array('class'=>'img-fluid', 'id'=>'latest_img'))}}
	        </div>
	        <div class="post-details">
	          <div class="post-meta d-flex justify-content-between">
	            <div class="date">{{ $latest_post->created_at->diffForHumans() }}</div>
	            <div class="category">
	              @foreach($latest_post->categories as $category)
	              <a href="#">{{ $category->name }}</a>
	              @endforeach
	            </div>
	          </div>
	          <a href="{{ route('post',$latest_post->slug) }}">
	            <h3 class="h4">{{ $latest_post->title }}</h3>
	          </a>
	          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
	        </div>
	      </div>
	      @empty
	      <h3>No Post Available</h3>
	      @endforelse
	    </div>
	    <div class="row">
	    	<div class="col-md-12">
	    		<div class="text-center">
	    			<a href="{{ url('latest-posts') }}" class="btn btn-primary">More Post</a>
	    		</div>
	    	</div>
	    </div>
	  </div>
	</section>

  @include('user.layouts.newsletter')

  @include('user.layouts.gallery')
  </div>
<!-- /.content-wrapper -->
@endsection