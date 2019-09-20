<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Tenancy Application Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('fileuploader/src/jquery.fileuploader.css') }}>
    <style>
        .error-message {
            color: #f04040;
        }
        .has-error .form-control{
            border: 1px solid #f04040;
        }
        label.box-title{
            color: #f26522;
            text-transform: uppercase;
            font-weight: bold;
        }
        label.box-title-sm{
            color: #f26522;
            text-transform: uppercase;
            font-weight: bold;
        }

        .card-header{
            padding: 0.15rem 1.25rem;
            border-bottom-color: #f26522;
        }
        .pb-5, .py-5 {
            padding-bottom: 2rem !important;
            padding-top: 1rem !important;
        }
        .ml-auto, .mx-auto {
            margin-left: initial!important;
        }
        hr {
            margin-top: 0rem;
            margin-bottom: 0rem;
            border: 0;
            border-top: 1px solid rgb(242, 101, 34);
        }

        .fileuploader-input-caption{
            color: #f26522;
        }
        .fileuploader-input-button {
            background: #f26522;
        }
    </style>
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://multidynamicingleburn.com.au/images/logo.png" alt="" >
        <h2>Tenancy Application Form</h2>
    </div>
    <form action="{{route('submitApplicationForm')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Property Details</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12 {{$errors->has('property_street_address') ? 'has-error' : ''}}">
                                <input type="text" class="form-control" placeholder="Street Address" required
                                       value="{{old('property_street_address')}}" name="property_street_address">
                                @if($errors->has('property_street_address'))
                                    <span class="error-message">{{$errors->first('property_street_address')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Suburb" value="{{old('property_suburb')}}"
                                       name="property_suburb" required>
                                @if($errors->has('property_suburb'))
                                    <span class="error-message">{{$errors->first('property_suburb')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Lease term (years)" value="{{old('property_lease_term_years')}}"
                                           name="property_lease_term_years">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Years</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Lease term (months)" value="{{old('property_lease_term_months')}}"
                                           name="property_lease_term_months">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Months</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Lease commencement date (YY-MM-DD)"
                                       name="property_lease_commencement_date" value="{{old('property_lease_commencement_date')}}">
                                @if($errors->has('property_lease_commencement_date'))
                                    <span class="error-message">{{$errors->first('property_lease_commencement_date')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Rent: $" name="property_rent" value="{{old('property_rent')}}">
                            </div>

                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="propertyRadioWeekly" class="custom-control-input" name="property_rent_time"> <label for="propertyRadioWeekly" class="custom-control-label">Weekly</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="propertyRadioMonthly" class="custom-control-input" name="property_rent_time"><label for="propertyRadioMonthly" class="custom-control-label">Monthly</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <textarea type="text" class="form-control" rows="5" placeholder="Names of all other applicants" name="property_other_applicants">{{old('property_other_applicants')}}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-7">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Number of Occupants</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Adults:" value="{{old('property_occupant_adults')}}" name="property_occupant_adults">
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" placeholder="Children:" value="{{old('property_occupant_child')}}" name="property_occupant_child" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Ages of Children" value="{{old('property_children_age')}}" name="property_children_age">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="box-title">Personal Details</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Given Name(s)" name="personal_name"
                                       value="{{old('personal_name')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Surname" name="personal_surname" value="{{old('personal_surname')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Mobile" name="personal_mobile" value="{{old('personal_mobile')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Home Phone" name="personal_home_phone" value="{{old('personal_home_phone')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Work Phone" name="personal_work_phone" value="{{old('personal_work_phone')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Fax" name="personal_fax" value="{{old('personal_fax')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" placeholder="Email" required name="personal_email" value="{{old('personal_email')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Date of Birth" name="personal_dob" value="{{old('personal_dob')}}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Identification</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-8">
                                <input type="text" class="form-control" placeholder="Driver's License No" value="{{old('identification_license_no')}}"
                                       name="identification_license_no" >
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control" placeholder="State" name="identification_state" value="{{old('identification_state')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Regd No:" name="identification_regd_no" value="{{old('identification_regd_no')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control" placeholder="Passport No:" name="identification_passport_no" value="{{old('identification_passport_no')}}">
                            </div>
                            <div class="form-group col-sm-8">
                                <input type="text" class="form-control" placeholder="Passport Issuing Country" name="identification_passport_issuing_country"
                                       value="{{old('identification_passport_issuing_country')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="box-title-sm">Emergency contact details of person not residing in property</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Name" name="emergency_contact_name" value="{{old('emergency_contact_name')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Relationship" name="emergency_contact_relation" value="{{old('emergency_contact_relation')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Address" name="emergency_contact_address" value="{{old('emergency_contact_address')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Mobile" name="emergency_contact_mobile" value="{{old('emergency_contact_mobile')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Home Phone" value="{{old('emergency_contact_home_phone')}}" name="emergency_contact_home_phone">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Work Phone" name="emergency_contact_work_phone" value="{{old('emergency_contact_work_phone')}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="box-title">Current Tenancy Details</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Street Address"
                                       name="current_tenancy_street_address" value="{{old('current_tenancy_street_address')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Suburb"
                                       name="current_tenancy_suburb" value="{{old('current_tenancy_suburb')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Time at Address"
                                           name="current_tenancy_time_at_address_years" value="{{old('current_tenancy_time_at_address_years')}}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Years</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="current_tenancy_time_at_address_months"
                                           value="{{old('current_tenancy_time_at_address_months')}}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Months</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Rent Paid: $"
                                       name="current_tenancy_rent_paid" value="{{old('current_tenancy_rent_paid')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="currentTenancyRadioWeekly" class="custom-control-input" name="current_tenancy_rent_time"> <label for="currentTenancyRadioWeekly" class="custom-control-label">Weekly</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="currentTenancyRadioMonthly" class="custom-control-input" name="current_tenancy_rent_time"><label for="currentTenancyRadioMonthly" class="custom-control-label">Monthly</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Reason for Leaving"
                                       name="current_tenancy_reason_for_leaving" value="{{old('current_tenancy_reason_for_leaving')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Name of Landlord/Agent"
                                       name="current_tenancy_name_of_landlord" value="{{old('current_tenancy_name_of_landlord')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Landlord/Agent Phone"
                                       name="current_tenancy_landlord_phone" value="{{old('current_tenancy_landlord_phone')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" placeholder="Landlord/Agent Email"
                                       name="current_tenancy_landlord_email" value="{{old('current_tenancy_landlord_email')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Previous Tenancy Details</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Street Address"
                                       name="previous_tenancy_street_address" value="{{old('previous_tenancy_street_address')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Suburb"
                                       name="previous_tenancy_suburb" value="{{old('previous_tenancy_suburb')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Time at Address"
                                           name="previous_tenancy_time_at_address_from" value="{{old('previous_tenancy_time_at_address_from')}}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">From</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="previous_tenancy_time_at_address_to"
                                           value="{{old('previous_tenancy_time_at_address_to')}}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">To</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Rent paid: $"
                                       name="previous_tenancy_rent_paid" value="{{old('previous_tenancy_rent_paid')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="previousTenancyRadioWeekly" class="custom-control-input" name="previous_tenancy_rent_time"> <label for="previousTenancyRadioWeekly" class="custom-control-label">Weekly</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="previousTenancyRadioMonthly" class="custom-control-input" name="previous_tenancy_rent_time"><label for="previousTenancyRadioMonthly" class="custom-control-label">Monthly</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Name of Landlord/Agent"
                                       name="previous_tenancy_name_of_landlord" value="{{old('previous_tenancy_name_of_landlord')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Landlord/Agent Phone"
                                       name="previous_tenancy_landlord_phone" value="{{old('previous_tenancy_landlord_phone')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Was the bond refunded on full?</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="previousTenancyBondRefundYes" class="custom-control-input" name="previous_tenancy_bond_refund"> <label for="previousTenancyBondRefundYes" class="custom-control-label">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="previousTenancyBondRefundNo" class="custom-control-input" name="previous_tenancy_bond_refund"><label for="previousTenancyBondRefundNo" class="custom-control-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <textarea type="text" class="form-control" rows="6" name="previous_tenancy_bond_refund_reason"
                                          placeholder="If No, Please specify reasons why:" >{{old('previous_tenancy_bond_refund_reason')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <label class="box-title">If self employed Please complete</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Company Name"
                                       name="self_employed_company_name" value="{{old('self_employed_company_name')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Business Type"
                                       name="self_employed_business_type" value="{{old('self_employed_business_type')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Business Address"
                                       name="self_employed_business_address" value="{{old('self_employed_business_address')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-7">
                                <input type="text" class="form-control" placeholder="Suburb"
                                       name="self_employed_suburb" value="{{old('self_employed_suburb')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="text" class="form-control" placeholder="Post code"
                                       name="self_employed_post_code" value="{{old('self_employed_post_code')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="ABN"
                                       name="self_employed_abn" value="{{old('self_employed_abn')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Accountant Name"
                                       name="self_employed_accountant_name" value="{{old('self_employed_accountant_name')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Accountant Phone"
                                       name="self_employed_accountant_phone" value="{{old('self_employed_accountant_phone')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" placeholder="Accountant Email"
                                       name="self_employed_accountant_email" value="{{old('self_employed_accountant_email')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" placeholder="Accountant Street Address"
                                       name="self_employed_accountant_street_address" value="{{old('self_employed_accountant_street_address')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control" placeholder="Suburb"
                                       name="self_employed_accountant_suburb" value="{{old('self_employed_accountant_suburb')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" placeholder="State"
                                       name="self_employed_accountant_state" value="{{old('self_employed_accountant_state')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Income</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Employment Income"
                                       name="employement_income" value="{{old('employement_income')}}">
                            </div>

                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="employeeIncomeWeekly" class="custom-control-input" name="employee_income_time"> <label for="employeeIncomeWeekly" class="custom-control-label">Weekly</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="employeeIncomeAnnually" class="custom-control-input" name="employee_income_time"><label for="employeeIncomeAnnually" class="custom-control-label">Annually</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Other Income"
                                       name="employee_other_income" value="{{old('employee_other_income')}}">
                            </div>

                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="employeeOtherIncomeWeekly" class="custom-control-input" name="employee_other_income_time"> <label for="employeeOtherIncomeWeekly" class="custom-control-label">Weekly</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="employeeOtherIncomeAnnually" class="custom-control-input" name="employee_other_income_time"><label for="employeeOtherIncomeAnnually" class="custom-control-label">Annually</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Other Income Source(s)"
                                       name="other_income_sources" value="{{old('other_income_sources')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Current Employment Details</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Position Held"
                                       name="current_employement_position" value="{{old('current_employment_position')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Business Name"
                                       name="current_employment_business_name" value="{{old('current_employment_business_name')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Street Address"
                                       name="current_employment_street_address" value="{{old('current_employment_street_address')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-7">
                                <input type="text" class="form-control" placeholder="Suburb"
                                       name="current_employment_suburb" value="{{old('current_employment_suburb')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="text" class="form-control" placeholder="Post code"
                                       name="current_employment_post_code" value="{{old('current_employment_post_code')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Contact Name"
                                       name="current_employment_contact_name" value="{{old('current_employment_contact_name')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Contact Phone"
                                       name="current_employment_contact_phone" value="{{old('current_employment_contact_phone')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Length of Employment"
                                           name="current_employee_length_of_employment_years" value="{{old('current_employee_length_of_employment_years')}}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Years</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="current_employee_length_of_employment_months"
                                           value="{{old('current_employee_length_of_employment_months')}}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Months</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Previous Employment Details</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Position Held"
                                       name="previous_employee_position" value="{{old('previous_employee_position')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Business Name"
                                       name="previous_employee_business_name" value="{{old('previous_employee_business_name')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Street Address"
                                       name="previous_employee_street_address" value="{{old('previous_employee_street_address')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-7">
                                <input type="text" class="form-control" placeholder="Suburb"
                                       name="previous_employee_suburb" value="{{old('previous_employee_suburb')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <input type="text" class="form-control" placeholder="Post code"
                                       name="previous_employee_post_code" value="{{old('previous_employee_post_code')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Contact Name"
                                       name="previous_employee_contact_name" value="{{old('previous_employee_contact_name')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Contact Phone"
                                       name="previous_employee_contact_phone" value="{{old('previous_employee_contact_phone')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Length of Employment"
                                           name="previous_employee_length_of_employment_years" value="{{old('previous_employee_length_of_employment_years')}}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Years</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="previous_employee_length_of_employment_months"
                                           value="{{old('previous_employee_length_of_employment_months')}}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Months</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Professional Reference</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Reference Name"
                                       name="professional_reference_name" value="{{old('professional_reference_name')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Relationship"
                                       name="professional_reference_relationship" value="{{old('professional_reference_relationship')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Phone"
                                       name="professional_reference_phone" value="{{old('professional_reference_phone')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="email" class="form-control" placeholder="Email"
                                       name="professional_reference_email" value="{{old('professional_reference_email')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Professional Reference 2</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Reference Name"
                                       name="professional_reference_2_name" value="{{old('professional_reference_2_name')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Relationship"
                                       name="professional_reference_2_relationship" value="{{old('professional_reference_2_relationship')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Phone"
                                       name="professional_reference_2_phone" value="{{old('professional_reference_2_phone')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="email" class="form-control" placeholder="Email"
                                       name="professional_reference_2_email" value="{{old('professional_reference_2_email')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Additional Information</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Pets</label>
                            </div>
                            <div class="form-group col-md-10">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="additionalInformationPetsYes" class="custom-control-input" name="additional_info_pets"> <label for="additionalInformationPetsYes" class="custom-control-label">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="additionalInformationPetsNo" class="custom-control-input" name="additional_info_pets"><label for="additionalInformationPetsNo" class="custom-control-label">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>If yes, please state:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Pet Type"
                                       name="additional_info_pet_type" value="{{old('additional_info_pet_type')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Breed"
                                       name="additional_info_breed" value="{{old('additional_info_breed')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Pet Age"
                                       name="additional_info_pet_age" value="{{old('additional_info_pet_age')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Will the pet be kept inside or outside."
                                       name="additional_info_pet_inside_or_outside" value="{{old('additional_info_pet_inside_or_outside')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" class="form-control" placeholder="Council Registration"
                                       name="additional_info_council_registration" value="{{old('additional_info_council_registration')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                    <textarea type="text" class="form-control" rows="4" name="additional_info_other_information"
                              placeholder="Other relevant information for your application">{{old('additional_info_other_information')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <label class="box-title"> Supporting Documents </label>
                        <p> Provide 100 points of identification photocopied and attached to this application.
                            Please note that in order for your application to be processed it is required that Photo ID
                            and Proof of income be provided for each Applicant.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    {{--                                    <input type="checkbox" class="form-check-input">&nbsp;--}}
                                    <label class="form-check-label">Drivers License/Passport Photo Page (40 pts)</label>
                                </div>
                            </div>

                            <div class="form-group col-md-8">
                                <input type="file" id="image" name="driver_license">
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    {{--                                    <input type="checkbox" class="form-check-input">&nbsp;--}}
                                    <label class="form-check-label">Current Payslip/Proof of Income (30 pts)</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="file" id="payslip" name="proof_of_income">
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    {{--                                    <input type="checkbox" class="form-check-input">&nbsp;--}}
                                    <label class="form-check-label">Other Photo ID (20 pts)</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="file" id="photoid" name="other_photo_id">
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    {{--                                    <input type="checkbox" class="form-check-input">&nbsp;--}}
                                    <label class="form-check-label">Birth Certificate (20 pts)</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="file" id="birthcert" name="birth_certificate">
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    {{--                                    <input type="checkbox" class="form-check-input">&nbsp;--}}
                                    <label class="form-check-label">Previous two rent receipts (20 pts)</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="file" id="rent-receipts" name="rent_receipts">
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    {{--                                    <input type="checkbox" class="form-check-input">&nbsp;--}}
                                    <label class="form-check-label">Medicare Card (20 pts)</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="file" id="medicare-card" name="medicare_card">
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    {{--                                    <input type="checkbox" class="form-check-input">&nbsp;--}}
                                    <label class="form-check-label">Debit/Credit card (20 pts)</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="file" id="bank-card" name="debit_credit_card">
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    {{--                                    <input type="checkbox" class="form-check-input">&nbsp;--}}
                                    <label class="form-check-label">Bank statement (20 pts)</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="file" id="bank-statement" name="bank_statement">
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="form-check form-check-inline">
                                    {{--                                    <input type="checkbox" class="form-check-input">&nbsp;--}}
                                    <label class="form-check-label">Utility Bill (20 pts)</label>
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="file" id="utility-bill" name="utility_bill">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Payment declaration form</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Rent amount $:</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="name" placeholder="$"
                                       name="payment_declaration_rent_amount" value="{{old('payment_declaration_rent_amount')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Rental Bond (Four Weeks rent): </label>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="name" placeholder="$"
                                       name="payment_declaration_rental_bond" value="{{old('payment_declaration_rental_bond')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Payment of two weeks rent within 48 hours of application approval:</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="name" placeholder="$"
                                       name="payment_declaration_two_weeks_rent" value="{{old('payment_declaration_two_weeks_rent')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Total amount of cleared funds required prior to collecting keys from the agent:</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="name" placeholder="$"
                                       name="payment_declaration_cleared_funds" value="{{old('payment_declaration_cleared_funds')}}">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <label class="box-title">Terms and Conditions</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="terms_and_conditions" required>
                                    <label class="form-check-label">I agree to terms and conditions.
                                        <a target="_blank" href="{{asset('/application/privacy-policy')}}"> View Privacy Policy </a> </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label> Please provide your signature in the box below.</label>
                                <div class="row">
                                    <div class="col-md-4" id="signature" style="background-color: #d8d8d8;"></div>
                                    <div class="col-md-4" id="sigImg"></div>
                                </div>
                                <br/>
                                <div class="col-md-4">
                                    <a type="button" class="btn btn-sm btn-primary" id="bbt">Capture Signature</a>
                                    <a type="button" class="btn btn-sm btn-primary" id="res">Reset</a>
                                </div>

                                <input type="hidden" name="image" value="" id="inpBtn">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <input type="submit" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>

    </form>
    <br><br>
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src={{ asset('fileuploader/src/jquery.fileuploader.min.js') }} ></script>
<script>
    $('#image').fileuploader({
        extensions:['jpeg','jpg','png'],
        maxSize: 5000,
        pasteZone: null,
        limit: 1
    });

    $('#payslip').fileuploader({
        extensions:['jpeg','jpg','png'],
        maxSize: 5000,
        pasteZone: null,
        limit: 1
    });
    $('#photoid').fileuploader({
        extensions:['jpeg','jpg','png'],
        maxSize: 5000,
        pasteZone: null,
        limit: 1
    });
    $('#birthcert').fileuploader({
        extensions:['jpeg','jpg','png'],
        maxSize: 5000,
        pasteZone: null,
        limit: 1
    });
    $('#rent-receipts').fileuploader({
        extensions:['jpeg','jpg','png'],
        maxSize: 5000,
        pasteZone: null,
        limit: 1
    });
    $('#medicare-card').fileuploader({
        extensions:['jpeg','jpg','png'],
        maxSize: 5000,
        pasteZone: null,
        limit: 1
    });
    $('#bank-card').fileuploader({
        extensions:['jpeg','jpg','png'],
        maxSize: 5000,
        pasteZone: null,
        limit: 1
    });
    $('#bank-statement').fileuploader({
        extensions:['jpeg','jpg','png'],
        maxSize: 5000,
        pasteZone: null,
        limit: 1
    });
    $('#utility-bill').fileuploader({
        extensions:['jpeg','jpg','png'],
        maxSize: 5000,
        pasteZone: null,
        limit: 1
    });
</script>
<script type="text/javascript" src="{{asset('/jSignature/libs/flashcanvas.js')}}"></script>
<script src="{{asset('/jSignature/libs/jSignature.min.js')}}"></script>
<script>
    var $sigdiv = $("#signature");
    $sigdiv.jSignature({
        'background-color': 'transparent',
        'decor-color': 'transparent',
    }); // inits the jSignature widget.
    // after some doodling...
    $('#res').click(function () {
        $sigdiv.jSignature("reset"); // clears the canvas and rerenders the decor on it.
        $('#sigImg').children().remove();
    });
    $('#bbt').click(function () {
        // Getting signature as SVG and rendering the SVG within the browser.
        // (!!! inline SVG rendering from IMG element does not work in all browsers !!!)
        // this export plugin returns an array of [mimetype, base64-encoded string of SVG of the signature strokes]
        var datapair = $sigdiv.jSignature("getData", "image");
        var i = new Image();
        i.src = "data:" + datapair[0] + "," + datapair[1];
        $(i).appendTo($("#sigImg"));// append the image (SVG) to DOM.
        $('#inpBtn').val(i.src);
        // Getting signature as "base30" data pair
        // array of [mimetype, string of jSIgnature"s custom Base30-compressed format]
        datapair = $sigdiv.jSignature("getData","base30");
        // reimporting the data into jSignature.
        // import plugins understand data-url-formatted strings like "data:mime;encoding,data"
        $sigdiv.jSignature("setData", "data:" + datapair.join(","));
    })

</script>
</html>