<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        $isLogin = (bool)app()->get('session')->get('username');
        if (!$isLogin) {
            return redirect('/login');
        }
        $config = json_decode(file_get_contents(base_path('config.json')), true);
        return view('index', compact('config'));
    }

    public function getLogin()
    {
        return view('login');
    }
    
    public function postLogin(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        if (empty($username) || empty($password)) {
            return redirect('/login?status=fail');
        }
        $config = $this->getConfig();
        if ($username === $config['username'] && $password === $config['password']) {
            app()->get('session')->put('username', $username);
            return redirect('/');
        }
        return redirect('/login?status=fail');
    }

    public function getLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }

    public function postConfig(Request $request)
    {
        $phone = $request->get('phone');
        if ($phone) {
            $config = $this->getConfig();
            $config['phone'] = $phone;
            $this->setConfig($config);

            $server = Device::query()->where('type', 'server')->first();
            if (!empty($server)) {
                $status = $server->status;
                $status['phone'] = $phone;
                $server->status = $status;
                $server->save();
            }
        }
        return redirect('/');
    }

    public function postUser(Request $request)
    {
        $oldUsername = $request->get('old_username');
        $oldPassword = $request->get('old_password');
        $newUsername = $request->get('new_username');
        $newPassword = $request->get('new_password');
        if (empty($oldUsername) || empty($oldPassword) || empty($newUsername) || empty($newPassword)) {
            return redirect('/?user=fail');
        }
        $config = $this->getConfig();
        if ($oldUsername === $config['username'] && $oldPassword === $config['password']) {
            $config['username'] = $newUsername;
            $config['password'] = $newPassword;
            $this->setConfig($config);
        } else {
            return redirect('/?user=fail');
        }
        return redirect('/?user=ok');
    }


    protected function getConfig()
    {
        return json_decode(file_get_contents(base_path('config.json')), true);
    }

    protected function setConfig(array $config)
    {
        $json = json_encode($config, JSON_PRETTY_PRINT);
        file_put_contents(base_path('config.json'), $json);
    }
}
