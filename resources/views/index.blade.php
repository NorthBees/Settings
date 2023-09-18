<x-app-layout>
    <x-slot name="breadcrumbs">
        <ul>
            <li><a href="{{ route('admin.settings.index') }}">Settings</a></li>
        </ul>
    </x-slot>


    <livewire:kormak-table
        :model="$model"
        :route="$route"
        :headings="['id'=>'#', 'key'=>'Key', 'value'=>'Value']"
        :rows="$settings"
        :actions="['edit'=>'admin.settings.edit', 'delete'=>'admin.settings.destroy', 'show'=>'admin.settings.show']"
    />



</x-app-layout>
