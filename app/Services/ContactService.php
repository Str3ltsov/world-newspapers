<?php

namespace App\Services;

use App\Models\Contact;
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
}
