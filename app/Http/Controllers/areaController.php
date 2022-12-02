<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class areaController extends Controller
{
    public function index() {
        $datas = DB::select('select * from area');

        return view('level.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('area.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_area' => 'required',
            'area_grade' => 'required',
            'area_location' => 'required',
            'area_name' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO area(id_area, area_grade, area_location, area_name) VALUES (:id_area, :area_grade, :area_location, :area_name)',
        [
            'id_area' => $request->id_area,
            'area_grade' => $request->area_grade,
            'area_location' => $request->area_location,
            'area_name' => $request->area_name,        
        ]
        );


        return redirect()->route('level.index')->with('success', 'Area Data Is Logged');
    }

    public function edit($id) {
        $data = DB::table('area')->where('id_area', $id)->first();
        return view('area.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_area' => 'required',
            'area_grade' => 'required',
            'area_location' => 'required',
            'area_name' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE area SET id_area = :id_area, area_grade = :area_grade, area_location = :area_location, area_name = :area_name WHERE id_area = :id',
        [
            'id' => $id,
            'id_area' => $request->id_area,
            'area_grade' => $request->area_grade,
            'area_location' => $request->area_location,
            'area_name' => $request->area_name, 
        ]
        );


        return redirect()->route('level.index')->with('success', 'Area Data Has Been Changed');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM area WHERE id_area = :id_area', ['id_area' => $id]);

        return redirect()->route('level.index')->with('success', 'Area Data Has Been Removed');
    }
}
