<!-- Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog container">
        <div class="modal-content">
            <div class="modal-header text-uppercase">
                <h5 class="modal-title" id="loginModalLabel">@lang('lang.signin')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4">
                <form method='post' action="/signIn">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" type="email" placeholder="Email..." name="email" aria-label="email"
                               autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="Password..." name="password" aria-label="">
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="rememberme">
                        <label class="form-check-label" for="rememberme">
                            @lang('lang.remember_password')
                        </label>
                    </div>

                    <div class="modal-footer justify-content-center text-center">
                        <button type='submit' class="btn btn-warning text-uppercase">@lang('lang.signin')</button>
                        <p class="text-dark w-100">@lang('lang.have_account')?
                            <a class="link link-warning" data-bs-target="#registerModal" data-bs-toggle="modal"
                               href="#registerModal">@lang('lang.signup')
                            </a>
                        </p>
                        <a href="#" class="link link-secondary col-12 mt-4">@lang('lang.forget_password')?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true" aria-labelledby="registerModalLabel">
    <div class="modal-dialog container">
        <div class="modal-content">
            <div class="modal-header text-uppercase">
                <h5 class="modal-title" id="registerModalLabel">@lang('lang.signup')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4">
                <form method='post' action="/signUp">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="@lang('lang.type') @lang('lang.fullname')" name="fullName" aria-label="">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="email" placeholder="@lang('lang.type') Email..." name="email" aria-label="email"
                               autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="@lang('lang.type') @lang('lang.password')..." name="password" aria-label="">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="@lang('lang.re_password')..." name="repassword" aria-label="">
                    </div>
                    <div class="modal-footer justify-content-center text-center">
                        <button type='submit' class="btn btn-warning text-uppercase">@lang('lang.signup')</button>
                        <p class="text-dark w-100">@lang('lang.have_account')?
                            <a class="link link-warning" data-bs-target="#loginModal" data-bs-toggle="modal" href="#loginModal">@lang('lang.signin')
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
