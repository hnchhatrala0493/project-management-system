<div class="modal fade" id="kt_modal_create_account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-1000px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Title-->
                <h2>Setting</h2>
                <!--end::Title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y">
                <!--begin::Stepper-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <form method="post" class="form" action="{{route('admin.setting.update')}}">
                        @csrf
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin:::Tabs-->
                            <ul
                                class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                        href="#general">General</a>
                                </li>
                                <!--end:::Tab item-->
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#emailSetting">Email</a>
                                </li>
                                <!--end:::Tab item-->
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#twillo">Twillo API</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#seo">SEO</a>
                                </li>
                                <!--end:::Tab item-->
                            </ul>


                            <div class="tab-content">
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade show active" id="general" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::General options-->
                                        @php
                                        $getSetting=DB::table('setting')->where('id',1)->first();
                                        @endphp
                                        <div class="card card-flush py-4">
                                            <div class="card-body pt-0">
                                                <div class="mb-5 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Date Format</label>
                                                    <select class="form-select" data-control="select2"
                                                        name="date_format">
                                                        <option value="January,01 2024"
                                                            {{ $getSetting->setting_value == 'January,01 2024' ? 'selected' : '' }}>
                                                            January,01 2024
                                                        </option>
                                                        <option value="01/01/2024"
                                                            {{ $getSetting->setting_value == '01/01/2024' ? 'selected' : '' }}>
                                                            01/01/2024</option>
                                                        <option value="01-01-2024"
                                                            {{ $getSetting->setting_value == '01-01-2024' ? 'selected' : '' }}>
                                                            01-01-2024</option>
                                                        <option value="Jan, 01 2024"
                                                            {{ $getSetting->setting_value == 'Jan, 01 2024' ? 'selected' : '' }}>
                                                            Jan, 01 2024</option>
                                                        <option value="01 Jan 2024"
                                                            {{ $getSetting->setting_value == '01 Jan 2024' ? 'selected' : '' }}>
                                                            01 Jan 2024</option>
                                                        <option value="2024-01-01"
                                                            {{ $getSetting->setting_value == '2024-01-01' ? 'selected' : '' }}>
                                                            2024-01-01</option>
                                                    </select>
                                                </div>
                                                @php
                                                $getSetting=DB::table('setting')->where('id',2)->first();
                                                @endphp
                                                <div class="row">
                                                    <div class="mb-5 col-md-12">
                                                        <label class="form-label">App Name</label>
                                                        <input type="text"
                                                            value="{{ $getSetting->setting_key == 'APP_NAME' ? $getSetting->setting_value : '' }}"
                                                            name="app_name" id="app_name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="twillo" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            @php
                                            $getSetting=DB::table('setting')->whereIn('id',[10,11,12])->get()->toArray();
                                            @endphp
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">

                                                <div class="mb-5 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Token</label>


                                                    <input type="text" name="twillo_token" class="form-control mb-2"
                                                        placeholder=""
                                                        value="{{ $getSetting[0]->setting_key == 'TWILLO_TOKEN' ? $getSetting[0]->setting_value : '' }}" />
                                                </div>
                                                <!--end::Input group-->

                                                <div class="mb-5 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Account Id</label>


                                                    <input type="text" name="twillo_account_sid"
                                                        class="form-control mb-2" placeholder=""
                                                        value="{{ $getSetting[1]->setting_key == 'TWILLO_ACCOUNT_SID' ? $getSetting[1]->setting_value : '' }}" />
                                                </div>
                                                <div class="mb-5 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Twillo URL</label>


                                                    <input type="text" name="twillo_url" class="form-control mb-2"
                                                        placeholder=""
                                                        value="{{ $getSetting[2]->setting_key == 'TWILLO_URL' ? $getSetting[2]->setting_value : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Tab pane-->
                                <!--begin::Tab pane-->
                                <div class="tab-pane fade" id="emailSetting" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Reviews-->
                                        @php
                                        $getSetting=DB::table('setting')->whereIn('id',[3,4,5,6,7,8,9])->get()->toArray();
                                        @endphp
                                        <div class="card card-flush py-4">
                                            <div class="card-body pt-0">
                                                <!--begin::Table-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="col-lg-4 col-form-label required fw-semibold fs-6">Mailer</label>

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-lg-14 fv-row">
                                                                <input type="text" name="mailer"
                                                                    class="form-control form-control-lg mb-3 mb-lg-0"
                                                                    value="{{ $getSetting[0]->setting_key == 'MAIL_MAILER' ? $getSetting[0]->setting_value : '' }}" />
                                                            </div>
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="col-lg-4 col-form-label required fw-semibold fs-6">Host</label>

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <input type="text" name="host"
                                                            class="form-control form-control-lg"
                                                            value="{{ $getSetting[1]->setting_key == 'MAIL_HOST' ? $getSetting[1]->setting_value : '' }}" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="col-lg-4 col-form-label required fw-semibold fs-6">User
                                                        Name</label>

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <input type="text" name="username"
                                                            class="form-control form-control-lg" placeholder=""
                                                            value="{{ $getSetting[3]->setting_key == 'MAIL_USERNAME' ? $getSetting[3]->setting_value : '' }}" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="col-lg-4 col-form-label required fw-semibold fs-6">Password</label>

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <input type="password" name="password"
                                                            class="form-control form-control-lg" placeholder=""
                                                            value="{{ $getSetting[4]->setting_key == 'MAIL_PASSWORD' ? $getSetting[4]->setting_value : '' }}" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="col-lg-4 col-form-label required fw-semibold fs-6">Port</label>

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <input type="text" name="port"
                                                            class="form-control form-control-lg" placeholder=""
                                                            value="{{ $getSetting[2]->setting_key == 'MAIL_PORT' ? $getSetting[2]->setting_value : '' }}" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="col-lg-4 col-form-label required fw-semibold fs-6">Encryption</label>

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <input type="text" name="encryption"
                                                            class="form-control form-control-lg" placeholder=""
                                                            value="{{ $getSetting[5]->setting_key == 'MAIL_ENCRYPTION' ? $getSetting[5]->setting_value : '' }}" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <input type="text" name="address"
                                                            class="form-control form-control-lg" placeholder=""
                                                            value="{{ $getSetting[6]->setting_key == 'MAIL_FROM_ADDRESS' ? $getSetting[6]->setting_value : '' }}" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Reviews-->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seo" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            @php
                                            $getSetting=DB::table('setting')->whereIn('id',[15,16,17])->get()->toArray();
                                            @endphp
                                            <?PHP //print_r($getSetting);exit; ?>
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <div class="mb-5 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Meta Title</label>
                                                    <input type="text" name="meta_title" class="form-control mb-2"
                                                        placeholder=""
                                                        value="{{ $getSetting[0]->setting_key == 'META_TITLE' ? $getSetting[0]->setting_value : '' }}" />
                                                </div>
                                                <!--end::Input group-->

                                                <div class="mb-5 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Meta Sub Title</label>
                                                    <input type="text" name="meta_subtitle" class="form-control mb-2"
                                                        placeholder=""
                                                        value="{{ $getSetting[1]->setting_key == 'META_SUBTITLE' ? $getSetting[1]->setting_value : '' }}" />
                                                </div>
                                                <div class="mb-5 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Meta Description</label>
                                                    <input type="text" name="meta_description" class="form-control mb-2"
                                                        placeholder=""
                                                        value="{{ $getSetting[2]->setting_key == 'META_DESCRIPTION' ? $getSetting[2]->setting_value : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Tab content-->
                            <div class="d-flex justify-content-end">
                                <!--begin::Button-->
                                <a href="#" data-bs-dismiss="modal" class="btn btn-light me-5">Cancel</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>