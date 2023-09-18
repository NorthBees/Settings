<?php

namespace NorthBees\Settings\Http\Controllers;

use App\AdminNavigation;
use App\Http\Controllers\Controller;
use NorthBees\Settings\Http\Requests\SettingCreateRequest;
use NorthBees\Settings\Http\Requests\SettingIndexRequest;
use NorthBees\Settings\Http\Requests\SettingUpdateRequest;
use NorthBees\Settings\Http\Resources\SettingResource;
use NorthBees\Settings\Models\Setting;
use Illuminate\Support\Arr;

class SettingController extends Controller
{
    public function index(SettingIndexRequest $request)
    {
        $settings = Setting::paginate();

        return view('settings::index', [
            'model' => Setting::class,
            'route' => 'admin.settings.index',
            'settings' =>  SettingResource::collection($settings)->toArray($request),
        ]);
    }

    public function show(Setting $setting)
    {
        return SettingResource::make($setting);
    }

    public function edit(Setting $setting)
    {
        return view('settings::edit', [
            'setting' =>  SettingResource::make($setting),
        ]);
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $data = $request->validated();
        $setting->fill($data);
        $setting->save();
        cache()->forget('setting_' . $setting->key);
        return SettingResource::make($setting);
    }

    public function store(SettingCreateRequest $request)
    {
        $data  = $request->validated();
        $setting = Setting::firstOrCreate(
            [
                'key' => Arr::get($data, 'key')
            ],
            $data
        );

        $setting->fill($data);
        $setting->save();

        return SettingResource::make($setting);
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();

        return $this->redirect('admin.settings.index')->with( 'message', 'Setting deleted.');
    }
}
