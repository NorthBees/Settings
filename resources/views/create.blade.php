<x-app-layout>
    <x-slot name="breadcrumbs">
        <ul>
            <li><a href="{{ route('admin.settings.index') }}">Settings</a></li>
            <li><a href="{{ route('admin.settings.create') }}">Create</a></li>
        </ul>
    </x-slot>

    <livewire:settings::settings-create></livewire:settings::settings-create>

</x-app-layout>
