<x-app-layout>
    <x-slot name="breadcrumbs">
        <ul>
            <li><a href="{{ route('admin.settings.index') }}">Settings</a></li>
            <li><a href="{{ route('admin.settings.edit', $setting->id) }}">{{ $setting->key }}</a></li>
        </ul>
    </x-slot>

    <livewire:settings::setting-update :setting="$setting"></livewire:settings::setting-update>

</x-app-layout>
