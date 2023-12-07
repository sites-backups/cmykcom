<textarea  id="editor" name="body" class="form-control" required  cols="30" rows="5">{{ html_entity_decode($data->body) }}</textarea>
@include('editor.js.index')
