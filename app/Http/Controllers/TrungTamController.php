<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrungTam;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TrungTamController extends Controller
{
    /**
     * @param Request $request
     * 
     * @return View
     */
    public function list(Request $request) : View
    {
        $listTrungTam = TrungTam::all();
        
        return view('dashboard.trungtam.danhsach', [
            'listTrungTam' => $listTrungTam
        ]);
    }

    /**
     * @return View
     */
    public function viewCreate() : View
    {
        return view('dashboard.trungtam.themmoi');
    }

    public function create(Request $request)
    {
        $data = [
            'tenTrungTam'   => $request->tenTrungTam,
            'tinhThanh'     => $request->tinhThanh,
            'diaChi'        => $request->diaChi,
            'trangThai'     => $request->trangThai
        ];

        $trungTam = TrungTam::create($data);

        return redirect()->route('trung-tam.create')->with('msg', 'Thêm mới thành công');
    }

    public function viewUpdate($id)
    {
        $trungTam = TrungTam::find($id);

        if (! $trungTam) {
            return redirect()->route('trung-tam.list')->with('errMsg', 'Không tìm thấy trung tâm');
        }

        return view('dashboard.trungtam.chitiet', [
            'trungTam' => $trungTam
        ]);
    }

    public function update($id, Request $request)
    {
        $trungTam = TrungTam::find($id);

        if (! $trungTam) {
            return redirect()->route('trung-tam.list')->with('errMsg', 'Không tìm thấy trung tâm');
        }

        $data = [
            'tenTrungTam'   => $request->tenTrungTam,
            'tinhThanh'     => $request->tinhThanh,
            'diaChi'        => $request->diaChi,
            'trangThai'     => $request->trangThai
        ];

        $trungTam->update($data);

        return redirect()->route('trung-tam.chitiet')->with('msg', 'Cập nhật thành công');
    }

    /**
     * @param integer $id
     * 
     * @return void
     */
    public function destroy(int $id)
    {
        $trungTam = TrungTam::find($id);

        if (! $trungTam) {
            return redirect()->route('trung-tam.list')->with('errMsg', 'Không tìm thấy trung tâm');
        }

        $trungTam->delete();

        return redirect()->route('trung-tam.list')->with('msg', 'Xoá thành công');
    }
}
