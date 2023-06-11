<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrungTam;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\TrungTamRequest;

class TrungTamController extends Controller
{
    private $breadcrumb = 'TrungTam';

    /**
     * @param Request $request
     * 
     * @return View
     */
    public function list(Request $request) : View
    {
        $listTrungTam = TrungTam::all();
        
        return view('dashboard.trungtam.danhsach', [
            'listTrungTam'  => $listTrungTam,
            'breadcrumb'    => $this->breadcrumb
        ]);
    }

    /**
     * @return View
     */
    public function viewCreate() : View
    {
        return view('dashboard.trungtam.themmoi', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }

    /**
     * @param TrungTamRequest $request
     * 
     * @return RedirectResponse
     */
    public function create(TrungTamRequest $request) : RedirectResponse
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

    /**
     * @param integer $id
     * 
     * @return RedirectResponse|View
     */
    public function viewUpdate(int $id) : RedirectResponse|View
    {
        $trungTam = TrungTam::find($id);

        if (! $trungTam) {
            return redirect()->route('trung-tam.list')->with('errMsg', 'Không tìm thấy trung tâm');
        }

        return view('dashboard.trungtam.chitiet', [
            'trungTam'      => $trungTam,
            'breadcrumb'    => $this->breadcrumb
        ]);
    }

    /**
     * @param integer $id
     * @param TrungTamRequest $request
     * 
     * @return RedirectResponse|View
     */
    public function update(int $id, TrungTamRequest $request) : RedirectResponse|View
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

        return redirect()->route('trung-tam.update', ['id' => $id])->with('msg', 'Cập nhật thành công');
    }

    /**
     * @param integer $id
     * 
     * @return RedirectResponse
     */
    public function destroy(int $id) : RedirectResponse
    {
        $trungTam = TrungTam::find($id);

        if (! $trungTam) {
            return redirect()->route('trung-tam.list')->with('errMsg', 'Không tìm thấy trung tâm');
        }

        $trungTam->delete();

        return redirect()->route('trung-tam.list')->with('msg', 'Xoá thành công');
    }
}

