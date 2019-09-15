<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIncomeSourceRequest;
use App\Http\Requests\StoreIncomeSourceRequest;
use App\Http\Requests\UpdateIncomeSourceRequest;
use App\IncomeSource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IncomeSourceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('income_source_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incomeSources = IncomeSource::all();

        return view('admin.incomeSources.index', compact('incomeSources'));
    }

    public function create()
    {
        abort_if(Gate::denies('income_source_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.incomeSources.create');
    }

    public function store(StoreIncomeSourceRequest $request)
    {
        $incomeSource = IncomeSource::create($request->all());

        return redirect()->route('admin.income-sources.index');
    }

    public function edit(IncomeSource $incomeSource)
    {
        abort_if(Gate::denies('income_source_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.incomeSources.edit', compact('incomeSource'));
    }

    public function update(UpdateIncomeSourceRequest $request, IncomeSource $incomeSource)
    {
        $incomeSource->update($request->all());

        return redirect()->route('admin.income-sources.index');
    }

    public function show(IncomeSource $incomeSource)
    {
        abort_if(Gate::denies('income_source_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.incomeSources.show', compact('incomeSource'));
    }

    public function destroy(IncomeSource $incomeSource)
    {
        abort_if(Gate::denies('income_source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incomeSource->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncomeSourceRequest $request)
    {
        IncomeSource::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
