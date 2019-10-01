@switch($lesson->lessonType->id)
    @case(1)
        @include('english.coordinator.course.partials.lessons.text_edit_form', ['lesson' => $lesson])
        @break
    @case(2)
        @include('english.coordinator.course.partials.lessons.image_edit_form', ['lesson' => $lesson])
        @break
    @case(3)
        @include('english.coordinator.course.partials.lessons.text_and_image_edit_form', ['lesson' => $lesson])
        @break
    @case(4)
        @include('english.coordinator.course.partials.lessons.file_edit_form', ['lesson' => $lesson])
        @break
    @case(5)
        @include('english.coordinator.course.partials.lessons.external_content_edit_form', ['lesson' => $lesson])
        @break
    @case(6)
        @include('english.coordinator.course.partials.lessons.internal_upload_edit_form', ['lesson' => $lesson])
        @break
    @case(7)
        @include('english.coordinator.course.partials.lessons.scorm_edit_form', ['lesson' => $lesson])
        @break
    @case(8)
        @include('english.coordinator.course.partials.lessons.quiz_edit_form', ['lesson' => $lesson])
        @break
    @default

@endswitch
