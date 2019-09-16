<div id="tabs-4">
    <form method="post" class="create_lesson_form" data-lesson-type-id="4" id="lesson-type-id-4" enctype="multipart/form-data">
        @csrf

        <div class="form-group label-floating">
            <label class="control-label">Lesson Title</label>
            <input class="form-control" placeholder="Lesson Title" name="title" type="text" required>
        </div>

        <div class="form-group label-floating">
            <label class="control-label">Lesson Description</label>
            <textarea class="form-control" placeholder="Lesson Description" name="description" type="text" required></textarea>
        </div>

        <div class="form-group label-floating">
            <label class="control-label">Lesson Section</label>
            <select class="form-control category-select" name="section_id" required>
                @foreach ($course->sections as $section)
                    <option value="{{$section->id}}">{{$section->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group label-floating">
            <label class="control-label">Lesson Order in Section</label>
            <input class="form-control" placeholder="Lesson Order" type="number" name="order" min="1" required>
        </div>

        <div class="form-group label-floating">
            <label class="control-label">Lesson Score When finished</label>
            <input class="form-control" placeholder="Lesson Score" type="number" value="0" name="score" required>
        </div>

        <div class="form-group label-floating">
            <label class="control-label">Lesson File (.pdf/.pptx/.docx)</label>
            <input class="form-control" placeholder="Lesson File" type="file" name="localvideo_link" accept="application/pdf,application/vnd.ms-excel" required>
        </div>

        <button class="btn btn-blue btn-lg full-width">Create Lesson</button>
    </form>

    @include('english.layouts.partials.overlay')
</div>
