<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">{{$lesson->title}}</h6>
    </div>
    <div class="ui-block-content">
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                    <iframe width="100%" height="300" src="{{$lesson->content->external_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
