@extends('layouts.admin')

@section('content')
    <h2>Edit Module</h2>

    <form action="{{ route('admin.updateProgram', $program->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This is important to use the PUT method for updating -->
        
        <div class="form-group">
            <label for="programid">Program ID</label>
            <input type="text" name="programid" id="programid" class="form-control" value="{{ old('programid', $program->programid) }}" required>
        </div>
        
        <div class="form-group">
            <label for="module_id">Module ID</label>
            <input type="text" name="module_id" id="module_id" class="form-control" value="{{ old('module_id', $program->module_id) }}" required>
        </div>

        <div class="form-group">
            <label for="std">STD</label>
            <input type="text" name="std" id="std" class="form-control" value="{{ old('std', $program->std) }}" required>
        </div>

        <div class="form-group">
            <label for="document_type">Document Type</label>
            <input type="text" name="document_type" id="document_type" class="form-control" value="{{ old('document_type', $program->document_type) }}" required>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $program->title) }}" required>
        </div>

        <div class="form-group">
            <label for="publish_link">Publish Link</label>
            <input type="url" name="publish_link" id="publish_link" class="form-control" value="{{ old('publish_link', $program->publish_link) }}">
        </div>

        <div class="form-group">
            <label for="presentation_link">Presentation Link</label>
            <input type="url" name="presentation_link" id="presentation_link" class="form-control" value="{{ old('presentation_link', $program->presentation_link) }}">
        </div>

        <div class="form-group">
            <label for="youtube_voiceover">YouTube Voiceover</label>
            <input type="url" name="youtube_voiceover" id="youtube_voiceover" class="form-control" value="{{ old('youtube_voiceover', $program->youtube_voiceover) }}">
        </div>

        <div class="form-group">
            <label for="google_slide">Google Slide</label>
            <input type="url" name="google_slide" id="google_slide" class="form-control" value="{{ old('google_slide', $program->google_slide) }}">
        </div>

        <div class="form-group">
            <label for="worksheet">Worksheet</label>
            <input type="url" name="worksheet" id="worksheet" class="form-control" value="{{ old('worksheet', $program->worksheet) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Module</button>
    </form>
@endsection
