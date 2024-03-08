<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Message;
use Exception;

class ContactService
{
    public function getContactByAttribute(string $attributeName, mixed $atrributeValue): ?Contact
    {
        $contactModel = new Contact;

        if (array_search($attributeName, $contactModel->getFillable())) {
            $contact = Contact::where($attributeName, $atrributeValue)->first();

            if (!$contact)
                throw new Exception(__('Contact not found'));

            return $contact;
        }

        return null;
    }

    public function createMessageFromFormInput(int $contactId, array $formInput): void
    {
        Message::create([
            'contact_id' => $contactId,
            'name' => $formInput['name'],
            'email' => $formInput['email'],
            'title' => $formInput['subject'],
            'body' => $formInput['message']
        ]);
    }
}
