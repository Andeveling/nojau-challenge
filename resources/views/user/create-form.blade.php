<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name ?? '') }}" id="name" placeholder="Name">
            @error('name')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <div class="form-group">
            <fieldset>
                <legend class="col-form-label pt-0">Tags</legend>
                <div class="row">
                    @foreach ($tags as $tag)
                        <div class="col-md-3 mb-2"> <!-- Esto divide en columnas de máximo 4 (12/3) -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]"
                                    id="tag_{{ $tag->id }}" value="{{ $tag->id }}"
                                    @if (in_array($tag->id, old('tags', $userTags ?? []))) checked @endif>
                                <label class="form-check-label" for="tag_{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </fieldset>
        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
