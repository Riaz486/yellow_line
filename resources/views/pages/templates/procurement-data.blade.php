@if(count($procurementData) > 0)
@foreach($procurementData as $post)	
    <div class="procurement-card">
        <div class="category-box">
            {{$post->categoryName}}
        </div>
        <div class="procurement-post-title">
            <a href="{{url('/procurement/' . $post->categorySlug . '/' . $post->slug)}}">
                {{ $post->title }}
            </a>
        </div>
        <div class="procurement-post-content">
            <p>Request for Proposal  No: {{$post->proposalRequestID}}</p>
            <p><strong>City :</strong> {{$post->city}}</p>
            <p><strong>Department :</strong> {{$post->department}}</p>
            <p><strong>Date of publication of the call for tenders :</strong> {{\Carbon\Carbon::parse($post->date_publication)->format('F j, Y')}}</p>
            <p><strong>Date of Closing of tenders :</strong> {{\Carbon\Carbon::parse($post->date_closing)->format('F j, Y')}}</p>
        </div>

        <div class="recruitment-stats">
            <div class="recruitment-stat">
                <span class="recruitment-stat-icon d-flex gap-2"><img src="{{asset('public/assets/images/calendar.svg')}}" alt=""></span>
                <span>{{\Carbon\Carbon::parse($post->created_at)->format('F j, Y')}}</span>
            </div>
            <div class="recruitment-stat">
                <span class="recruitment-stat-icon d-flex gap-2">{{$post->commentsCount}} <img src="{{asset('public/assets/images/comment.svg')}}" alt=""></span>
                <span> Comments</span>
            </div>
            <div class="recruitment-stat ms-2">
                <span class="recruitment-stat-icon d-flex gap-2">{{$post->shares}} <img src="{{asset('public/assets/images/share.svg')}}" alt=""></span>
                <span>Share</span>
            </div>
            <div class="recruitment-stat ms-2">
                <span class="recruitment-stat-icon"><img src="{{asset('public/assets/images/eye.png')}}" alt=""></span>
                <span>{{$post->views}}</span>
            </div>
        </div>
    </div>
@endforeach 
@else
    <div class="notfound">
        <h2>Nothing posted</h2>
    </div>
@endif