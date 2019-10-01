<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">{{$lesson->title}}</h6>
    </div>
    <div class="ui-block-content">
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                <ul class="widget w-personal-info item-block">
                    <li>
                        {{-- <span class="title" >{{$lesson->title}}</span> --}}
                        <object data="{{asset('') . $lesson->content->localvideo_link}}" type="application/pdf" style="width: 100%;height: 444px;">
                            <iframe src="https://docs.google.com/viewer?url={{asset('') . $lesson->content->localvideo_link}}&embedded=true"></iframe>
                        </object>

                        {{-- <a href="{{asset('') . $lesson->content->localvideo_link}}" target="_blank">{{$lesson->content->video_filename}}</a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
