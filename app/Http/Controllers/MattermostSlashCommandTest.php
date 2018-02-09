<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MattermostSlashCommandTest extends Controller
{
    function test(Request $request)
    {
//        $this->validate($request, [
//            'channel_id' => 'required',
//            'channel_name' => 'required',
//            'command' => 'required',
//            'team_domain' => 'required',
//            'team_id' => 'required',
//            'text' => 'required',
//            'token' => 'required',
//            'user_id' => 'required',
//            'user_name' => 'required',
//        ]);

        $res_text = 'You tried using a slash command!';

        return [
            'response_type' => 'in_channel',
            'text' => $res_text,
        ];
    }
}
