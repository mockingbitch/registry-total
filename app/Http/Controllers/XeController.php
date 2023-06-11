<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\XeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Xe;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Exports\XeExport;

class XeController extends Controller
{
    private $breadcrumb = 'Xe';

    /**
     * @return View
     */
    public function list() : View
    {
        $listXe = Xe::all();
        
        return view('dashboard.xe.danhsach', [
            'listXe'        => $listXe,
            'breadcrumb'    => $this->breadcrumb
        ]);
    }

    /**
     * @param Request $request
     * 
     * @return RedirectResponse
     */
    public function import(Request $request) : RedirectResponse
    {
        try {
            Excel::import(new XeImport, $request->file('file'));

            return redirect()->route('xe.list')->with('msg', 'Nhập thành công');
        } catch (\Throwable $th) {
            return redirect()->route('xe.list')->with('errMsg', 'Không thể nhập file, vui lòng thử lại');
        }
    }

    /**
     * @return void
     */
    public function export()
    {
        return Excel::download(new XeExport, 'xe.xlsx'); //download file export
        // return Excel::store(new XxxExport, 'xe.xlsx', 'disk-name'); //lưu file export trên ổ cứng
    }

    /**
     * @return View
     */
    public function viewCreate() : View
    {
        return view('dashboard.xe.themmoi', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }

    /**
     * @param Request $request
     * 
     * @return RedirectResponse
     */
    public function create(Request $request) : RedirectResponse
    {
        $data = [
            'tenChuXe'      => $request->tenChuXe,
            'giayChungNhan' => $request->giayChungNhan,
            'bienSo'        => $request->bienSo,
            'noiDangKy'     => $request->noiDangKy,
            'hangSX'        => $request->hangSX,
            'dongXe'        => $request->dongXe,
            'mucDichSuDung' => $request->mucDichSuDung,
            'trangThai'     => $request->trangThai
        ];

        $xe = Xe::create($data);

        return redirect()->route('xe.create')->with('msg', 'Thêm mới thành công');
    }

    /**
     * @param integer $id
     * 
     * @return RedirectResponse|View
     */
    public function viewUpdate(int $id) : RedirectResponse|View
    {
        $xe = Xe::find($id);

        if (! $xe) {
            return redirect()->route('xe.list')->with('errMsg', 'Không tìm thấy xe');
        }

        return view('dashboard.xe.chitiet', [
            'xe'            => $xe,
            'breadcrumb'    => $this->breadcrumb
        ]);
    }

    /**
     * @param integer $id
     * @param Request $request
     * 
     * @return RedirectResponse|View
     */
    public function update(int $id, Request $request) : RedirectResponse|View
    {
        $xe = Xe::find($id);

        if (! $xe) {
            return redirect()->route('xe.list')->with('errMsg', 'Không tìm thấy xe');
        }

        $data = [
            'tenChuXe'      => $request->tenChuXe,
            'giayChungNhan' => $request->giayChungNhan,
            'bienSo'        => $request->bienSo,
            'noiDangKy'     => $request->noiDangKy,
            'hangSX'        => $request->hangSX,
            'dongXe'        => $request->dongXe,
            'mucDichSuDung' => $request->mucDichSuDung,
            'trangThai'     => $request->trangThai
        ];

        $xe->update($data);

        return redirect()->route('xe.update', ['id' => $id])->with('msg', 'Cập nhật thành công');
    }

    /**
     * @param integer $id
     * 
     * @return RedirectResponse
     */
    public function destroy(int $id) : RedirectResponse
    {
        $xe = Xe::find($id);

        if (! $xe) {
            return redirect()->route('xe.list')->with('errMsg', 'Không tìm thấy xe');
        }

        $xe->delete();

        return redirect()->route('xe.list')->with('msg', 'Xoá thành công');
    }
}
