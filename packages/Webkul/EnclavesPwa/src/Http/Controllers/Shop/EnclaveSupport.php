<?php

namespace Webkul\EnclavePwa\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
use Webkul\EnclavePwa\Http\Controllers\Controller;
use Webkul\Blog\Http\Resources\BlogResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Webkul\Enclaves\Repositories\{TicketsRepository, TicketReasonsRepository};

class EnclaveSupport extends Controller
{

    /**
     * Controller instance
     *
     * @param  Webkul\Sales\Repositories\InvoiceRepository  $invoiceRepository
     */
    public function __construct(
        protected TicketsRepository $ticketsRepository,
        protected TicketReasonsRepository $ticketReasonsRepository,
    ) {}

    public function getTicketReasons()
    {
        $reasons = $this->ticketReasonsRepository->get();

        return response()->json([
            'data' => $reasons,
        ]);
    }

    /**
     * Store Ticket
     */
    public function store()
    {
        $request = request()->only([
            'reason',
            'comment',
            'file',
            'customer_id',
        ]);

        $data = [
            'customer_id'      => $request['customer_id'],
            'ticket_reason_id' => 1,
            'ticket_status_id' => 1,
            'comment'          => $request['comment'],
        ];

        $ticket = $this->ticketsRepository->create($data);

        $this->ticketsRepository->uploadImages($ticket);

        return response()->json([
            'status' => 'success',
            'message' => trans('enclaves::app.admin.inquiries.tickets.form.create.create-success'),
        ]);
    }
}
