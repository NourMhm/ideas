
<div class="card">

    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">

            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageURL() }}"  alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show',$idea->user->id) }}">{{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('ideas.destroy',$idea->id) }}">
                    @csrf
                        <a href="{{ route('ideas.show',$idea->id) }}" class="btn btn-success btn-sm" >view </a>
                    {{-- @if(auth()->id() == $idea->user_id) --}}
                    @can('update' ,$idea)


                    <a href="{{ route('ideas.edit',$idea->id) }}" class="btn btn-primary btn-sm" >Edit </a>
                    @method('delete')
                    <button class="btn btn-danger btn-sm">Delete </button>
                    @endcan
{{--
                    @endif
 --}}

                </form>

            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
        <form action="{{ route('ideas.update',$idea->id) }}" method="post"  >
            @csrf
            @method('put')
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
            </div>
            <br>
            @error('content')
                <div class="d-block text-danger" style="margin-top:-25px; margin-bottom:15px;">
                    {{ $message }}
                </div>
            @enderror
            <div class="">
                <button type="submit" class="btn btn-dark mb-2"> Update </button>
            </div>


        </form>

        @else

            <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>


        @include('ideas.shared.comments-box')


    </div>


</div>
