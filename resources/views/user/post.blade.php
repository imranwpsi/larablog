@extends('user.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('user/css/prism.css') }}">
@endsection

@section('main-content')
<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=1765722206877352&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  {{-- @include('user.layouts.hero') --}}
  <div class="container">
    <div class="row">
      <!-- Latest Posts -->
      <main class="post blog-post col-lg-8"> 
        <div class="container">
          <div class="post-single">
            <div class="post-thumbnail">
            	{{ Html::image(Storage::disk('local')->url($post->image), 'Post image', array('class'=>'img-resposive', 'id'=>'post_img'))}}
            </div>
            <div class="post-meta d-flex justify-content-between">
            	<div class="category">
	            	@foreach($post->categories as $category)
	              	<a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
	              @endforeach
              	</div>
            </div>
            <div class="post-details">
              <h1>{{ $post->title }}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
              <div class="post-subtitle d-flex justify-content-between">
                <div class="subtitle">
                	{{ $post->subtitle }}
                </div>
              </div>
              <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                  <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                  <div class="title"><span>John Doe</span></div></a>
                <div class="d-flex align-items-center flex-wrap">       
                  <div class="date"><i class="icon-clock"></i> {{ $post->created_at->diffForHumans() }}</div>
                  <div class="views"><i class="icon-eye"></i> 500</div>
                  <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                </div>
              </div>
              <div class="post-body">
              	{!! htmlspecialchars_decode($post->body) !!}
              </div>
              <div class="post-tags">
				@foreach($post->tags as $tag)
              	<a href="{{ route('tag',$tag->slug) }}" class="tag">#{{ $tag->name }}</a>
              	@endforeach

              </div>
              <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                  <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                  <div class="text"><strong class="text-primary">Previous Post </strong>
                    <h6>I Bought a Wedding Dress.</h6>
                  </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                  <div class="text"><strong class="text-primary">Next Post </strong>
                    <h6>I Bought a Wedding Dress.</h6>
                  </div>
                  <div class="icon next"><i class="fa fa-angle-right">   </i></div></a></div>


				
				<div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5"></div>



            </div>
          </div>
        </div>
      </main>
      <aside class="col-lg-4">
        <!-- Widget [Search Bar Widget]-->
        <div class="widget search">
          <header>
            <h3 class="h6">Search the blog</h3>
          </header>
          <form action="#" class="search-form">
            <div class="form-group">
              <input type="search" placeholder="What are you looking for?">
              <button type="submit" class="submit"><i class="icon-search"></i></button>
            </div>
          </form>
        </div>
        <!-- Widget [Latest Posts Widget]        -->
        <div class="widget latest-posts">
          <header>
            <h3 class="h6">Latest Posts</h3>
          </header>
          <div class="blog-posts"><a href="#">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                  <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i> 500</div>
                    <div class="comments"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div></a><a href="#">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                  <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i> 500</div>
                    <div class="comments"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div></a><a href="#">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                  <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i> 500</div>
                    <div class="comments"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div></a></div>
        </div>
        <!-- Widget [Categories Widget]-->
        <div class="widget categories">
          <header>
            <h3 class="h6">Categories</h3>
          </header>
          <div class="category">
          	@foreach($post->categories as $category)
				<div class="item d-flex justify-content-between"><a href="#">{{ $category->name }}</a><span>12</span></div>
          	@endforeach
          </div>
        </div>
        <!-- Widget [Tags Cloud Widget]-->
        <div class="widget tags">       
          <header>
            <h3 class="h6">Tags</h3>
          </header>
          <ul class="list-inline">
          	@foreach($post->tags as $tag)
            <li class="list-inline-item"><a href="#" class="tag">#{{ $tag->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </aside>
    </div>
  </div>
  </div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script src="{{ asset('user/js/prism.js') }}"></script>
@endsection