<?php

namespace NorthBees\Settings\Http\Controllers;

use Livewire\Component;
use NorthBees\Settings\Models\Setting;

class SettingsCreate extends Component
{
    public $key;

    public $value;

    public function render()
    {
        return view('settings::settings-create');
    }

    public function rules()
    {
        return [
            'key'   => 'required|unique:settings,key',
            'value' => 'nullable',
        ];
    }

    public function submit()
    {
        $this->validate();
        $setting = Setting::firstOrCreate(['key' => $this->key], ['value' => $this->value]);
        $setting->save();
        $this->dispatch('banner-message', style: 'success',
            message : 'Setting created!'
        );
        return redirect()->route('admin.settings.index');

    }
}
