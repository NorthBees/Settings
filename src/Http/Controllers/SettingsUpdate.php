<?php

namespace NorthBees\Settings\Http\Controllers;

use App\View\Components\AppLayout;
use Livewire\Component;
use NorthBees\Settings\Http\Resources\SettingResource;
use NorthBees\Settings\Models\Setting;

class SettingsUpdate extends Component
{

    public $id;

    public $key;

    public $value;

    public function mount()
    {
        $setting = (request()->setting);
        $this->id = $setting->id;
        $this->key = $setting->key;
        $this->value = $setting->value;
    }

    public function render()
    {
        return view('settings::settings-update');
    }

    public function rules()
    {
        return [
            'id'    => 'required|exists:settings,id',
            'key'   => 'required|unique:settings,key,' . $this->id . ',id',
            'value' => 'nullable',
        ];
    }

    public function submit()
    {

        $this->validate();
        $setting = Setting::find($this->id);
        $setting->fill(
            [
                'key'   => $this->key,
                'value' => $this->value,
            ]
        );
        $setting->save();
        cache()->forget('setting_' . $setting->key);

        $this->dispatch('banner-message', style: 'success',
            message : 'Setting updated!'
        );
    }
}
