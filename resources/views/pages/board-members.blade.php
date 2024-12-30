@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>SINDH MASS TRANSIT AUTHORITY</p>
                <h2 class="heading py-2">Board Members</h2>
            </div>
        </div>
    </div>
</section>

<section class="curved-bg pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head text-center board-memebers-head">
                    <h3>SINDH MASS TRANSIT AUTHORITY</h3>
                    <h4>Board Member</h4>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-center m-b-20">
                <div class="boardMember">
                    <span class="line-seperator line-top"></span>
                    <span class="line-seperator line-left"></span>

                    <div class="b-member-wrapper">
                        <?php 
                            if($boardMembers[0]->file == '') {
                                $postImage = 'noimage.webp';
                            } else {
                                $postImage = $boardMembers[0]->file;
                            }
                        ?>
                        <div class="d-img">
                            <img src="{{asset('public/assets/uploads/'.  $postImage)}}" class="img-fluid">
                        </div>

                        <div class="b-member-content">
                            <h2>{{$boardMembers[0]->name}}</h2>
                            <span>{{$boardMembers[0]->department}} {{$boardMembers[0]->location}}</span>
                            <strong>{{$boardMembers[0]->designation}}</strong>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-4 wd-board-member">
                @foreach($boardMembers as $key => $member)
                @if($key > 0) 
                <div class="col-md-6">
                    <div class="boardMember bm-sm">
                        <span class="line-seperator line-top"></span>
                        <span class="line-seperator line-left"></span>

                        <div class="b-member-wrapper">
                            <?php 
                                if($member->file == '') {
                                    $postImage = 'noimage.webp';
                                } else {
                                    $postImage = $member->file;
                                }
                            ?>
                            <div class="d-img">
                                <img src="{{asset('public/assets/uploads/'.  $postImage)}}" class="img-fluid">
                            </div>

                            <div class="b-member-content">
                                <h2>{{$member->name}}</h2>
                                <span>{{$member->department}} {{$member->location}}</span>
                                <strong>{{$member->designation}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="popupTeam">
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="wrapper-team-popup">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-profile"></div>
                </div>

                <div class="col-md-6">
                    <div class="teamDescription">
                        <h2>Profile</h2>
                        <div class="descContent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection