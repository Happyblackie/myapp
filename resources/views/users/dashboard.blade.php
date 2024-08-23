
<x-layout>

    <h1 class="title">Hello {{ auth()->user()->username }}</h1>

    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>

      
        {{-- Session messages --}}
       @if (session('success'))
        <div class="mb-2">
            <x-flashMsg msg="{{ session('success') }}" />

            {{-- <p class="text-green-500">{{ session('success') }}</p> --}}
        </div>
       @endif

        <form action="{{ route('posts.store') }}" method="post">
            {{ csrf_field() }}

            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="input @error('title') ring-red-500 @enderror">

                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
             {{-- Post Title --}}
            <div class="mb-4">
                <label for="body">Post Content</label>
                <textarea name="body"  rows="5" class="input @error('body') ring-red-500 @enderror">{{ old('body') }}</textarea>

                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

             {{-- Submit button --}}
             <button class="btn">Create</button>

             {{-- Latest Post --}}
            <p class="title">Latest Post</p>



            <div class="grid grid-cols-2 gap-6">
            
                @foreach ($posts as $data)
                 {{-- Post card component --}}
                 <x-postCard :data="$data"/>
    
                @endforeach
    
    
        </div>

    

        </form>
    </div>

    
    <div>
        {{ $posts->onEachSide(1)->links() }}
    </div> 

   
</x-layout>
