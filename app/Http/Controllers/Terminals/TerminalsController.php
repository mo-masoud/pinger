<?php

namespace App\Http\Controllers\Terminals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Terminals\CreateTerminalsRequest;
use App\Http\Requests\Terminals\UpdateTerminalsRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Terminal;

class TerminalsController extends Controller
{
    public function index() {

        $breadcrumb = [
            'title' =>  __("Terminals lists"),
            'items' =>  [
                [
                    'title' =>  __("Terminals Lists"),
                    'url'   =>  '#!',
                ]
            ],
        ];
        $lists = Terminal::orderBy('id', 'desc')->paginate();
        return view('pages.terminals.index',[
            'breadcrumb'=>$breadcrumb,
            'lists'     =>$lists,
        ]);
    }

    public function create() {
        $breadcrumb = [
            'title' =>  __("Create New Terminal"),
            'items' =>  [
                [
                    'title' =>  __("Terminals Lists"),
                    'url'   => route('terminals.index'),
                ],
                [
                    'title' =>  __("Create New Terminal"),
                    'url'   =>  '#!',
                ],
            ],
        ];

        return view('pages.terminals.create',[
            'breadcrumb'=>$breadcrumb
        ]);
    }

    public function store(CreateTerminalsRequest $request) {
        Terminal::create($request->all());
        return redirect()->route('terminals.index')->with('success', __("This row has been created."));
    }
    
    public function edit(Terminal $terminal) {
        $breadcrumb = [
            'title' =>  __("Edit terminal"),
            'items' =>  [
                [
                    'title' =>  __("Terminals Lists"),
                    'url'   => route('terminals.index'),
                ],
                [
                    'title' =>  __("Edit terminal"),
                    'url'   =>  '#!',
                ],
            ],
        ];
        return view('pages.terminals.edit',[
            'breadcrumb'    =>  $breadcrumb,
            'terminal'         =>  $terminal,
        ]);
    }

    public function update(UpdateTerminalsRequest $request, User $terminal) {
        $terminal->update($request->all());
        return redirect()->route('terminals.index')->with('success', __("This row has been updated."));
    }

    public function destroy(Request $request,Terminal $terminal) {
        $terminal->delete();
        return redirect()->route('terminals.index')->with('success', __("This row has been deleted."));
    }
}
