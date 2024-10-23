<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use DataTables;

class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('auth');
     }

     public function index(Request $request)
     {
         $title = 'Navigation';
         $data = Nav::all(); // Fetch all navbar data from the database
        // dd($data);
         if ($request->ajax()) {
             return datatables()->of($data)
                 ->addColumn('name', function ($row) {
                     return '<span class="editSpan name">' . $row->name . '</span>
                             <input type="text" class="editInput name form-control" name="name"
                             value="' . $row->name . '" style="display:none;">
                             <div class="invalid-feedback" id="profile' . $row->id . '-error"></div>';
                 })
                 ->addColumn('action', function ($row) {
                     return '<button class="btn text-warning btn-sm edit_inline"><i class="fa fa-edit"></i></button>
                             <button class="btn text-black btnSave btn-sm" style="display:none"><i class="fa fa-check"></i></button>
                             <button class="btn text-danger editCancel btn-sm" style="display:none"><i class="fa fa-times"></i></button>
                             <button class="btn btn-danger btn-sm" onclick="deleteData(' . $row->id . ')"><i class="fa fa-trash"></i></button>';
                 })
                 ->editColumn('DT_RowId', function ($row) {
                     return $row->id;
                 })
                 ->rawColumns(['action', 'name'])
                 ->addIndexColumn()
                 ->make(true);
         }

         return view('pages.nav.index', compact('title','data'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNavbarData(Request $request)
    {
        $data = Nav::select('navs.id','navs.name AS name_navs', 'menus.name AS menu_name', 'sub_menus.name AS sub_menu_name')
                    ->leftJoin('menus', 'menus.id', '=', 'navs.menus_id')
                    ->Join('sub_menus', 'sub_menus.menus_id', '=', 'menus.id')
                    ->get();
        dd($data);

        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('name', function ($row) {
                    return '<span class="editSpan name">' . $row->name_navs . '</span>
                            <input type="text" class="editInput name form-control" name="name"
                            value="' . $row->name_navs . '" style="display:none;">
                            <div class="invalid-feedback" id="profile' . $row->id . '-error"></div>';
                })
                ->addColumn('menu', function ($row) {
                    $menu = Menu::all();
                    $menu_select = '<span class="editSpan name">' . $row->menu_name . '</span>
                    <select class="editInput form-control" name="menu" id="menu" style="display:none">
                        <option disabled value="">Select Menu</option>';
                        foreach ($menu as $m) {
                        $selected = '';

                        if($m->name == $row->menu_name){
                            $selected = 'selected';
                        }
                       $menu_select .= '<option '.$selected.' value="'.$m->id.'">'.$m->name.'</option>';
                    }
                    $menu_select .= '</select>';
                    return $menu_select;
                })
                ->addColumn('submenu', function ($row) {

                    $submenu = SubMenu::all();
                    $submenu_select = '<span class="editSpan sub_menu_name">' . $row->sub_menu_name . '</span>
                    <select class="editInput form-control" name="sub_menu" id="menu" style="display:none">
                        <option disabled value="">Select Menu</option>';
                        foreach ($submenu as $sub) {
                        $selected = '';

                        if($sub->name == $row->sub_menu_name){
                            $selected = 'selected';
                        }

                       $submenu_select .= '<option '.$selected.' value="'.$sub->id.'">'.$sub->name.'</option>';
                    }
                    $submenu_select .= '</select>';
                    return $submenu_select;
                })
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-warning btn-sm edit_inline"><i class="bi bi-pencil"></i></button>
                            <button class="btn text-success btnSave btn-sm" style="display:none"><i class="bi bi-check-lg"></i></button>
                            <button class="btn text-danger editCancel btn-sm" style="display:none"><i class="bi bi-x-lg"></i></button>
                            <button class="btn btn-danger btnDelete btn-sm" onclick="deleteData(' . $row->id . ')"><i class="bi bi-trash"></i></button>';
                })
                ->editColumn('DT_RowId', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['action', 'name','menu','submenu'])
                ->addIndexColumn()
                ->make(true);
        }

        return $data;
    }


    public function getMenuDataSelect(Request $request){
        $data = Menu::all();
        return response()->json($data);

    }

    public function getMenuData(Request $request)
    {
        $data = Menu::all(); // Fetch Menu data

        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('name', function ($row) {
                    return '<span class="editSpan name">' . $row->name . '</span>
                            <input type="text" class="editInput name form-control" name="name"
                            value="' . $row->name . '" style="display:none;">
                            <div class="invalid-feedback" id="profile' . $row->id . '-error"></div>';
                })

                ->addColumn('action', function ($row) {

                    return '<button class="btn btn-warning btn-sm edit_inline"><i class="bi bi-pencil"></i></button>
                    <button class="btn text-success btnSave btn-sm" style="display:none"><i class="bi bi-check-lg"></i></button>
                    <button class="btn text-danger editCancel btn-sm" style="display:none"><i class="bi bi-x-lg"></i></button>
                    <button class="btn btn-danger btnDelete btn-sm" onclick="deleteData(' . $row->id . ')"><i class="bi bi-trash"></i></button>';

                })
                ->editColumn('DT_RowId', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['action', 'name'])
                ->addIndexColumn()
                ->make(true);
        }

        return $data;
    }

    public function getSubmenuData(Request $request)
    {
        $data = Submenu::select('sub_menus.id','sub_menus.name AS name_sub_menu','menus.name AS name_menu')->leftJoin('menus', 'menus.id', '=', 'sub_menus.menus_id')->get();

        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('menu', function ($row) {
                    $menu = Menu::all();
                    $menu_select = '<span class="editSpan name">' . $row->name_menu . '</span>
                    <select class="editInput form-control" name="menu" id="menu" style="display:none">
                        <option value="">Select Menu</option>';
                        foreach ($menu as $m) {
                        $selected = '';

                        if($m->name == $row->name_menu){
                            $selected = 'selected';
                        }
                       $menu_select .= '<option '.$selected.' value="'.$m->id.'">'.$m->name.'</option>';
                    }
                    $menu_select .= '</select>';
                    return $menu_select;
                })

                ->addColumn('submenu', function ($row) {
                    return '<span class="editSpan name">' . $row->name_sub_menu . '</span>
                            <input type="text" class="editInput name form-control" name="name"
                            value="' . $row->name_sub_menu . '" style="display:none;">
                            <div class="invalid-feedback" id="profile' . $row->id . '-error"></div>';
                })

                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-warning btn-sm edit_inline"><i class="bi bi-pencil"></i></button>
                            <button class="btn text-success btnSave btn-sm" style="display:none"><i class="bi bi-check-lg"></i></button>
                            <button class="btn text-danger editCancel btn-sm" style="display:none"><i class="bi bi-x-lg"></i></button>
                            <button class="btn btn-danger btnDelete btn-sm" onclick="deleteData(' . $row->id . ')"><i class="bi bi-trash"></i></button>';
                })
                ->editColumn('DT_RowId', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['action','menu', 'submenu'])
                ->addIndexColumn()
                ->make(true);
        }
    }


    public function updateNavbar(Request $request, $id)
    {
        $navbar = Nav::findOrFail($id);

        if(is_null($request->submenu)){
            $menu = $request->menu;
            $sub_menu = $request->sub_menu;

            $updateSubmenu = SubMenu::where('id', $sub_menu)->update(['menus_id' => $menu]);
        }
        // dd($updateSubmenu);
        $data = [
            'name' => $request->name,
            'menus_id' => $request->menu,
        ];
            $navbar->update($data);

        return response()->json([
            'status' => 200,
            'message' => 'Navbar updated successfully',
            'data' => $navbar
        ]);
    }

    // Update Menu
    public function updateMenu(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Menu updated successfully',
            'data' => $menu
        ]);
    }

    // Update Submenu
    public function updateSubmenu(Request $request, $id)
    {
        $submenu = Submenu::findOrFail($id);
        $submenu->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Submenu updated successfully',
            'data' => $submenu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nav  $nav
     * @return \Illuminate\Http\Response
     */
    public function show(Nav $nav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nav  $nav
     * @return \Illuminate\Http\Response
     */
    public function edit(Nav $nav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nav  $nav
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nav $nav)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nav  $nav
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nav $nav)
    {
        //
    }
}
