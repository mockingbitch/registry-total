<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\TrungTam;
use App\Http\Requests\UserRequest;

class NguoiDungController extends Controller
{
    private $breadcrumb = 'NguoiDung';

    /**
     * @return View
     */
    public function list() : View
    {
        $listUser = User::all();

        return view('dashboard.user.danhsach', [
            'breadcrumb'    => $this->breadcrumb,
            'listUser'      => $listUser
        ]);
    }

    /**
     * @return View
     */
    public function viewCreate() : View
    {
        $listTrungTam = TrungTam::all();

        return view('dashboard.user.themmoi', [
            'breadcrumb'    => $this->breadcrumb,
            'listTrungTam'  => $listTrungTam
        ]);
    }

    /**
     * @param UserRequest $request
     * 
     * @return RedirectResponse
     */
    public function create(UserRequest $request) : RedirectResponse
    {
        $data = [
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => $request->password,
            'tinhThanh'     => $request->tinhThanh,
            'thuongTru'     => $request->thuongTru,
            'cccd'          => $request->cccd,
            'trungtam_id'   => $request->trungtam_id,
            'role'          => $request->role,
            'trangThai'     => $request->trangThai
        ];

        $user = User::create($data);

        return redirect()->route('user.create')->with('msg', 'Thêm mới thành công');
    }

    /**
     * @param integer $id
     * 
     * @return RedirectResponse|View
     */
    public function viewUpdate(int $id) : RedirectResponse|View
    {
        $listTrungTam = TrungTam::all();
        $user = User::find($id);

        if (! $user) {
            return redirect()->route('user.list')->with('errMsg', 'Không tìm thấy tài khoản');
        }

        return view('dashboard.user.chitiet', [
            'breadcrumb'    => $this->breadcrumb,
            'user'          => $user,
            'listTrungTam'  => $listTrungTam
        ]);
    }

    /**
     * @param integer $id
     * @param UserRequest $request
     * 
     * @return RedirectResponse
     */
    public function update(int $id, UserRequest $request) : RedirectResponse
    {
        $user = User::find($id);

        if (! $user) {
            return redirect()->route('user.list')->with('errMsg', 'Không tìm thấy tài khoản');
        }

        $data = [
            'name'          => $request->name,
            'email'         => $request->email,
            'tinhThanh'     => $request->tinhThanh,
            'thuongTru'     => $request->thuongTru,
            'cccd'          => $request->cccd,
            'trungtam_id'   => $request->trungtam_id,
            'role'          => $request->role,
            'trangThai'     => $request->trangThai
        ];

        $user->update($data);

        return redirect()->route('user.update', ['id' => $id])->with('msg', 'Cập nhật thành công');
    }

    /**
     * @param integer $id
     * 
     * @return RedirectResponse
     */
    public function destroy(int $id) : RedirectResponse
    {
        $user = User::find($id);

        if (! $user) {
            return redirect()->route('user.list')->with('errMsg', 'Không tìm thấy tài khoản');
        }

        $user->delete();

        return redirect()->route('user.list')->with('msg', 'Xoá thành công');
    }
}
