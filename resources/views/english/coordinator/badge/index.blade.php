@extends('english.layouts.master')

@section('page_title')
My Badges
@endsection

@section('content')
<!-- Top Header-Profile -->

<div class="main-header">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                <div class="main-header-content">
                    <h1>Make your Badges!</h1>
                    <p>Welcome to your badge collection! Here you’ll find all the badges you can Create.</p>
                </div>
            </div>
        </div>
    </div>

    <img class="img-bottom" src="{{asset('assets')}}/img/badges-bottom.png" alt="friends">
</div>

<!-- Friends -->

<div class="container">
<div class="row">

<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">

            <!-- Course Item -->

            <div class="friend-item friend-groups create-group" data-mh="friend-groups-item" style="height: 490.781px;">

                <a href="#" class=" full-block" data-toggle="modal" data-target="#create-badge"></a>
                <div class="content">

                    <a href="#" class="  btn btn-control bg-blue" data-toggle="modal" data-target="#create-badge">
                        <svg class="olymp-plus-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                    </a>

                    <div class="author-content">
                        <a href="#" class="h5 author-name">Add badge</a>
                    </div>

                </div>

            </div>

            <!-- ... end Course Item -->
        </div>
        @foreach (Auth::user()->badges as $badge)
            <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="ui-block" data-mh="friend-groups-item" >
                        <!-- Friend Item -->
                        <div class="friend-item friend-groups">
                            <div class="friend-item-content">
                                <div class="friend-avatar">
                                    <div class="author-thumb">
                                        <img class="centeeeer" style="width: 100%;" src="{{asset('') . $badge->image}}" alt="Olympus">
                                    </div>
                                    <div class="author-content">
                                        <a href="#" class="h5 author-name" data-toggle="modal" data-target="#edit-badge-{{$badge->id}}">
                                            {{$badge->title}}
                                        </a>
                                        {{-- <div class="date">25 april 2019</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ... end Friend Item -->
                </div>
            </div>

            <div class="modal fade" id="edit-badge-{{$badge->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-badge-{{$badge->id}}" aria-hidden="true">
                <div class="modal-dialog window-popup create-friend-group create-friend-group-1" role="document">
                        <div class="modal-content">
                            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                                <svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                            </a>
                            <div class="modal-header">
                                <h6 class="title">Edit Badge | {{$badge->title}}</h6>
                            </div>

                            <div class="modal-body">
                                <form method="post" class="edit_badge_form" id="edit-badge-form-{{$badge->id}}" enctype="multipart/form-data" data-badge-id="{{$badge->id}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label">Badge Title</label>
                                        <input class="form-control" placeholder="Course Title"  type="text" name="title"  value="{{$badge->title}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Badge Description</label>
                                        <textarea class="form-control" placeholder="Badge Description"  type="text" name="description" value="{{$badge->description}}" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Badge Type</label>
                                        <select class="form-control" name="badge_type_id" required>
                                            @foreach ($badge_types as $badge_type)
                                                <option value="{{$badge_type->id}}" @if($badge->badge_type_id == $badge_type->id) selected @endif>{{$badge_type->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Badge Image</label>
                                        <input class="form-control" placeholder="image" type="file" name="image" accept="image/*">
                                    </div>


                                    <button  class="btn btn-blue btn-lg full-width">Edit Badge</button>
                                    <button  class="btn btn-red btn-lg full-width delete-badge" data-badge-id="{{$badge->id}}" style="background-color: red">Delete Badge</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>

        @endforeach
    </div>
</div>

<!-- Window-popup Create  badge -->
<div class="modal fade" id="create-badge" tabindex="-1" role="dialog" aria-labelledby="create-badge" aria-hidden="true">
		<div class="modal-dialog window-popup create-friend-group create-friend-group-1" role="document">
				<div class="modal-content">
					<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
						<svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
					</a>
					<div class="modal-header">
						<h6 class="title">Create badge</h6>
					</div>

					<div class="modal-body">
                        <form method="post" id="create_badge_form" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Badge Title</label>
                                <input class="form-control" placeholder="Course Title"  type="text" name="title"  required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Badge Description</label>
                                <textarea class="form-control" placeholder="Badge Description"  type="text" name="description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Badge Type</label>
                                <select class="form-control" name="badge_type_id" required>
                                    @foreach ($badge_types as $badge_type)
                                        <option value="{{$badge_type->id}}">{{$badge_type->type}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Badge Image</label>
                                <input class="form-control" placeholder="image" type="file" name="image" accept="image/*" required>
                            </div>


                            <button  class="btn btn-blue btn-lg full-width">Create Badge</button>
                        </form>
					</div>
				</div>
			</div>
	</div>

	<!-- Window-popup Create  course -->

<!-- ... end Friends -->

@endsection

@section('script')
<script>
    $(document).ready(function() {
        /*** Create Badge */
        $('#create_badge_form').on('submit', function(event){
            event.preventDefault();
            var formData = new FormData(document.querySelector('#create_badge_form'));
            $.ajax({
                url:"{{ route('en.coordinator.badges.store') }}",
                method:"POST",
                processData: false, // important
                contentType: false, // important
                data:formData,
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('hidden');
                },
                success:function(data)
                {
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('hidden');
                    window.location.replace(data.route);
                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })
        });
        /*** Create Badge */

        /*** Edit Badge */
        $(document).on('submit', '.edit_badge_form', function(event){
            event.preventDefault();
            var badge_id = $( this ).data( "badge-id" );
            var url = '{{ route("en.coordinator.badges.update", ":id") }}';
            url = url.replace(':id', badge_id);

            var formData = new FormData(document.querySelector( '#edit-badge-form-' + badge_id ));
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
                    swalNormal(data.swal);
                    $(".overlay").toggleClass('hidden');
                    window.location.replace(data.route);
                },
                error:function(data)
                {
                    sweetAlertErrorResponse(data);
                }
            })

        });
        /*** Edit Badge */

        /*** Delete Badge */
        $(document).on('click', '.delete-badge', function(event){
            event.preventDefault();
            var badge_id = $( this ).data( "badge-id" );
            var url = '{{ route("en.coordinator.badges.destroy", ":id") }}';
            url = url.replace(':id', badge_id);

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
                        $(".overlay").toggleClass('hidden');
                        window.location.replace(data.route);
                    }
                })
            }

            confirmDelete(deleteAjax);
        });
        /*** Delete Badge */

    });
</script>
@endsection
