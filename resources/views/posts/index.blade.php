
<x-layout>

    @auth
        <h1>Logged In</h1>
    @endauth

    @guest
        <h1>Guest</h1>
    @endguest

    <h1 class="title">Latest Post</h1>
    {{-- <p>{{ $posts }}</p> --}}


    <div class="grid grid-cols-2 gap-6">
            
            @foreach ($posts as $data)
            <x-postCard :data="$data"/>
            @endforeach


    </div>

    <div>
        {{ $posts->onEachSide(1)->links() }}
    </div>
        
   

  
   
    
</x-layout>
