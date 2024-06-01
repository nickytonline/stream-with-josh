<?php

use function Livewire\Volt\{state, with};

state([
    'name' => '',
    'species' => '',
]);

with(['pets' => Auth::user()->pets()->get()]);

$addPet = function () {
    Auth::user()
        ->pets()
        ->create([
            'name' => $this->name,
            'species' => $this->species,
        ]);
};

?>

<div>
    <form wire:submit="addPet" class="grid gap-4">
        <label class="grid gap-2"><span>Name</span>
            <input wire:model='name' class="w-fit">
        </label>
        <label class="grid gap-2"><span>Species</span>
            <input wire:model='species' class="w-fit">
        </label>
        <x-primary-button type="submit" class="w-fit">Add Pet</x-primary-button>
    </form>

    <ul>
        @foreach ($pets as $pet)
            <li wire:key='{{ $pet->id }}'>{{ $pet->name }}, {{ $pet->species }}</li>
        @endforeach
    </ul>
</div>
