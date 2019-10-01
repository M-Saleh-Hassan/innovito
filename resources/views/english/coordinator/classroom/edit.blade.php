@extends('english.layouts.master')

@section('page_title')
{{$classroom->title}}
@endsection

@section('content')
<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="{{asset('') . $classroom->image}}" alt="nature" style="">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="#" ><i class="fas fa-eye"></i>Preview</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#edit-classroom"> <i class="fas fa-edit"></i>Edit</a>
									</li>

								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
                                        <a href="#" data-toggle="modal" data-target="#create-survey"><i class="fas fa-file-alt"></i>Add survey</a>
									</li>
									<li>
                                        <a href="#" class="delete-classroom"><i class="fas fa-trash-alt"></i>Delete</a>
									</li>
								</ul>
							</div>
						</div>


					</div>
					<div class="top-header-author classroom-name">

						<div class="author-content">
							<a href="" class="h4 author-name">{{$classroom->title}}</a>
							<div class="country">{{$classroom->category->title}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... end Top Header-Profile -->
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="ui-block">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item text-center" style="width:33.3333%;">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item text-center" style="width:33.3333%;">
                        <a class="nav-link" id="stats-tab" data-toggle="tab" href="#stats" role="tab" aria-controls="stats" aria-selected="false">Stats</a>
                    </li>
                    <li class="nav-item text-center" style="width:33.3333%;">
                        <a class="nav-link" id="leaderboard-tab" data-toggle="tab" href="#leaderboard" role="tab" aria-controls="leaderboard" aria-selected="false">Attendance</a>
                    </li>


                </ul>
						  <div class="tab-content pt" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container ">
								<div class="row">
										<div class=" col col-md-6 col-sm-12" >
												<div class="ui-block ">
													<!-- W-Action -->
													<a href="">
                                                        <div class="widget catco" style="background-image: url('{{asset('assets')}}/img/bg-wethear.jpg');">

                                                            <div class="content">

                                                                <a href="#" class="btn btn-control" data-toggle="modal" data-target="#create-section">
                                                                    <svg class="olymp-plus-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                                                </a>

                                                                <div class="author-content">
                                                                    <a href="#" class="h5 author-name color-white" data-toggle="modal" data-target="#create-section">Add Sections</a>
                                                                </div>

                                                            </div>
                                                        </div>
												    </a>
													<!-- ... end W-Action -->
                                                </div>



											</div>
											<div class=" col col-md-6 col-sm-12" >
												<div class="ui-block ">
													<!-- W-Action -->
													<a href="">
													<div class="widget catco" style="background-image: url('{{asset('assets')}}/img/top-header7.png');">

														<div class="content">

																<a href="#" class="  btn btn-control" data-toggle="modal" data-target="#create-session">
																	<svg class="olymp-plus-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
																</a>

																<div class="author-content">
																	<a href="#" class="h5 author-name color-white">Add sessions</a>

																</div>

															</div>
													</div>
												</a>
													<!-- ... end W-Action -->
												</div>

											</div>
											{{-- <div class=" col col-md-4 col-sm-12" >
												<div class="ui-block ">
													<!-- W-Action -->
                                                    <a href="">
                                                        <div class="widget catco" style="background-image: url('{{asset('assets')}}/img/bg-event-day.jpg');">
                                                            <div class="content">
                                                                <a href="#" class="  btn btn-control" data-toggle="modal" data-target="#create-quiz">
                                                                    <svg class="olymp-plus-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                                                </a>
                                                                <div class="author-content">
                                                                    <a href="#" class="h5 author-name color-white">Add Quizzes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
													<!-- ... end W-Action -->
												</div>

											</div> --}}
                                        </div>
                                </div>

                                <div class="ui-block-title">
                                    <h6 class="title text-center">Curriculum For This classroom</h6>
                                </div>

                                <div class="ui-block-content cumm classroom-curriculum">
                                    <div class="row">
                                        <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="table-responsive table-middle no-shadow">
                                                @foreach ($classroom->classroomSections()->orderBy('order')->get() as $section)
                                                    <table class="table section-content-{{$section->id}}">
                                                        <thead>
                                                            <tr class="title-c">
                                                                <th style="width:130px">{{$section->title}}</th>
                                                                <th class="text-center" style="width:130px">{{$section->sessions()->count()}} sessions</th>
                                                                <th class="text-center" style="width:130px"></th>
                                                                <th class="text-center" style="width:130px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($section->sessions()->orderBy('order')->get() as $session)
                                                                <tr class="session-content-{{$session->id}}">
                                                                    <td style="width:130px">{{$session->title}}</td>
                                                                    <td class="text-center" >Date: {{$session->session_date}} From: {{$session->from}} To: {{$session->to}}</td>
                                                                    <td class="text-center" style="width:130px"><a href="#" data-toggle="modal" data-target="#edit-session-{{$session->id}}"><i class="fas fa-edit" style="margin-right: 5px;"></i>Edit</a></td>
                                                                    <td class="text-center" style="width:130px"><a href="#" class="delete-session" data-session-id="{{$session->id}}"><i class="fas fa-trash-alt" style="margin-right: 5px;"></i>Delete</a></td>
                                                                </tr>
                                                                <!-- Window-popup Edit  session -->
                                                                <div class="modal fade" id="edit-session-{{$session->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-session-{{$session->id}}" aria-hidden="true">
                                                                    <div class="modal-dialog window-popup create-friend-group create-friend-group-1 " role="document">
                                                                        <div class="modal-content">
                                                                            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                                                                                <svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                                                            </a>
                                                                            <div class="modal-header">
                                                                                <h6 class="title">Edit Session | {{$session->title}}</h6>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <form method="post" data-session-id="{{$session->id}}" class="edit_session_form" id="edit-session-content-{{$session->id}}" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <div class="form-group">
                                                                                        <label class="control-label">Session title</label>
                                                                                        <input class="form-control" placeholder="Session title"  type="text" name="title"  value="{{$session->title}}" required>
                                                                                    </div>


                                                                                    <div class="form-group">
                                                                                        <label class="control-label">Session Section</label>
                                                                                        <select class="form-control category-select" name="classroom_section_id" required>
                                                                                            @foreach ($classroom->classroomSections as $section)
                                                                                                <option value="{{$section->id}}" @if($section->id == $session->classroom_section_id) selected @endif>{{$section->title}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-group  ">
                                                                                        <label class="control-label">Session order in section</label>
                                                                                        <input class="form-control" placeholder="Session Order" type="number" name="order" value="{{$session->order}}" min="1" required>
                                                                                    </div>

                                                                                    <div class="form-group  ">
                                                                                        <label class="control-label">Session score when finished</label>
                                                                                        <input class="form-control" placeholder="Session Score" type="number" name="score"value="{{$session->score}}"  min="1" required>
                                                                                    </div>


                                                                                    <div class="form-group">
                                                                                        <label class="control-label">Session Date</label>
                                                                                        <input class="form-control"  type="date" name="session_date" value="{{$session->session_date}}" required>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label class="control-label">Session From</label>
                                                                                        <input class="form-control"  type="time" name="from" value="{{$session->from}}" required>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label class="control-label">Session To</label>
                                                                                        <input class="form-control"  type="time" name="to" value="{{$session->to}}" required>
                                                                                    </div>

                                                                                    <button class="btn btn-blue btn-lg full-width">Edit Session</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                    <!-- Window-popup Edit  session -->


                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="mg-bttn section-content-{{$section->id}}">
                                                        <div class="bttn-right d-flex justify-content-end">
                                                            <a class="btn btn-secondary bg-blue btn-lg  color-white m-1"  href="" data-toggle="modal" data-target="#edit-section-{{$section->id}}">Edit</a>
                                                            <a  class="btn  btn-secondary btn-lg color-white m-1 delete-section" data-section-id="{{$section->id}}">Delete</a>
                                                        </div>
                                                    </div>

                                                    <!-- Window-popup Edit section -->
                                                    <div class="modal fade" id="edit-section-{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-section-{{$section->id}}" aria-hidden="true">
                                                        <div class="modal-dialog window-popup create-friend-group create-friend-group-1" role="document">
                                                            <div class="modal-content">
                                                                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                                                                    <svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                                                </a>
                                                                <div class="modal-header">
                                                                    <h6 class="title">Edit Section | {{$section->title}}</h6>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <form method="post" class="edit_section_form" id="edit-section-form-{{$section->id}}" data-section-id="{{$section->id}}" enctype="multipart/form-data">
                                                                        <div class="form-group  ">
                                                                            <label class="control-label">Section title</label>
                                                                            <input class="form-control" placeholder="Section Title" type="text" value="{{$section->title}}" name="title" required>
                                                                        </div>

                                                                        <div class="form-group   is-focused">
                                                                            <label class="control-label">Sort Order</label>
                                                                            <input class="form-control" placeholder="Sort Order" type="number" value="{{$section->order}}" name="order" required>
                                                                        </div>
                                                                        <button class="btn btn-blue btn-lg full-width">Edit section</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Window-popup Edit section -->

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

							</div>
                            <div class="tab-pane fade" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                                <div class="ui-block">
                                    <div class="ui-block-title">
                                        <h6 class="title text-center">Enrolled Employees</h6>
                                    </div>

                                    <div class="ui-block-content cumm">
                                        <div class="row">
                                            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive table-middle no-shadow">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="title-c">
                                                                <th>Employee Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($classroom->users as $user)
                                                                <tr>
                                                                    <td>{{$user->name}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
							    </div>
							</div>


                        <div class="tab-pane fade" id="leaderboard" role="tabpanel" aria-labelledby="leaderboard-tab">
									<div class="ui-block">


											<div class="ui-block-content cumm">
												<div class="row">
													<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
															<div class="table-responsive table-middle no-shadow">
																	<table class="table">
                                                                        @foreach ($classroom->classroomSections()->orderBy('order')->get() as $section)
                                                                        <table class="table section-content-{{$section->id}}">
                                                                            <thead>
                                                                                <tr class="title-c">
                                                                                    <th style="width:130px">{{$section->title}}</th>
                                                                                    <th class="text-center" style="width:130px">{{$section->sessions()->count()}} sessions</th>
                                                                                    <th class="text-center" style="width:130px"></th>
                                                                                    <th class="text-center" style="width:130px"></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($section->sessions()->orderBy('order')->get() as $session)
                                                                                    <tr class="session-content-{{$session->id}}">
                                                                                        <td style="width:130px">{{$session->title}}</td>
                                                                                        <td class="text-center" >Date: {{$session->session_date}} From: {{$session->from}} To: {{$session->to}}</td>
                                                                                        <td class="text-center" style="width:130px"><a href="#" data-toggle="modal" data-target="#attend-session-{{$session->id}}"><i class="fas fa-edit" style="margin-right: 5px;"></i>Edit</a></td>
                                                                                        <td class="text-center" style="width:130px"><a href="#" class="delete-session" data-session-id="{{$session->id}}"><i class="fas fa-trash-alt" style="margin-right: 5px;"></i>Delete</a></td>
                                                                                    </tr>
                                                                                    <!-- Window-popup Edit  session -->
                                                                                    <div class="modal fade" id="attend-session-{{$session->id}}" tabindex="-1" role="dialog" aria-labelledby="attend-session-{{$session->id}}" aria-hidden="true">
                                                                                        <div class="modal-dialog window-popup create-friend-group create-friend-group-1 " role="document">
                                                                                            <div class="modal-content">
                                                                                                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                                                                                                    <svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                                                                                </a>
                                                                                                <div class="modal-header">
                                                                                                    <h6 class="title">Edit Session | {{$session->title}}</h6>
                                                                                                </div>

                                                                                                <div class="modal-body">
                                                                                                    @foreach ($classroom->users as $user)
                                                                                                        <span>{{$user->name}}</span>
                                                                                                        <a href="#" class="attend-session" data-user-id="{{$user->id}}" data-session-id="{{$session->id}}"><i class="fas fa-circle" style="margin-right: 5px;"></i>
                                                                                                            @if($user->sessions()->where('session_id', $session->id)->first()) Unattend
                                                                                                            @else Attend
                                                                                                            @endif
                                                                                                        </a><br>
                                                                                                    @endforeach
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                        <!-- Window-popup Edit  session -->


                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    @endforeach

																	  </table>
																   </div>
													</div>
												</div>
											</div>



                        </div>
			</div>
		</div>
		<!-- Main Content -->




		<!-- ... end Main Content -->






	</div>
</div>




<!-- Window-popup Create section -->
<div class="modal fade" id="create-section" tabindex="-1" role="dialog" aria-labelledby="create-section" aria-hidden="true">
    <div class="modal-dialog window-popup create-friend-group create-friend-group-1" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>
            <div class="modal-header">
                <h6 class="title">Create Section</h6>
            </div>

            <div class="modal-body">
                <form method="post" id="create_section_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group  ">
                        <label class="control-label">Section title</label>
                        <input class="form-control" placeholder="Section Title" type="text" name="title" required>
                    </div>

                    <div class="form-group   is-focused">
                        <label class="control-label">Sort Order</label>
                        <input class="form-control" placeholder="Sort Order" type="number" name="order" required>
                    </div>
                    <button class="btn btn-blue btn-lg full-width">Create section</button>
                </form>
            </div>

            @include('english.layouts.partials.overlay')

        </div>
    </div>
</div>

<!-- Window-popup Create section -->


<!-- Window-popup Create  session -->
<div class="modal fade" id="create-session" tabindex="-1" role="dialog" aria-labelledby="create-session" aria-hidden="true">
    <div class="modal-dialog window-popup create-friend-group create-friend-group-1 " role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>
            <div class="modal-header">
                <h6 class="title">Create session</h6>
            </div>

            <div class="modal-body">
                <form method="post" id="create_session_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Session title</label>
                        <input class="form-control" placeholder="Session title"  type="text" name="title"  required>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Session Section</label>
                        <select class="form-control category-select" name="classroom_section_id" required>
                            @foreach ($classroom->classroomSections as $section)
                                <option value="{{$section->id}}">{{$section->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group  ">
                        <label class="control-label">Session order in section</label>
                        <input class="form-control" placeholder="Session Order" type="number" name="order" min="1" required>
                    </div>

                    <div class="form-group  ">
                        <label class="control-label">Session score when finished</label>
                        <input class="form-control" placeholder="Session Score" type="number" name="score" min="1" required>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Session Date</label>
                        <input class="form-control"  type="date" name="session_date" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Session From</label>
                        <input class="form-control"  type="time" name="from" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Session To</label>
                        <input class="form-control"  type="time" name="to" required>
                    </div>

                    <button class="btn btn-blue btn-lg full-width">Create Session</button>
                </form>
            </div>
        </div>
    </div>
</div>

	<!-- Window-popup Create  session -->




<!-- Window-popup Edit classroom -->
<div class="modal fade" id="edit-classroom" tabindex="-1" role="dialog" aria-labelledby="edit-classroom" aria-hidden="true">
	<div class="modal-dialog window-popup create-friend-group create-friend-group-1" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Edit classroom</h6>
			</div>

			<div class="modal-body">
				<form method="post" id="edit_classroom_form" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label class="control-label">classroom title</label>
						<input class="form-control" placeholder="classroom title"  type="text" name="title" value="{{$classroom->title}}" required>
					</div>

					<div class="form-group">
						<label class="control-label">classroom description</label>
						<textarea class="form-control" placeholder="classroom description"  type="text" name="description" required>{{$classroom->description}}</textarea>
					</div>

					<div class="form-group">
						<label class="control-label">classroom Category</label>
						<select class="form-control category-select" name="category_id" required>
							@foreach ($categories as $category)
								<option value="{{$category->id}}" @if($classroom->category_id == $category->id) selected @endif>{{$category->title}}</option>
							@endforeach
						</select>
					</div>


					<div class="form-group">
                        <label class="control-label">classroom Location</label>
                        <textarea class="form-control" placeholder="classroom description"  type="text" name="description" required>{{$classroom->location}}</textarea>
					</div>

					<div class="form-group">
						<label class="control-label">classroom Image</label>
						<img src="{{asset('') . $classroom->image}}" alt="nature" style="width: 100%;">
						<input class="form-control" placeholder="image" type="file" name="image" accept="image/*" >
					</div>

					<div class="form-group">
						<label class="control-label">classroom Expiration Date</label>
						<input class="form-control" placeholder="image" type="date" name="expired_at" value="{{substr($classroom->expired_at,0,10)}}" required>
					</div>

					<button class="btn btn-blue btn-lg full-width">Edit classroom</button>
				</form>
			</div>
		</div>
	</div>
</div>




	<!-- Window-popup Create  surey -->
    <div class="modal fade" id="create-survey" tabindex="-1" role="dialog" aria-labelledby="create-survey" aria-hidden="true">
		<div class="modal-dialog window-popup create-friend-group create-friend-group-1" role="document">
				<div class="modal-content">
					<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
						<svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
					</a>
					<div class="modal-header">
						<h6 class="title">Create Survey</h6>
					</div>

					<div class="modal-body">

                    <div id="tabs">
                        <ul class="white">

                            <li><a href="#tabs-1">Main</a></li>
                            <li><a href="#tabs-2">Survey Questions</a></li>

                        </ul>
                        <div id="tabs-1">
                                <form method="post" class="create_survey_form" data-session-type-id="1" id="" enctype="">
                                    @csrf

                                    <div class="form-group ">
                                        <label class="control-label">survey Title</label>
                                        <input class="form-control" placeholder=" Title" name="title" type="text" required>
                                    </div>

                                    <div class="form-group ">
                                        <label class="control-label">survey Description</label>
                                        <textarea class="form-control" placeholder=" Description" name="description" type="text" required></textarea>
                                    </div>

                                    <div class="form-group  ">
                                        <label class="control-label">survey Section</label>
                                        <select class="form-control category-select" name="section_id" required>
                                            @foreach ($classroom->classroomSections as $section)
                                                <option value="{{$section->id}}">{{$section->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group  ">
                                        <label class="control-label">survey Order in Section</label>
                                        <input class="form-control" placeholder="survey Order" type="number" name="order" min="1" required>
                                    </div>


                                </form>



                        </div>
                        <div id="tabs-2">
                            <div id="s-cont">
                                 <div id="select" data-question-number="0" class="form-group  select is-focused Question d-none ">
                                    <label class="control-label">select</label>
                                    <a href="#" class="btn btn-control removequ" data-toggle="tooltip" data-placement="top" title="Remove an Question">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>

                                    <input class="form-control" placeholder="" type="text" name="text" required>

                                    <div id="answerspace"  class="form-group label-floating  is-focused answer ">
                                        <label class="control-label">add answer</label>
                                        <input class="form-control label-floating" placeholder="" type="text" name="text" required>
                                        <a  href="#" class="btn btn-control removeanswer" data-toggle="tooltip" data-placement="top" title="Remove an ANSWER">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>
                                    </div>
                                    <a  href="#" class="btn btn-control addanswer" data-toggle="tooltip" data-placement="top" title="Add a new ANSWER">
                                        <svg style="fill:#38A9FF;" class="olymp-plus-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                    </a>
                                </div>


                               <div id="checkbox" data-question-number="0" class="form-group   is-focused checkbox Question d-none ">
                                    <label class="control-label">checkbox</label>
                                    <a href="#" class="btn btn-control removequ" data-toggle="tooltip" data-placement="top" title="Remove an Question">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>

                                    <input class="form-control" placeholder="" type="text" name="text" required>

                                    <div id="answerspace"  class="form-group label-floating  is-focused answer">
                                        <label class="control-label">add answer</label>
                                        <input class="form-control label-floating" placeholder="" type="text" name="text" required>
                                        <a  href="#" class="btn btn-control removeanswer" data-toggle="tooltip" data-placement="top" title="Remove an ANSWER">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>
                                    </div>
                                    <a  href="#" class="btn btn-control addanswer" data-toggle="tooltip" data-placement="top" title="Add a new ANSWER">
                                        <svg style="fill:#38A9FF;" class="olymp-plus-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                    </a>
                                </div>



                                <div id="radio" data-question-number="0" class="form-group   is-focused radio Question d-none">
                                    <label class="control-label">radio</label>
                                    <a href="#" class="btn btn-control removequ" data-toggle="tooltip" data-placement="top" title="Remove an Question">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>

                                    <input class="form-control" placeholder="" type="text" name="text" required>

                                    <div id="answerspace"  class="form-group label-floating  is-focused answer">
                                        <label class="control-label">add answer</label>
                                        <input class="form-control label-floating" placeholder="" type="text" name="text" required>
                                        <a  href="#" class="btn btn-control removeanswer" data-toggle="tooltip" data-placement="top" title="Remove an ANSWER">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>
                                    </div>
                                    <a  href="#" class="btn btn-control addanswer" data-toggle="tooltip" data-placement="top" title="Add a new ANSWER">
                                        <svg style="fill:#38A9FF;" class="olymp-plus-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                    </a>
                                </div>



                                <div id="text" data-question-number="0" class="form-group Question  text d-none">
                                    <label class="control-label">text</label>
                                    <a href="#" class="btn btn-control removequ" data-toggle="tooltip" data-placement="top" title="Remove an Question">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>

                                    <input class="form-control" placeholder=""  type="text" name="text" required>


                                </div>




                                <div id="number" data-question-number="0" class="form-group Question   number d-none">
                                    <label class="control-label ">number</label>
                                    <a href="#" class="btn btn-control removequ" data-toggle="tooltip" data-placement="top" title="Remove an Question">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>

                                    <input class="form-control" placeholder="" type="text" name="text" required>


                                </div>




                            </div>
                            <div id="s-type" class="form-group  ">
                                <label class="control-label">add question</label>
                                <select class="form-control category-select" name="section_id"  onfocus="this.value=''" required>
                                        <option value="free">choose a qustion type</option>
                                        <option value="text">text</option>
                                        <option value="select">select</option>
                                        <option value="checkbox">checkbox</option>
                                        <option value="radio">radio</option>
                                        <option value="number">number</option>
                                </select>
                            </div>
                        </div>
                    </div>






                    <a href="#" class="btn btn-blue btn-lg full-width">Create Quiz</a>
                </div>
            </div>
        </div>
	</div>

	<!-- Window-popup Create surey -->

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.category-select').select2();

        /*** Edit classroom */
        $('#edit_classroom_form').on('submit', function(event){
            event.preventDefault();
            var formData = new FormData(document.querySelector('#edit_classroom_form'));
            formData.append('_method', 'PUT');

            $.ajax({
                url:"{{ route('en.coordinator.classrooms.update', [$classroom->slug]) }}",
                method:"POST",
                processData: false, // important
                contentType: false, // important
                data:formData,
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('d-none');
                    window.location.replace(data.route);
                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })
        });
        /*** Edit classroom */

        /*** Delete classroom */
        $('.delete-classroom').on('click', function(event){
            event.preventDefault();
            function deleteAjax(){
                $.ajax({
                    url:"{{ route('en.coordinator.classrooms.destroy', [$classroom->slug]) }}",
                    method:"POST",
                    data:{'_method' : 'DELETE'},
                    dataType:'JSON',
                    beforeSend: function(){
                        $(".overlay").toggleClass('d-none');
                    },
                    success:function(data)
                    {
                        swalNormal(data.swal);
                        $(".overlay").toggleClass('d-none');
                        window.location.replace(data.route);
                    }
                })
            }

            confirmDelete(deleteAjax);
        });
        /*** Delete classroom */

        /*** Create Section */
        $('#create_section_form').on('submit', function(event){
            event.preventDefault();
            var formData = new FormData(document.querySelector('#create_section_form'));
            formData.append('classroom_id', '{{$classroom->id}}');
            $.ajax({
                url:"{{ route('en.coordinator.classroomsections.store') }}",
                method:"POST",
                processData: false, // important
                contentType: false, // important
                data:formData,
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    $('#create-section').modal('hide');
                    // $('.classroom-curriculum').html(data.curriculum);
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('d-none');
                    location.reload();
                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })
        });
        /*** Create Section */

        /*** Delete Section */
        $(document).on('click', '.delete-section', function(event){
            event.preventDefault();
            var section_id = $( this ).data( "section-id" );
            var url = '{{ route("en.coordinator.classroomsections.destroy", ":id") }}';
            url = url.replace(':id', section_id);

            function deleteAjax(){
                $.ajax({
                    url: url,
                    method:"POST",
                    data:{'_method' : 'DELETE'},
                    dataType:'JSON',
                    beforeSend: function(){
                        $(".overlay").toggleClass('d-none');
                    },
                    success:function(data)
                    {
                        swalNormal(data.swal);
                        $(".overlay").toggleClass('d-none');
                        $( '.section-content-' + data.section_id ).remove();
                    }
                })
            }

            confirmDelete(deleteAjax);
        });
        /*** Delete Section */

        /*** Edit Section */
        $(document).on('submit', '.edit_section_form', function(event){
            event.preventDefault();
            var section_id = $( this ).data( "section-id" );
            var url = '{{ route("en.coordinator.classroomsections.update", ":id") }}';
            url = url.replace(':id', section_id);

            var formData = new FormData(document.querySelector( '#edit-section-form-' + section_id ));
            formData.append('_method', 'PUT');

            $.ajax({
                url:url,
                method:"POST",
                processData: false, // important
                contentType: false, // important
                data:formData,
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    $('#edit-section-1' + data.section_id).modal('hide');
                    /*
                    ** Clean defects of modal hide not working proberly
                    */
                    $(".modal-backdrop").remove();
                    $('body').removeClass('modal-open');
                    /******/
                    // $('.classroom-curriculum').html(data.curriculum);
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('d-none');
                    location.reload();

                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })

        });
        /*** Edit Section */

        /*** Create session */
        $('#create_session_form').on('submit', function(event){
            event.preventDefault();
            var formData = new FormData(document.querySelector('#create_session_form'));

            $.ajax({
                url:"{{ route('en.coordinator.sessions.store') }}",
                method:"POST",
                processData: false, // important
                contentType: false, // important
                data:formData,
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    // $('.classroom-curriculum').html(data.curriculum);
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('d-none');
                    location.reload();
                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })
        });
        /*** Create session */

        /*** Delete session */
        $(document).on('click', '.delete-session', function(event){
            event.preventDefault();
            var session_id = $( this ).data( "session-id" );
            var url = '{{ route("en.coordinator.sessions.destroy", ":id") }}';
            url = url.replace(':id', session_id);

            function deleteAjax(){
                $.ajax({
                    url: url,
                    method:"POST",
                    data:{'_method' : 'DELETE'},
                    dataType:'JSON',
                    beforeSend: function(){
                        $(".overlay").toggleClass('d-none');
                    },
                    success:function(data)
                    {
                        $('.classroom-curriculum').html(data.curriculum);
                        $( '.session-content-' + data.session_id ).remove();
                        $(".overlay").toggleClass('d-none');
                        swalNormal(data.swal);
                    }
                })
            }

            confirmDelete(deleteAjax);
        });
        /*** Delete session */

        /*** Edit session */
        $(document).on('submit', '.edit_session_form', function(event){
            event.preventDefault();
            var session_id = $( this ).data( "session-id" );
            var url = '{{ route("en.coordinator.sessions.update", ":id") }}';
            url = url.replace(':id', session_id);

            var formData = new FormData(document.querySelector( '#edit-session-content-' + session_id ));
            formData.append('_method', 'PUT');

            $.ajax({
                url: url,
                method: "POST",
                processData: false, // important
                contentType: false, // important
                data: formData,
                dataType: 'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    $('#edit-session-' + data.session_id).modal('hide');
                    /*
                    ** Clean defects of modal hide not working proberly
                    */
                    $(".modal-backdrop").remove();
                    $('body').removeClass('modal-open');
                    /******/
                    // $('.classroom-curriculum').html(data.curriculum);
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('d-none');
                    location.reload();
                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })

        });
        /*** Edit session */

        /*** Attend Session */
        $(document).on('click', '.attend-session', function(event)
        {
            event.preventDefault();
            var session_id = $( this ).data('session-id');
            var user_id = $( this ).data('user-id');
            $.ajax({
                url: "{{route('en.coordinator.sessions.attend')}}",
                method: "POST",
                data: {'session_id': session_id, 'user_id': user_id},
                dataType: 'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('d-none');
                    location.reload();
                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })

        });
        /*** Attend Session */

        /*** Create Quiz */
        $(document).on('submit', '.create_quiz_form', function(event){
            event.preventDefault();
            var session_type_id = $( this ).data('session-type-id');
            var formData = new FormData(document.querySelector('#session-type-id-' + session_type_id));
            formData.append('session_type_id', session_type_id);

            $.ajax({
                url:"{{ route('en.coordinator.quizzes.store') }}",
                method:"POST",
                processData: false, // important
                contentType: false, // important
                data:formData,
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    $('.classroom-curriculum').html(data.curriculum);
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('d-none');
                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })
        });
        /*** Create Quiz */

        /*** Edit Quiz */
        $(document).on('submit', '.edit_quiz_form', function(event){
            event.preventDefault();
            var session_id = $( this ).data( "session-id" );
            var url = '{{ route("en.coordinator.quizzes.update", ":id") }}';
            url = url.replace(':id', session_id);

            var formData = new FormData(document.querySelector( '#edit-session-content-' + session_id ));
            formData.append('_method', 'PUT');

            $.ajax({
                url: url,
                method: "POST",
                processData: false, // important
                contentType: false, // important
                data: formData,
                dataType: 'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    $('#edit-session-' + data.session_id).modal('hide');
                    /*
                    ** Clean defects of modal hide not working proberly
                    */
                    $(".modal-backdrop").remove();
                    $('body').removeClass('modal-open');
                    /******/
                    $('.classroom-curriculum').html(data.curriculum);
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('d-none');
                    location.reload();
                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })

        });
        /*** Edit Quiz */

    });
</script>
@endsection
