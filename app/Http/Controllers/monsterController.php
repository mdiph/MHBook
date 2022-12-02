<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class monsterController extends Controller
{
    public function index() {
        $datas = DB::select('select * from monster');

        return view('level.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('monster.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_area' => 'required',
            'id_level' => 'required',
            'id_monster' => 'required',
            'monster_attribute' => 'required',
            'monster_name' => 'required',
            'monster_weakness' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO monster(id_area, id_level, id_monster, monster_attribute, monster_name, monster_weakness) VALUES (:id_area, :id_level, :id_monster, :monster_attribute,:monster_name, :monster_weakness)',
        [
            'id_area' => $request->id_area,
            'id_level' => $request->id_level,
            'id_monster' => $request->id_monster,
            'monster_attribute' => $request->monster_attribute,
            'monster_name' => $request->monster_name,
            'monster_weakness' => $request->monster_weakness,        
        ]
        );


        return redirect()->route('level.index')->with('success', 'Monster Data Is Logged');
    }

    public function edit($id) {
        $data = DB::table('monster')->where('id_monster', $id)->first();
        return view('monster.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_area' => 'required',
            'id_level' => 'required',
            'id_monster' => 'required',
            'monster_attribute' => 'required',
            'monster_name' => 'required',
            'monster_weakness' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE monster SET id_area = :id_area, id_level = :id_level, id_monster = :id_monster, monster_attribute = :monster_attribute, monster_name = :monster_name, monster_weakness = :monster_weakness WHERE id_area = :id',
        [
            'id' => $id,
            'id_area' => $request->id_area,
            'id_level' => $request->id_level,
            'id_monster' => $request->id_monster,
            'monster_attribute' => $request->monster_attribute,
            'monster_name' => $request->monster_name,
            'monster_weakness' => $request->monster_weakness, 
        ]
        );


        return redirect()->route('level.index')->with('success', 'Monster Data Has Been Changed');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM monster WHERE id_monster = :id_monster', ['id_monster' => $id]);

        return redirect()->route('level.index')->with('success', 'Monster Data Has Been Removed');
    }
}
