<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ClientStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientStatusRequest;
use App\Http\Requests\UpdateClientStatusRequest;
use App\Http\Resources\Admin\ClientStatusResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientStatusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientStatusResource(ClientStatus::all());
    }

    public function store(StoreClientStatusRequest $request)
    {
        $clientStatus = ClientStatus::create($request->all());

        return (new ClientStatusResource($clientStatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClientStatus $clientStatus)
    {
        abort_if(Gate::denies('client_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientStatusResource($clientStatus);
    }

    public function update(UpdateClientStatusRequest $request, ClientStatus $clientStatus)
    {
        $clientStatus->update($request->all());

        return (new ClientStatusResource($clientStatus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClientStatus $clientStatus)
    {
        abort_if(Gate::denies('client_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientStatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
