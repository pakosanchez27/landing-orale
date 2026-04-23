<div class="admin-editor" data-editor-root>
    <div class="admin-editor__toolbar">
        <button type="button" class="admin-editor__btn" data-command="bold"><i class="fa-solid fa-bold"></i></button>
        <button type="button" class="admin-editor__btn" data-command="italic"><i class="fa-solid fa-italic"></i></button>
        <button type="button" class="admin-editor__btn" data-command="insertUnorderedList"><i class="fa-solid fa-list-ul"></i></button>
        <button type="button" class="admin-editor__btn" data-command="insertOrderedList"><i class="fa-solid fa-list-ol"></i></button>
        <button type="button" class="admin-editor__btn" data-block="h2">H2</button>
        <button type="button" class="admin-editor__btn" data-block="p">P</button>
        <button type="button" class="admin-editor__btn" data-link="true"><i class="fa-solid fa-link"></i></button>
        <button type="button" class="admin-editor__btn" data-command="removeFormat"><i class="fa-solid fa-eraser"></i></button>
    </div>
    <div class="admin-editor__surface" contenteditable="true" data-editor-surface>{!! $value !!}</div>
    <textarea class="admin-input admin-textarea admin-editor__textarea" name="{{ $name }}" data-editor-textarea hidden>{{ $value }}</textarea>
</div>
