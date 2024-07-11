<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <fieldset class="form-group">
                <legend class="col-form-label pt-0">Tags</legend>
                @if ($tags->count() > 0)
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tags[]" id="tag_{{ $tag->id }}" value="{{ $tag->id }}" {{ in_array($tag->id, $userTags->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tag_{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>

                        </div>
                    @endforeach
                @else
                    <span>No tags created.</span>
                @endif

            </fieldset>

        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
