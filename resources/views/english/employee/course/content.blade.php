@extends('english.layouts.master')

@section('page_title')
{{$course->title}}
@endsection

@section('content')
<!-- Main Header Groups -->

<div class="container">
    <div class="row margin-top">
        <div class="col-lg-4 col-md-12 order-lg-12 order-md-1">
            <div class=" map ">
                <div id="accordion">
                    @foreach ($course->sections as $section)
                        <h3 class="accordion-header">{{$section->title}}</h3>
                        <div>
                            <ul class="lessons">
                                @foreach ($section->lessons()->orderBy('order')->get() as $lesson)
                                    @if ($course->getLastSeenLessonId() == $lesson->id)
                                        <a class="lesson-id now" data-lesson-id="{{$lesson->id}}" onclick="event.preventDefault()"><li><i class="fas fa-play-circle"></i>{{$lesson->title}}</li></a>
                                    @elseif ($lesson->status)
                                        <a class="lesson-id done" data-lesson-id="{{$lesson->id}}"><li><i class="fas fa-check-circle"></i>{{$lesson->title}}</li></a>
                                    @else
                                        <a class="lesson-id locked" data-lesson-id="{{$lesson->id}}" onclick="event.preventDefault()"><li><i class="fas fa-lock"></i>{{$lesson->title}}</li></a>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="ui-block margin-top" oncopy="return false" oncut="return false" onpaste="return false">
					<div class="ui-block-title">
						<h6 class="title">timer</h6>
					</div>
					<div class="ui-block-content">
						<div class="row">
							<div class="col col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
								<span id="timer">45</span>
							</div>

						</div>
					</div>
				</div> --}}

            </div>
        </div>

        <div class="col-lg-8 col-md-12  order-lg-1 order-md-12 header-h lesson-content">
            {!! $lesson_text !!}
            {{-- <div class="ui-block">
						<div class="ui-block-title">
							<h6 class="title">Quiz in ............</h6>
						</div>
						<div class="ui-block-content">
							<div class="row">
								<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
										<ul class="widget w-personal-info item-block">
											<li>
												<span class="title">who are you dummy ?</span>
												<br>
												<br>
											    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

											</li>
											<li>
												<span class="title">who ate the cheese! </span>
												<br>
												<br>

												  <div class="form-check" style="margin-bottom: 10px; ">
													<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" style="width: auto;margin-top:0; " >
													<label class="form-check-label" for="exampleRadios1">
														fareed
													</label>
												  </div>

												  <div class="form-check" style="margin-bottom: 10px; ">
														<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" style="width: auto;margin-top:0; " >
														<label class="form-check-label" for="exampleRadios1">
																saleh
														</label>
													  </div>


											</li>

										</ul>
								</div>

							</div>
						</div>
					</div> --}}

            <div class="lesson-footer ">
                {{-- <button class="btn btn-primary btn-md-2 navsh "><i class="fas fa-arrow-left"></i> prev</button> --}}

                <button class="btn btn-primary btn-md-2 lesson-check"><i class="fas fa-check-circle"></i> done</button>

                {{-- <button class="btn btn-primary btn-md-2 navsh nomore">next <i class="fas fa-arrow-right"></i></button> --}}
            </div>

        </div>



    </div>
    @include('english.layouts.partials.overlay')
</div>
<!-- ... end Main Content Groups -->

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.accordion-header').trigger('click')
        const player = new Plyr('#player');
        /*** Filter Lessons */
        $(document).on('click', '.lesson-id', function () {
            var lesson_id = $( this ).data('lesson-id');
            $.ajax({
                url:"{{ route('en.employee.lessons.filter') }}",
                method:"POST",
                data:{'lesson_id': lesson_id},
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    $( '.ui-block' ).not('.map').remove();
                    $(' .lesson-content ').prepend(data.lesson);
                    if(data.show_done) $('.lesson-check').show();
                    else $('.lesson-check').hide();
                    console.log(data.show_done);
                    $(".overlay").toggleClass('d-none');
                },
            });
        });
        /*** Filter Lessons */

        /*** Make Lesson Done */
        $(document).on('click', '.lesson-check', function () {
            var lesson_id = $(' .now ').data('lesson-id');

            $.ajax({
                url:"{{ route('en.employee.lessons.check') }}",
                method:"POST",
                data:{'lesson_id': lesson_id},
                dataType:'JSON',
                beforeSend: function(){
                    $(".overlay").toggleClass('d-none');
                },
                success:function(data)
                {
                    // $( '.ui-block' ).not( '.map' ).remove();
                    // $(' .lesson-content ').prepend(data.lesson);
                    $(".overlay").toggleClass('d-none');
                    location.reload();
                },
            });
        });
        /*** Make Lesson Done */
    });

</script>


<script>
	/***-------------timer script------ */

	var minutes;
 var seconds;
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval (function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
		}
		if( minutes == 0 && seconds <= 30 ){
			$("#timer").css("color", "red");
		}
		if( minutes == "00" && seconds <= "00" ){
			// window.location.replace("http://www.google.com");
		}

	}, 1000);

}

jQuery(function ($) {
	var mins = $('#timer').text()
    var Minutes = 60 * mins ,
        display = $('#timer');
	startTimer(Minutes, display);

});

</script>

@endsection
