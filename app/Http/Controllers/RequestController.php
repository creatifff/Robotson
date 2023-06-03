<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request\CreateRequest;
use App\Models\Request;

class RequestController extends Controller
{
    public function leaveRequest(CreateRequest $request)
    {
        $validated = $request->validated();
        Request::query()->create($validated);

        return redirect()->route('page.home')->with(['message' => "Ваша заявка создана! Ожидайте звонка"]);
    }
}
