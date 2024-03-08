<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use App\Services\ContactService;
use App\Services\LinkService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Throwable;

class ContactController extends Controller
{
    public function __construct(
        private LinkService $linkService,
        private ContactService $contactService
    ) {
    }

    public function index(): Renderable|RedirectResponse
    {
        try {
            $link = $this->linkService->getLinkByAttribute('link', '/' . Route::current()->uri);

            return view('contact.index')
                ->with([
                    'linkBreadcrumb' => $this->linkService->createLinkBreadcrumb($link->link),
                    'link' => $link,
                    'webData' => $link->webData
                ]);
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }

    public function sendMessage(SendMessageRequest $request): RedirectResponse
    {
        try {
            $validatedFormInput = $request->validated();
            $contact = $this->contactService->getContactByAttribute('email', config('mail.from.address'));

            $this->contactService->createMessageFromFormInput($contact->id, $validatedFormInput);

            return back()->with('success', __('Message has been successfully sent.'));
        } catch (Throwable $throwable) {
            if (config('app.env') !== 'production')
                throw $throwable;
            else
                return back()->with('error', $throwable->getMessage());
        }
    }
}
