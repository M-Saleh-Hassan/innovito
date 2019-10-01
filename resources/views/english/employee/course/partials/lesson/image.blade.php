<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">{{$lesson->title}}</h6>
    </div>
    <div class="ui-block-content">
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                <p class="text">{{$lesson->description}}</p>
                <img src="{{ asset('') . $lesson->content->image }}" alt="">
            </div>
        </div>
    </div>
</div>
