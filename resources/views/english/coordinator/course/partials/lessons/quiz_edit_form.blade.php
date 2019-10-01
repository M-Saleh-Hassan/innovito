<div class="modal fade" id="edit-quiz-{{$lesson->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-lesson-{{$lesson->id}}" aria-hidden="true">
    <div class="modal-dialog window-popup create-friend-group create-friend-group-1" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>
            <div class="modal-header">
                <h6 class="title">Edit Quiz | {{$lesson->quiz->quiz_title}}</h6>
            </div>
            <div class="modal-body">
                <div class="tabs">
                    <ul class="white">
                        <li><a href="#tabs-1">Main</a></li>
                        <li><a href="#tabs-2">Questions</a></li>
                    </ul>
                    <div id="tabs-1">
                            <form method="post" class="edit_quiz_form" data-lesson-id="{{$lesson->id}}" id="edit-lesson-content-{{$lesson->id}}">
                                @csrf

                                <div class="form-group">
                                    <label class="control-label">Quiz Title</label>
                                    <input class="form-control" placeholder="Quiz Title" name="title" type="text" value="{{$lesson->quiz->quiz_title}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Quiz Description</label>
                                    <textarea class="form-control" placeholder="Quiz Description" name="description" type="text"  required>{{$lesson->quiz->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Quiz Section</label>
                                    <select class="form-control category-select" name="section_id" required>
                                        @foreach ($course->sections as $section)
                                            <option value="{{$section->id}}" @if($lesson->section_id == $section->id) selected @endif>{{$section->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Quiz Order in Section</label>
                                    <input class="form-control" placeholder="Quiz Order" type="number" value="{{$lesson->order}}" name="order" min="1" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Quiz Score When finished</label>
                                    <input class="form-control" placeholder="Quiz Order" type="number" value="{{$lesson->score}}" min="1" name="score" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Quiz Duration</label>
                                    <input class="form-control" placeholder="minutes : seconds (ex: 30:00)" type="text" value="{{$lesson->quiz->time_limit}}" name="time_limit" pattern="[0-9]{2}[:][0-9]{2}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Quiz Passing Score</label>
                                    <input class="form-control" placeholder="Quiz Passing Score for employee" type="number" value="{{$lesson->quiz->passing_score}}" min="1" name="passing_score" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Quiz Due Date</label>
                                    <input class="form-control" placeholder="Quiz Due Date" type="datetime-local" value="{{$lesson->quiz->due_date}}" name="due_date" required>
                                </div>
                                <button class="btn btn-blue btn-lg full-width">Update Quiz</button>
                            </form>



                    </div>
                    <div id="tabs-2">
                        <div id="cont">
                            <div id="Question" data-question-number="0" class="form-group   is-focused Question clone d-none">
                                <label class="control-label">add Question</label>
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

                            <form>
                                <div data-question-number="1" class="form-group is-focused Question clone" >
                                    <label class="control-label">Add Question</label>
                                    <a href="#" class="btn btn-control removequ" data-toggle="tooltip" data-placement="top" title="Remove an Question">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>
                                    <input class="form-control" placeholder="" type="text" name="text" required>

                                    <div   class="form-group label-floating  is-focused answer">
                                        <label class="control-label">add answer</label>

                                        <input class="form-control label-floating" placeholder="" type="text" name="text" required>
                                        <a href="#" class="btn btn-control removeanswer" data-toggle="tooltip" data-placement="top" title="Remove an ANSWER">
                                            <svg style="fill:#FF0000;" class="olymp-close-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                        </a>
                                    </div>
                                    <a  href="#" class="btn btn-control addanswer" data-toggle="tooltip" data-placement="top" title="Add a new ANSWER">
                                        <svg style="fill:#38A9FF;" class="olymp-plus-icon"><use xlink:href="{{asset('assets')}}/svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                    </a>
                                </div>
                            </form>
                        </div>
                        <a  class="btn  btn-secondary btn-lg full-width addquest" >add another</a>
                        <button class="btn btn-blue btn-lg full-width">Update Questions</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
