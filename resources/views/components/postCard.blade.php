
@props(['data'])


<div class="card">
    {{-- Title --}}
    <h2 class="font-bold text-xl">{{ $data->title }}</h2>

    {{-- Author and Date --}}
    <div class="text-xs font-light mb-4">
        <span>Posted {{ $data->created_at->diffForHumans() }} by</span>
        <a href="{{ route('posts.user', $data->user ) }}" class="text-blue-500 font-medium">{{ $data->user->username }}</a>
    </div>

    {{-- Body --}}
    <div class="text-sm">
        <p>
                {{--showing less words with thier ending  --}}
            {{ Str::words($data->body, 100) }}
        </p>
    </div>
</div>