@extends('user.layouts.app')
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="featured-posts" style="padding-top: 20px">
	  	<div class="container">
		    <header> 
		      <h2>Latest Posts List</h2>
		      <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		    </header>

			<div class="infinite-scroll">
				@forelse($latest_posts as $latest_post)
				<!-- Post-->
				<div class="row d-flex align-items-stretch">
				  <div class="text col-lg-7">
				    <div class="text-inner d-flex align-items-center">
				      <div class="content">
				        <header class="post-header">
				          <div class="category">
				            @foreach($latest_post->categories as $category)
				            <a href="#">{{ $category->name }}</a>
				            @endforeach
				          </div>
				          <a href="{{ route('post',$latest_post->slug) }}">
				            <h2 class="h4">{{ $latest_post->title }}</h2>
				          </a>
				        </header>
				        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
				        <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
				            <div class="avatar">
				              {{ Html::image(Storage::disk('local')->url($latest_post->image), 'author image', array('class'=>'img-fluid', 'id'=>''))}}
				            </div>
				            <div class="title"><span>John Doe</span></div></a>
				          <div class="date"><i class="icon-clock"></i> {{ $latest_post->created_at->diffForHumans() }}</div>
				          <div class="comments"><i class="icon-comment"></i>12</div>
				        </footer>
				      </div>
				    </div>
				  </div>
				  <div class="image col-lg-5">
				    {{ Html::image(Storage::disk('local')->url($latest_post->image), 'Post image', array('class'=>'featured-img', 'id'=>'featured_img'))}}
				  </div>
				</div>
				@empty
				<h3>No Post Available</h3>
				@endforelse
			    {{ $latest_posts->links() }}
		    </div>
		</div>
	</section>
</div>
<!-- /.content-wrapper -->
@endsection