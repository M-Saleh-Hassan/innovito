<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">{{$lesson->title}}</h6>
    </div>
    <div class="ui-block-content">
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                    <video poster="" id="player" playsinline controls style="width:100%">
                        <source src="{{asset('') . $lesson->content->localvideo_link }}" type="video/mp4" />
                    </video>

                {{-- <img src="{{ asset('assets') }}/img/post-thumb1.jpg" alt="">
                <a href=" {{asset('') . $lesson->content->localvideo_link }}" class="play-video">
                    <svg class="olymp-play-icon"><use xlink:href="{{ asset('assets') }}/svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
                </a> --}}
            </div>
        </div>
    </div>
</div>
