<?php

namespace App\Services;

use App\Enums\MessageStatuses;
use App\Models\Message;
use Illuminate\Support\Collection;
use Exception;

class MessageService
{
    public function getMessages(): Collection
    {
        return Message::all();
    }

    public function getMessageById(int $id): Message
    {
        return Message::findOrFail($id);
    }

    public function updateMessageStatusToRead(Message $message): void
    {
        $message->status = MessageStatuses::READ;
        $message->save();
    }
}
