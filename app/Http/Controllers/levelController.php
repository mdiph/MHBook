<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\level;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class levelController extends Controller
{
    public function index() {
        $datas = DB::select('select * from level');
        $areas = DB::select('select * from area');
        $monsters = DB::select('select * from monster');

        return view('level.index')
            ->with('datas', $datas)
            ->with('areas', $areas)
            ->with('monsters', $monsters);

    }

    public function create() {
        return view('level.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_level' => 'required',
            'level_grade' => 'required',
            'mission_level' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO level(id_level, level_grade, mission_level) VALUES (:id_level, :level_grade, :mission_level)',
        [
            'id_level' => $request->id_level,
            'level_grade' => $request->level_grade,
            'mission_level' => $request->mission_level,            
        ]
        );


        return redirect()->route('level.index')->with('success', 'Level Data Is Logged');
    }

    public function edit($id) {
        $data = DB::table('level')->where('id_level', $id)->first();
        return view('level.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_level' => 'required',
            'level_grade' => 'required',
            'mission_level' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE level SET id_level = :id_level, level_grade = :level_grade, mission_level = :mission_level WHERE id_level = :id',
        [
            'id' => $id,
            'id_level' => $request->id_level,
            'level_grade' => $request->level_grade,
            'mission_level' => $request->mission_level,  
        ]
        );


        return redirect()->route('level.index')->with('success', 'Level Data Has Been Changed');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM level WHERE id_level = :id_level', ['id_level' => $id]);

        return redirect()->route('level.index')->with('success', 'Level Data Has Been Removed');
    }
}
