<div class="row">
    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-responsive table-middle no-shadow">
            @foreach ($course->sections()->orderBy('order')->get() as $section)
                <table class="table section-content-{{$section->id}}">
                    <thead>
                        <tr class="title-c">
                            <th>{{$section->title}}</th>
                            <th class="text-center" style="width:130px">{{$section->lessons()->count()}} Lessons</th>
                            <th class="text-center" style="width:130px"></th>
                            <th class="text-center" style="width:130px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($section->lessons()->orderBy('order')->get() as $lesson)
                            <tr class="lesson-content-{{$lesson->id}}">
                                <td>{{$lesson->title}}</td>
                                <td class="text-center" style="width:130px">{{$lesson->lessonType->title}}</td>
                                <td class="text-center" style="width:130px"><a href="#" data-toggle="modal" data-target="@if($lesson->lesson_type_id == 8) #edit-quiz-{{$lesson->id}} @else #edit-lesson-{{$lesson->id}} @endif"><i class="fas fa-edit" style="margin-right: 5px;"></i>Edit</a></td>
                                <td class="text-center" style="width:130px"><a href="#" class="delete-lesson" data-lesson-id="{{$lesson->id}}"><i class="fas fa-trash-alt" style="margin-right: 5px;"></i>Delete</a></td>
                            </tr>
                            @include('english.coordinator.course.partials.lessons.edit_modal', ['lesson' => $lesson])
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
                                    <div class="form-group label-floating">
                                        <label class="control-label">Section title</label>
                                        <input class="form-control" placeholder="Section Title" type="text" value="{{$section->title}}" name="title" required>
                                    </div>

                                    <div class="form-group label-floating is-focused">
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
