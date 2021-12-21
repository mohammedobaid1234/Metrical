<x-admin-layout>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Advance Table Widget 5-->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">{{$title}}</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                </h3>
                <div class="card-toolbar">

                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                        <select class="form-control" id="kt_datatable_search_status">
                                            <option value="">All</option>
                                            <option value="1">Active</option>
                                            <option value="2">Draft</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                        <select class="form-control" id="kt_datatable_search_type">
                                            <option value="">All</option>
                                            <option value="1">Online</option>
                                            <option value="2">Retail</option>
                                            <option value="3">Direct</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                            <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                        </div>
                    </div>
                </div>
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="pl-0" style="width: 40px">
                                    <label class="checkbox checkbox-lg checkbox-inline mr-2">
                                        <input type="checkbox" value="1" />
                                        <span></span>
                                    </label>
                                </th>
                                <th class="pl-0" style="min-width: 100px">#</th>
                                <th style="min-width: 120px">Image</th>
                                <th style="min-width: 120px">Name</th>
                                <th style="min-width: 120px">Contry</th>
                                <th style="min-width: 120px">City</th>
                                <th style="min-width: 120px">Mobile Number</th>
                                <th style="min-width: 130px">Type</th>
                                <th class="pr-0 text-right" style="min-width: 160px">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="pl-0 py-6">
                                    <label class="checkbox checkbox-lg checkbox-inline">
                                        <input type="checkbox" value="1" />
                                        <span></span>
                                    </label>
                                </td>
                                <td class="pl-0">
                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$user->id}}</a>
                                </td>
                                <td>
                                    <span style="border-radius: 3px;" class="text-dark-75 font-weight-bolder d-block font-size-lg"><img style="width: 80px; height:60px; overflow:hidden;" src="{{ asset('uploads/' . $user->image_url)}}" alt=""></span>

                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $user->first_name . ' ' . $user->last_name }}</span>

                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->country}}</span>

                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$user->city}}</span>

                                </td>
                                <td>
                                    <span class="label label-lg label-light-success label-inline">
                                        {{ $user->mobile_number }}</span>
                                </td>
                                <td>
                                    <span class="label label-lg label-light-success label-inline">@if($user->type == 0)
                                        normal @elseif($user->type == 1)
                                        Owner @elseif($user->type == 2)
                                        Tenant @endif</span>
                                </td>
                                <td class="pr-0 text-right">
                                    <a href="{{route('binding.show', $user->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>


                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!--end::Table-->
            </div>


            <!-- Modal-->
            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body" style="height: 300px;">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Advance Table Widget 5-->
    </div>
</x-admin-layout>