<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Article | Reporter'}}
    </x-slot>



    <x-user.partials.navbar />



    <h1>Total {{ $total_tag }} Tags found </h1>
    <hr>

    @foreach($blogs as $blog)
    <h1>{{ $blog->title }}</h1>

    @endforeach

    {!! $blogs->links() !!}

    <x-user.partials.footer />

</x-user.master>