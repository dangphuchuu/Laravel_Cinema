<div  class="modal fade  modal-lg" id="refundTicket{!! $value['id'] !!}" tabindex="-1" aria-labelledby="refundTicketLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="photo">
                <div class="card-body mx-4">
                    <div class="row">
                        <div class="col-9">
                            <ul class="list-unstyled">
                                <li class="text-black mt-1"><h5>@lang('lang.terms_conditions')</h5></li>
                                <li class="text-black">- @lang('lang.conditions_1')</li>
                                <li class="text-black">- @lang('lang.conditions_2')</li>
                                <li class="text-black">- @lang('lang.conditions_3')</li>
                                <li class="text-black">- @lang('lang.conditions_4')</li>
                                <li class="text-black">- @lang('lang.conditions_5')</li>
                            </ul>
                        </div>
                        <div class="col-3">
                            <img style="width: 150px;float: right;" src="images/favicon/theater_favicon.png" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">@lang('lang.send_request')</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
            </div>
        </div>
    </div>
</div>

