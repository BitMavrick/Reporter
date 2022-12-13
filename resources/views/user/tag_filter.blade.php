<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Article | Reporter'}}
    </x-slot>



    <x-user.partials.navbar />

    <h1>This is the article filter page</h1>

    <x-user.partials.footer />

</x-user.master>