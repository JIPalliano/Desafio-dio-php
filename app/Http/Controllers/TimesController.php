<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimesController extends Controller
{
    public function getAll() {

        $times = $this->getTimes();

        return response()->json($times);

    }

    public function getById($id) {

        $time = null;

        foreach($this->getTimes() as $_time) {
            if ($_time['id'] == $id)
                $time = $_time;
        }

        return $time ? response()->json($time) : abort(404);

    }

    public function getTimesByCity($time) {

        $times = [];

        foreach($this->getTimes() as $_time) {
            if ($_time['name'] == $time)
                $times[] = $_time;
        }

        return response()->json($times);

    }

    public function store(Request $request) {

        $request->validate([
            'id' => 'numeric',
            'name' => 'required'
        ]);

        return response()->json($request->all());

    }

    protected function getTimes() {

        return [
            [
                'id' => 1, 'name' => 'Palmeiras', 'city' => 'São Paulo'
            ],
            [
                'id' => 2, 'name' => 'Flamengo', 'city' => 'Rio de Janeiro'
            ],
            [
                'id' => 3, 'name' => 'Vasco', 'city' => 'Rio de Janeiro'
            ],
            [
                'id' => 4, 'name' => 'Grêmio', 'city' => 'Rio Grande do Sul'
            ],
            [
                'id' => 5, 'name' => 'Inter', 'city' => 'Rio Grande do Sul'
            ],

        ];

    }
}
