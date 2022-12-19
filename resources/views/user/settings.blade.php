<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Settings | Reporter'}}
    </x-slot>
    <x-user.partials.navbar />

    <h1>This is the settings page</h1>

    <x-user.partials.footer />

</x-user.master>