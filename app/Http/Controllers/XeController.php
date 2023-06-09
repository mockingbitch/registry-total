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
        // try {
            Excel::import(new XeImport, $request->file('file'));

            return redirect()->route('xe.list')->with('msg', 'Nhập thành công');
        // } catch (\Throwable $th) {
        //     return redirect()->route('xe.list')->with('errMsg', 'Không thể nhập file, vui lòng thử lại');
        // }
    }

    public function export()
    {
        return Excel::download(new XeExport, 'xe.xlsx'); //download file export
        // return Excel::store(new XxxExport, 'xe.xlsx', 'disk-name'); //lưu file export trên ổ cứng
    }

    public function viewCreate()
    {
        return view('dashboard.xe.themmoi', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }

    public function create(Request $request)
    {

    }

    public function viewUpdate(int $id)
    {

    }

    public function update(int $id, Request $request)
    {

    }

    public function delete(int $id)
    {

    }
}
