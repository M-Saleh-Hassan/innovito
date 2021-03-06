@extends('english.layouts.master')

@section('page_title')
Your Account | Change Password
@endsection

@section('content')
<!-- Main Header Account -->

<div class="main-header">
    <div class="content-bg-wrap bg-account"></div>
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                <div class="main-header-content">
                    <h1>Your Account Dashboard</h1>
                    <p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile
    information, settings, read notifications and requests, view your latest messages, change your pasword and much
    more! Also you can create or manage your own favourite page, have fun!</p>
                </div>
            </div>
        </div>
    </div>
    <img class="img-bottom" src="{{asset('assets/')}}/img/account-bottom.png" alt="friends">
</div>

<!-- ... end Main Header Account -->



<!-- Your Account Personal Information -->

<div class="container">
    <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Change Password</h6>
                </div>
                <div class="ui-block-content">


                    <!-- Change Password Form -->

                    <form id="change-password-form" method="POST">
                        <div class="row">

                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Confirm Current Password</label>
                                    <input class="form-control" placeholder="" type="password" name="password" value="**********">
                                </div>
                            </div>

                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Your New Password</label>
                                    <input class="form-control" placeholder="" type="password" name="new_password" required>
                                </div>
                            </div>
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Confirm New Password</label>
                                    <input class="form-control" placeholder="" type="password" name="new_password_confirm" required>
                                </div>
                            </div>

                            <!-- <div class="col col-lg-12 col-sm-12 col-sm-12 col-12">
                                <div class="remember">

                                    <div class="checkbox">
                                        <label>
                                            <input name="optionsCheckboxes" type="checkbox">
                                            Remember Me
                                        </label>
                                    </div>

                                    <a href="#" class="forgot" data-toggle="modal" data-target="#restore-password">Forgot my Password</a>
                                </div>
                            </div> -->

                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="btn btn-primary btn-lg full-width">Change Password Now!</button>
                            </div>

                        </div>
                    </form>

                    <!-- ... end Change Password Form -->
                </div>
            </div>
        </div>

        <div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
            <div class="ui-block">

                <!-- Your Profile  -->

                <div class="your-profile">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Your PROFILE</h6>
                    </div>

                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Profile Settings
                                        <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                                    </a>
                                </h6>
                            </div>

                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <ul class="your-profile-menu">
                                    <li>
                                        <a href="{{route('en.profile.personal_info')}}">Personal Information</a>
                                    </li>

                                    <li>
                                        <a href="#">Change Password</a>
                                    </li>
                                    <!-- <li>
                                        <a href="31-YourAccount-HobbiesAndInterests.html">Hobbies and Interests</a>
                                    </li> -->
                                    <li>
                                        <a href="{{route('en.profile.education.edit')}}">Education and Employement</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ... end Your Profile  -->

            </div>
        </div>
    </div>
</div>

<!-- ... end Your Account Personal Information -->

@endsection

@section('script')
<script>
$('#change-password-form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
        url:"{{route('en.profile.password.update')}}",
        method:"POST",
        data:$("#change-password-form").serialize(),
        dataType:'JSON',
        beforeSend: function(){
            $(".overlay").toggleClass('hidden');
        },
        success:function(data)
        {
            Swal.fire({
                title: data.title,
                text: data.message,
                type: data.type,
                confirmButtonText: 'Ok'
            })
            $(".overlay").toggleClass('hidden');
        }
    })
});
</script>
@endsection
