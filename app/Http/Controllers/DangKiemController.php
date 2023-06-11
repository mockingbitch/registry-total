<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\DangKiem;
use App\Models\Xe;
use Carbon\Carbon;

class DangKiemController extends Controller
{
    private $breadcrumb = 'DangKiem';

    /**
     * @return View
     */
    public function list(Request $request) : View
    {
        $option = $request->option ?? '';

        if ($option == 'all') {
            $listDangKiem = DangKiem::all();
        } else if ($option == 'outdate') {
            $listDangKiem = DangKiem::where('ngayHetHan', '<', Carbon::now())->get();
        } else if ($option == 'nearly-outdate') {
            $getAll = DangKiem::all();
            $nextMonth = strtotime( new Carbon('first day of next month'));
            $listDangKiem = [];
            foreach ($getAll as $item) {
                if ($nextMonth > strtotime($item->ngayHetHan)) {
                    $listDangKiem[] = $item;
                }
            }
        } else if ($option == 'indate') {
            $listDangKiem = DangKiem::where('ngayHetHan', '>', Carbon::now())->get();
        }
        else {
            $listDangKiem = DangKiem::all();
        }

        return view('dashboard.dangkiem.danhsach', [
            'breadcrumb'    => $this->breadcrumb,
            'listDangKiem'  => $listDangKiem,
            'option'        => $request->option ?? ''
        ]);
    }

    /**
     * @return View
     */
    public function viewCreate() : View
    {
        $listXe = Xe::all();

        return view('dashboard.dangkiem.themmoi', [
            'breadcrumb'    => $this->breadcrumb,
            'listXe'        => $listXe
        ]);
    }

    /**
     * @return RedirectResponse
     */
    public function create(Request $request) : RedirectResponse
    {
        $user = auth()->guard('user')->user();

        $data = [
            'xe_id'         => $request->xe_id,
            'maSoCap'       => $request->maSoCap,
            'ngayCap'       => $request->ngayCap,
            'ngayHetHan'    => $request->ngayHetHan,
            'trungtam_id'   => $user->trungtam_id,
            'trangThai'     => $request->trangThai
        ];

        $dangKiem = DangKiem::create($data);

        return redirect()->route('dangkiem.create')->with('msg', 'Thêm mới thành công');
    }

    /**
     * @param integer $id
     * 
     * @return RedirectResponse|View
     */
    public function viewUpdate(int $id) : RedirectResponse|View
    {
        $dangKiem = DangKiem::find($id);
        $listXe = Xe::all();

        if (! $dangKiem) {
            return redirect()->route('dangkiem.list')->with('errMsg', 'Không tìm thầy đăng kiểm');
        }

        return view('dashboard.dangkiem.chitiet', [
            'breadcrumb'    => $this->breadcrumb,
            'dangKiem'      => $dangKiem,
            'listXe'        => $listXe
        ]);
    }

    /**
     * @param integer $id
     * @param Request $request
     * 
     * @return RedirectResponse
     */
    public function update(int $id, Request $request) : RedirectResponse
    {
        $dangKiem = DangKiem::find($id);
        $user = auth()->guard('user')->user();

        if (! $dangKiem) {
            return redirect()->route('dangkiem.list')->with('errMsg', 'Không tìm thầy đăng kiểm');
        }

        $data = [
            'xe_id'         => $request->xe_id,
            'maSoCap'       => $request->maSoCap,
            'ngayCap'       => $request->ngayCap,
            'ngayHetHan'    => $request->ngayHetHan,
            'trungtam_id'   => $user->trungtam_id,
            'trangThai'     => $request->trangThai
        ];

        $dangKiem->update($data);

        return redirect()->route('dangkiem.update', ['id' => $id])->with('msg', 'Cập nhật thành công');

    }

        /**
     * @param integer $id
     * 
     * @return RedirectResponse
     */
    public function destroy(int $id) : RedirectResponse
    {
        $dangKiem = DangKiem::find($id);

        if (! $dangKiem) {
            return redirect()->route('dangkiem.list')->with('errMsg', 'Không tìm thấy đăng kiểm');
        }

        $dangKiem->delete();

        return redirect()->route('dangkiem.list')->with('msg', 'Xoá thành công');
    }
}
