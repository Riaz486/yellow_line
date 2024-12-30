@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>About Us</p>
                <h2 class="heading py-2">{{$pageData['postName']}}</h2>
            </div>
        </div>
    </div>
</section>


<div class="container my-5">
    <div class="row">
        <div class="col-md-8 pr-50">
            <div class="container">
                <div class="row mb-5">
                    <h2 class="post-heading">
                        {{ $post->title }}
                    </h2>

                    <div class="postContentWrapper">
                        @if($post->postType != 'news')
                        <div class="post-header d-flex align-items-center justify-content-end gap-20">
                            <a href="#comment" class="addComment">
                                Add Comment
                                <i class="fa fa-commenting"></i>
                            </a>

                            <a href="#" target="_blank">
                                Download
                                <i class="fa fa-download"></i>
                            </a>
                        </div>
                        @endif

                        @if($post->pdfFile == null)
                        <div class="post-image">
                            <?php 
                                if($post->featured_image == '') {
                                    $postImage = 'noimage.webp';
                                } else {
                                    $postImage = $post->featured_image;
                                }
                            ?>
                            <img src="{{asset('public/assets/uploads/posts/'.  $postImage)}}" />
                        </div>

                        @else 
                        <div class="pdf-wrapper">
                            <embed src="{{asset('public/assets/uploads/posts/' . $post->pdfFile)}}" height='600px' type='application/pdf' width='100%'></object>
                        </div>
                        @endif

                        <div class="postContent">
                            {!! $post->content !!}
                        </div>

                        @if($postMeta != '')
                        <div class="tags">
                        <?php
                            if (is_array($postMeta) && isset($postMeta[0])) {
                                $tagString = $postMeta[0];
                            
                                $tags = array_filter(explode('#', $tagString));
                            }
                        ?>
                        @foreach($tags as $meta)
                        
                            <a>#{{$meta}}</a>
                        @endforeach
                        </div>
                        @endif

                        @if($post->postType == 'news')
                        @if(isset($galleryData)  && count($galleryData) > 0)
                        <div class="event-massionary-gallery">
                            <div class="grid">
                            <div class="grid-sizer"></div> 
                            @foreach($galleryData as $gallery)
                                <a href="{{asset('public/assets/uploads/posts/' . $gallery->thumbnail)}}" data-fancybox="gallery" class="grid-item">
                                    <div class="massionary-img-box">
                                        <?php 
                                            if($gallery->thumbnail == '') {
                                                $postImage = 'noimage.webp';
                                            } else {
                                                $postImage = $gallery->thumbnail;
                                            }
                                        ?>
                                        <img src="{{asset('public/assets/uploads/posts/'.  $postImage)}}" />
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>

                <div class="post-bottom">
                    <h4>Share</h4>
                    <div class="social-share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($post->url) }}" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode($post->url) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($post->url) }}&title={{ urlencode($post->title) }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="javascript:void(0);" onclick="copyToClipboard()"><i class="fa fa-link"></i></a>
                    </div>

                    <div style="display: none">
                        <textarea id="instagramCaption" rows="4" cols="50" readonly>
                            {{ $post->title }} - {{ url('/post/'.$post->slug) }}
                        </textarea>
                    </div>
                </div>

                <div class="comment commentingWrapper">
                    <div class="bg-white border border-top-0 p-4 post-comments">
                        <?php foreach($commentsData as $comment): ?>
                        <?php if($comment->response == 0) { ?>
                        <div class="media mb-4 comment-<?= $comment->id; ?>">
                            <?php 
                                $initials = \App\Models\AppFunctions::getInitialsAttribute($comment->author); 
                            ?>
                            <div class="user-thumb" style="background: #<?= \App\Models\AppFunctions::stringToColorCode($initials); ?>"><?= $initials; ?></div>
                            <div class="media-body">
                                <h6>
                                    <a class="text-secondary font-weight-bold" href=""><?= $comment->author; ?></a> 
                                    <small><i><?= date('d F Y', strtotime($comment->created_at)); ?></i></small>
                                </h6>
                                <p><?= $comment->content; ?></p>

                                <div class="d-flex align-items-center">
                                    <button class="btn btn-sm btn-outline-secondary post-reply" data-id="<?= $comment->id; ?>">Reply</button>
                                </div>
                                <div class="replies">
                                    
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php endforeach; ?>
                    </div> 
                    
                    <div class="mb-3 comment-form">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form method="POST" action="{{url('post-comment')}}" class="post-comment" onsubmit="return false;">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="message">Your Name *</label>
                                    <input type="text" name="comment[author]" cols="30" rows="5" class="form-control"></input>
                                </div>

                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea id="message" name="comment[content]" cols="30" rows="5" class="form-control"></textarea>
                                </div>

                                <input type="hidden" name="comment[response]" value="0" />
                                <input type="hidden" name="comment[postID]" value="<?= $post->id; ?>" />

                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment" class="btn btn-default font-weight-semi-bold py-2 px-3">
                                    <div class="loader-sub" id="comment-load">
                                        <div class="lds-ellipsis">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                            
                <section class="post-navigation">
                    @if($previousPost)
                        <a href="{{ url($previousPost->categorySlug . '/' . $previousPost->slug) }}">
                            <div class="post-nav-box">
                                <div class="inner-arrow">
                                    <img src="{{ asset('public/assets/images/arrow-left.svg') }}" alt="">
                                </div>

                                <div class="nav-content">
                                    <span>Previous Post</span>
                                    <h4>{{ \Illuminate\Support\Str::limit($previousPost->title, 60) }}</h4>
                                </div>
                            </div>
                        </a>
                    @endif

                    @if($nextPost)
                        <a href="{{ url($nextPost->categorySlug . '/' . $nextPost->slug) }}">
                            <div class="post-nav-box">
                                <div class="nav-content">
                                    <span>Next Post</span>
                                    <h4>{{ \Illuminate\Support\Str::limit($nextPost->title, 60) }}</h4>
                                </div>

                                <div class="inner-arrow">
                                    <img src="{{ asset('public/assets/images/arrow-right.svg') }}" alt="">
                                </div>
                            </div>
                        </a>
                    @endif
                </section>
            </div>
        </div>

        <script>
            function copyToClipboard() {
                const caption = document.getElementById('instagramCaption');
                caption.select();
                document.execCommand('copy');
                alert('Post copied to clipboard! Now open Instagram to share it.');
            }
        </script>

        <div class="col-md-4 pl-50">
            <!-- News Feed Section -->
            <div class="news-feed">
                <div class="news-header">
                    <div class="icon-bookmark-img"><img src="{{asset('public/assets/images/bookmark-icon.svg')}}" alt=""></div>
                    <h5>NEWS FEED</h5>
                </div>

                <div class="latest-news-marquee">
                    <!-- News Item -->
                    <div class="news-item">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>

                    <!-- Another News Item -->
                    <div class="news-item py-4">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>

                    <!-- Another News Item -->
                    <div class="news-item">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>
                    <!-- News Item -->
                    <div class="news-item">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>

                    <!-- Another News Item -->
                    <div class="news-item py-4">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>

                    <!-- Another News Item -->
                    <div class="news-item">
                        <p>Discover tour of the BRT corridor for children firm different neighbourhood of</p>
                        <div class="date">
                            <span class="calendar"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span> July 1, 2024
                            <span class="d-flex gap-2 ms-3"> <img src="{{asset('public/assets/images/share.svg')}}" alt=""> Share</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-feed">
                <div class="news-header">
                    <div class="icon-bookmark-img"><img src="{{asset('public/assets/images/bookmark-icon.svg')}}" alt=""></div>
                    <h5>MEDIA CORNER</h5>
                </div>
                <div class="section media-corner">
                    <ul class="side-menu-items">
                        <li><a href="{{url('gallery/photo-library')}}">Photo Library</a></li>
                        <li><a href="{{url('gallery/video-library')}}">Video Library</a></li>
                    </ul>
                </div>
                <div class="news-feed">
                    <div class="news-header">
                        <div class="icon-bookmark-img"><img src="{{asset('public/assets/images/bookmark-icon.svg')}}" alt=""></div>
                        <h5>CATEGORIES</h5>
                    </div>
                    <div class="section media-corner">
                        <ul class="side-menu-items">
                            @foreach($categoriesData as $category)
                            <li><a href="{{url($category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                            <li><a href="{{url('news/all-smta-prohect-news')}}">News</a></li>
                            <li><a href="{{url('frequently-asked-questions')}}">Frequently Asked Questions</a></li>
                            <li><a href="{{url('events')}}">Upcoming Events</a></li>
                            <li><a href="{{url('help-and-complaints')}}">Help & Complaint</a></li>
                        </ul>
                    </div>
                    <div class="section video-preview">
                        <div class="video-tab-sidebar">
                            <video id="video-item-sidebar" controls muted>
                                <source src="{{asset('public/assets/videos/video-1.mp4')}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection