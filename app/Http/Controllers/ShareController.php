<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jorenvh\Share\Share;


class ShareController extends Controller
{
    public function share()
    {
        $data=[
'id' =>1,
'title'=>'the first title',
'description' => 'this post of social',
'image' => 'ragil.jpg'
        ];

        $Buttons=\Share::page(
            url('/post'),
            'here is text'
        )
        ->facebook()
        ->twiter()
        ->linkedin()
        ->telegram();
    }
}
