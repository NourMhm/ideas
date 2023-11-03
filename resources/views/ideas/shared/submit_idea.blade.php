@auth()

<h4> Share yours ideas </h4>
<div class="row">
    <form   action="{{ route('ideas.store') }}" method="post"  >
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
        </div>
        <br>
        @error('content')
            <div class="d-block text-danger" style="margin-top:-25px; margin-bottom:15px;">
                {{ $message }}
            </div>
        @enderror
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>


    </form>

</div>
@endauth

@guest
    <h4> Login To Share yours ideas </h4>
@endguest
