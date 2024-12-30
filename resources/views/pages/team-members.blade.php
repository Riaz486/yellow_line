@extends('layouts.frontend.main-layout')

@section('content')
<section class="hero-section inner-banner-main">
    <div class="hero-section-slider">
        <div class="hero-content">
            <img src="{{asset('public/assets/careers/images/banner.png')}}" class="img-fluid" alt="" srcset="">
            <div class="content">
                <p>Our Team</p>
                <h2 class="heading py-2">{{$teamCategory}}</h2>
            </div>
        </div>
    </div>
</section>

<?php 
    $teamClass = ($teamCategory == 'Karachi Mobility Project') ? 'theme-dark' : 'smta-team';
?>
<section class="team mt-5 {{$teamClass}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head text-center">
                    <h3>KARACHI MOBILITY PROJECT YELLOW LINE</h3>
                    <h4>PROJECT MANAGEMENT TEAM</h4>
                    <img src="{{asset('public/assets/images/wave.png')}}" class="img-fluid mx-auto d-block mt-3">
                </div>
            </div>
            <!-- Left Profile (Single Large Profile) -->
            <div
                class="col-12 col-lg-3 text-center left-profile-card d-flex flex-column justify-content-center">
                <div class="sidebarTeam">
                    <div class="row">
                    <?php $i = 1; ?>
                    @foreach($teamData as $team)
                    @if($i == 1)	
                        <!-- Profile Card 1 -->
                        <div class="col-lg-12 mb-4 d-flex justify-content-center">
                            <div class="profile-card text-center team-member-card">
                                <?php 
                                    if($team->file == '') {
                                        $postImage = 'noimage.webp';
                                    } else {
                                        $postImage = $team->file;
                                    }
                                ?>
                                <div class="profile-img mb-2">
                                    <img src="{{asset('public/assets/uploads/'.  $postImage)}}" alt="Team Member">
                                </div>
                                <h5>{{$team->name}}</h5>
                                <h6>{{$team->designation}}</h6>
                                <div class="team-footer-meta">
                                    <span>{{$team->department}}</span>
                                    <small>{{$team->location}}</small>
                                </div>
                            </div>
                            <div class="team-desc" style="display: none;">{{$team->description}}</div>
                        </div>
                    <?php 
                        $i++;
                    ?>
                    @endif
                    @endforeach 
                    </div>
                </div>
            </div>

            <!-- Right Grid (12 Profiles) -->
            <div class="col-12 col-lg-9 right-profile-card">
                <div class="row">
                @foreach($teamData as $team)	
                    <!-- Profile Card 1 -->
                    <div class="col-12 col-sm-6 col-lg-4 mb-4 d-flex justify-content-center">
                        <div class="profile-card text-center team-member-card">
                            <?php 
                                if($team->file == '') {
                                    $postImage = 'noimage.webp';
                                } else {
                                    $postImage = $team->file;
                                }
                            ?>
                            <div class="profile-img mb-2">
                                <img src="{{asset('public/assets/uploads/'.  $postImage)}}" alt="Team Member">
                            </div>
                            <h5>{{$team->name}}</h5>
                            <h6>{{$team->designation}}</h6>
                        </div>
                        <div class="team-desc" style="display: none;">{{$team->description}}</div>
                    </div>
                @endforeach 
                </div>
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