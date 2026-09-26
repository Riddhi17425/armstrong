@extends('admin.layouts.app')
@section('content')
<!-- Body: Body -->
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row g-3 mb-3">

            <!-- Total Products -->
            <div class="col-lg-4 col-12">
                <div class="alert-success alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-success text-light">
                            <i class="fa fa-cubes fa-lg"></i> <!-- cube icon for products -->
                        </div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Total Products</div>
                            <span class="small">{{ $data['total_products'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Inquiries -->
            <div class="col-lg-4 col-12">
                <div class="alert-danger alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-danger text-light">
                            <i class="fa fa-envelope-open fa-lg"></i> <!-- envelope for inquiries -->
                        </div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Total Inquiries</div>
                            <span class="small">{{ $data['total_inquires'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Applications -->
            <div class="col-lg-4 col-12">
                <div class="alert-info alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-info text-light">
                            <i class="fa fa-clipboard fa-lg"></i> <!-- clipboard for applications -->
                        </div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Total Applications</div>
                            <span class="small">{{ $data['total_application'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Row end  -->
    </div>
</div>
@endsection
