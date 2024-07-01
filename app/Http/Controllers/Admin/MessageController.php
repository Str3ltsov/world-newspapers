<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Throwable;

class MessageController extends Controller
{
    public function __construct(private MessageService $messageService)
    {
    }

    public function index()
    {
        return view('admin.messages.index')
            ->with('messages', $this->messageService->getMessages());
    }

    public function show(int $id)
    {
        return view('admin.messages.show')
            ->with('message', $this->messageService->getMessageById($id));
    }

    public function destroy(int $id)
    {
        try {
            $message = $this->messageService->getMessageById($id);
            $message->delete();

            return redirect()
                ->route('messages.index')
                ->with('success', "Successfully deleted message - $message->title");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }

    public function markAsRead(int $id)
    {
        try {
            $message = $this->messageService->getMessageById($id);
            $this->messageService->updateMessageStatusToRead($message);

            return redirect()
                ->route('messages.index')
                ->with('success', "Successfully updated message - $message->title to read");
        } catch (Throwable $throwable) {
            if (config('app.env') == 'production')
                return back()->with('error', $throwable->getMessage());
            else
                throw $throwable;
        }
    }
}
