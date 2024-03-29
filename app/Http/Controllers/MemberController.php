<?php

namespace App\Http\Controllers;

use App\Models\MsMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MsMember::orderBy('name', 'asc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return view('member.action')->with('data', $data);
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valiasi = Validator::make($request->all(), [
            'name' => 'required',
            'nrp' => 'required|numeric|unique:ms_member',
            'email' => 'required|email|unique:ms_member',
            'noTelp' => 'required|numeric',
            'departemen' => 'required',
            'title' => 'required',
            'role' => 'required',
            'gender' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'nrp.required' => 'Nama wajib diisi',
            'nrp.numeric' => 'NRP harus berupa angka',
            'nrp.unique' => 'NRP sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Format email wajib benar',
            'noTelp.required' => 'Nomor telepon wajib diisi',
            'noTelp.numeric' => 'Nomor telepon harus berupa angka',
            'departemen.required' => 'Wajib memilih Departemen',
            'title.required' => 'Wajib memilih Title',
            'role.required' => 'Wajib memilih Role',
            'gender.required' => 'Wajib memilih Gender',
        ]);

        if ($valiasi->fails()) {
            return response()->json(['errors' => $valiasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'nrp' => $request->nrp,
                'email' => $request->email,
                'noTelp' => $request->noTelp,
                'departemen' => $request->departemen,
                'title' => $request->title,
                'role' => $request->role,
                'gender' => $request->gender
            ];
            MsMember::create($data);
            return response()->json(['success' => "Berhasil menyimpan data"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MsMember::where("id", $id)->first();
        return response()->json(['result' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valiasi = Validator::make($request->all(), [
            'name' => 'required',
            'nrp' => 'required|numeric',
            'email' => 'required|email',
            'noTelp' => 'required|numeric',
            'departemen' => 'required',
            'title' => 'required',
            'role' => 'required',
            'gender' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
            'nrp.required' => 'Nama wajib diisi',
            'nrp.numeric' => 'NRP harus berupa angka',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email wajib benar',
            'noTelp.required' => 'Nomor telepon wajib diisi',
            'noTelp.numeric' => 'Nomor telepon harus berupa angka',
            'departemen.required' => 'Wajib memilih Departemen',
            'title.required' => 'Wajib memilih Title',
            'role.required' => 'Wajib memilih Role',
            'gender.required' => 'Wajib memilih Gender',
        ]);

        if ($valiasi->fails()) {
            return response()->json(['errors' => $valiasi->errors()]);
        } else {
            $data = [
                'name' => $request->name,
                'nrp' => $request->nrp,
                'email' => $request->email,
                'noTelp' => $request->noTelp,
                'departemen' => $request->departemen,
                'title' => $request->title,
                'role' => $request->role,
                'gender' => $request->gender
            ];
            MsMember::where('id', $id)->update($data);
            return response()->json(['success' => "Berhasil update data"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MsMember::where("id", $id)->delete();
    }
}
