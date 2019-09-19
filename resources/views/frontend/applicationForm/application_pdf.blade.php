<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> Tenancy Application Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .row-heading {
            color: #f26826;
        }

        .table tr td{
            line-height: 0.5643;
        }
    </style>
</head>
<body>
<div class="py-2 text-center">
    <img class="d-block mx-auto" src="https://multidynamicingleburn.com.au/images/logo.png" alt="" >

</div>
<br>
<br>
<br>
<div class="text-center">
    <h2>Tenancy Application Form</h2>
</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Property Details
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Street Address:  </td>
                        <td>{{isset($attributes['property_street_address']) ? $attributes['property_street_address'] : ''}}</td>
                        <td class="row-heading">Suburb: </td>
                        <td>{{isset($attributes['property_suburb']) ? $attributes['property_suburb'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Lease Term: </td>
                        <td>{{isset($attributes['property_lease_term_years']) ? $attributes['property_lease_term_years'] : '&nbsp;'}} Years
                            {{isset($attributes['property_lease_term_months']) ? $attributes['property_lease_term_months'] : '&nbsp;&nbsp;'}} Months</td>
                        <td class="row-heading">Lease Commencement Date:</td>
                        <td>{{isset($attributes['property_lease_commencement_date']) ? $attributes['property_lease_commencement_date'] : '&nbsp;'}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Rent $:</td>
                        <td>{{isset($attributes['property_rent']) ? $attributes['property_rent'] : '&nbsp;'}}&nbsp;
                            {{isset($attributes['property_rent_time']) ? $attributes['property_rent_time'] : '&nbsp;'}}</td>
                        <td class="row-heading">Other Applicants:</td>
                        <td>{{isset($attributes['property_other_applicants']) ? $attributes['property_other_applicants'] : ''}}</td>
                    </tr>

                    <tr>
                        <td class="row-heading">Number of Occupants: </td>
                        <td>{{isset($attributes['property_occupant_adults']) ? $attributes['property_occupant_adults'] : ''}} Adults
                            {{isset($attributes['property_occupant_child']) ? $attributes['property_occupant_child'] : '&nbsp;&nbsp;'}} Children</td>
                        <td class="row-heading">Ages of Children: </td>
                        <td> {{isset($attributes['property_children_age']) ? $attributes['property_children_age'] : ''}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Identification
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Driver's License No:  </td>
                        <td>{{isset($attributes['identification_license_no']) ? $attributes['identification_license_no'] : ''}}</td>
                        <td class="row-heading">State: </td>
                        <td>{{isset($attributes['identification_state']) ? $attributes['identification_state'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Regd. No.: </td>
                        <td>{{isset($attributes['identification_regd_no']) ? $attributes['identification_regd_no'] : ''}} </td>
                        <td class="row-heading">Passport No:</td>
                        <td>{{isset($attributes['identification_passport_no']) ? $attributes['identification_passport_no'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Passport Issuing Country:</td>
                        <td>{{isset($attributes['identification_passport_issuing_country']) ? $attributes['identification_passport_issuing_country'] : ''}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Personal Details
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Given Name:  </td>
                        <td>{{isset($attributes['personal_name']) ? $attributes['personal_name'] : ''}}</td>
                        <td class="row-heading">Surname: </td>
                        <td>{{isset($attributes['personal_surname']) ? $attributes['personal_surname'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Mobile: </td>
                        <td>{{isset($attributes['personal_mobile']) ? $attributes['personal_mobile'] : ''}} </td>
                        <td class="row-heading">Home No:</td>
                        <td>{{isset($attributes['personal_home_phone']) ? $attributes['personal_home_phone'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Work Phone:</td>
                        <td>{{isset($attributes['personal_work_phone']) ? $attributes['personal_work_phone'] : ''}}</td>
                        <td class="row-heading">Fax:</td>
                        <td>{{isset($attributes['personal_fax']) ? $attributes['personal_fax'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Email:</td>
                        <td>{{isset($attributes['personal_email']) ? $attributes['personal_email'] : ''}}</td>
                        <td class="row-heading">Date Of Birth:</td>
                        <td>{{isset($attributes['personal_dob']) ? $attributes['personal_dob'] : ''}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Emergency Contact Details of Person not residing in property
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Name:  </td>
                        <td>{{isset($attributes['emergency_contact_name']) ? $attributes['emergency_contact_name'] : ''}}</td>
                        <td class="row-heading">Relationship: </td>
                        <td>{{isset($attributes['emergency_contact_relation']) ? $attributes['emergency_contact_relation'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Address: </td>
                        <td>{{isset($attributes['emergency_contact_address']) ? $attributes['emergency_contact_address'] : ''}} </td>
                        <td class="row-heading">Mobile:</td>
                        <td>{{isset($attributes['emergency_contact_mobile']) ? $attributes['emergency_contact_mobile'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Home Phone:</td>
                        <td>{{isset($attributes['emergency_contact_home_phone']) ? $attributes['emergency_contact_home_phone'] : ''}}</td>
                        <td class="row-heading">Work Phone:</td>
                        <td>{{isset($attributes['emergency_contact_work_phone']) ? $attributes['emergency_contact_work_phone'] : ''}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Current Tenancy Details
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Street Address:  </td>
                        <td>{{isset($attributes['current_tenancy_street_address']) ? $attributes['current_tenancy_street_address'] : ''}}</td>
                        <td class="row-heading">Suburb: </td>
                        <td>{{isset($attributes['current_tenancy_suburb']) ? $attributes['current_tenancy_suburb'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Time at Address: </td>
                        <td>{{isset($attributes['current_tenancy_time_at_address_years']) ? $attributes['current_tenancy_time_at_address_years'] : '&nbsp;'}} Years
                            {{isset($attributes['current_tenancy_time_at_address_months']) ? $attributes['current_tenancy_time_at_address_months'] : '&nbsp;&nbsp;'}} Months</td>
                        <td class="row-heading">Rent Paid $:</td>
                        <td>{{isset($attributes['current_tenancy_rent_paid']) ? $attributes['current_tenancy_rent_paid'] : '&nbsp;'}}&nbsp;
                            {{isset($attributes['current_tenancy_rent_time']) ? $attributes['current_tenancy_rent_time'] : '&nbsp;'}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Reason for Leaving:</td>
                        <td>{{isset($attributes['current_tenancy_reason_for_leaving']) ? $attributes['current_tenancy_reason_for_leaving'] : ''}}</td>
                        <td class="row-heading">Name of Landlord/Agent:</td>
                        <td>{{isset($attributes['current_tenancy_name_of_landlord']) ? $attributes['current_tenancy_name_of_landlord'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Landlord/Agent Phone:</td>
                        <td>{{isset($attributes['current_tenancy_landlord_phone']) ? $attributes['current_tenancy_landlord_phone'] : ''}}</td>
                        <td class="row-heading">Landlord/Agent Email:</td>
                        <td>{{isset($attributes['current_tenancy_landlord_email']) ? $attributes['current_tenancy_landlord_email'] : ''}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Previous Tenancy Details
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Street Address:  </td>
                        <td>{{isset($attributes['previous_tenancy_street_address']) ? $attributes['previous_tenancy_street_address'] : ''}}</td>
                        <td class="row-heading">Suburb: </td>
                        <td>{{isset($attributes['previous_tenancy_suburb']) ? $attributes['previous_tenancy_suburb'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Time at Address: </td>
                        <td>From {{isset($attributes['previous_tenancy_time_at_address_from']) ? $attributes['previous_tenancy_time_at_address_from'] : '&nbsp;&nbsp;'}} To
                            {{isset($attributes['previous_tenancy_time_at_address_to']) ? $attributes['previous_tenancy_time_at_address_to'] : '&nbsp;'}} </td>
                        <td class="row-heading">Rent Paid $:</td>
                        <td>{{isset($attributes['previous_tenancy_rent_paid']) ? $attributes['previous_tenancy_rent_paid'] : '&nbsp;'}}&nbsp;
                            {{isset($attributes['previous_tenancy_rent_time']) ? $attributes['previous_tenancy_rent_time'] : '&nbsp;'}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Name of Landlord/Agent:</td>
                        <td>{{isset($attributes['previous_tenancy_name_of_landlord']) ? $attributes['previous_tenancy_name_of_landlord'] : ''}}</td>
                        <td class="row-heading">Landlord/Agent Phone:</td>
                        <td>{{isset($attributes['current_tenancy_landlord_phone']) ? $attributes['current_tenancy_landlord_phone'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Bond Refunded full?:</td>
                        <td>{{isset($attributes['previous_tenancy_bond_refund']) ? $attributes['previous_tenancy_bond_refund'] : ''}}</td>
                        <td class="row-heading">If No, Please specify reasons why:</td>
                        <td>{{isset($attributes['previous_tenancy_bond_refund_reason']) ? $attributes['previous_tenancy_bond_refund_reason'] : ''}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Self Employed
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Company Name:  </td>
                        <td>{{isset($attributes['self_employed_company_name']) ? $attributes['self_employed_company_name'] : ''}}</td>
                        <td class="row-heading">Business Type: </td>
                        <td>{{isset($attributes['self_employed_business_type']) ? $attributes['self_employed_business_type'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Business Address: </td>
                        <td>{{isset($attributes['self_employed_business_address']) ? $attributes['self_employed_business_address'] : ''}} </td>
                        <td class="row-heading">Suburb:</td>
                        <td>{{isset($attributes['self_employed_suburb']) ? $attributes['self_employed_suburb'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Post code:</td>
                        <td>{{isset($attributes['self_employed_post_code']) ? $attributes['self_employed_post_code'] : ''}}</td>
                        <td class="row-heading">ABN:</td>
                        <td>{{isset($attributes['self_employed_abn']) ? $attributes['self_employed_abn'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Accountant Name:</td>
                        <td>{{isset($attributes['self_employed_accountant_name']) ? $attributes['self_employed_accountant_name'] : ''}}</td>
                        <td class="row-heading">Accountant Phone:</td>
                        <td>{{isset($attributes['self_employed_accountant_phone']) ? $attributes['self_employed_accountant_phone'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Accountant Email:</td>
                        <td>{{isset($attributes['self_employed_accountant_email']) ? $attributes['self_employed_accountant_email'] : ''}}</td>
                        <td class="row-heading">Accountant Street Address:</td>
                        <td>{{isset($attributes['self_employed_accountant_street_address']) ? $attributes['self_employed_accountant_street_address'] : ''}}</td>
                    </tr>
                    <tr>
                        <td class="row-heading">Suburb:</td>
                        <td>{{isset($attributes['self_employed_accountant_suburb']) ? $attributes['self_employed_accountant_suburb'] : ''}}</td>
                        <td class="row-heading">State:</td>
                        <td>{{isset($attributes['self_employed_accountant_state']) ? $attributes['self_employed_accountant_state'] : ''}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Income
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Employment Income:  </td>
                        <td>
                            {{isset($attributes['employement_income']) ? $attributes['employement_income'] : ''}}&nbsp;&nbsp;
                            {{isset($attributes['employee_income_time']) ? $attributes['employee_income_time'] : ''}}
                        </td>
                        <td class="row-heading">Other Income: </td>
                        <td>{{isset($attributes['employee_other_income']) ? $attributes['employee_other_income'] : ''}}&nbsp;&nbsp;
                            {{isset($attributes['employee_other_income_time']) ? $attributes['employee_other_income_time'] : ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Other Income Source(s): </td>
                        <td>{{isset($attributes['other_income_sources']) ? $attributes['other_income_sources'] : ''}} </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Current Employment Details
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Position Held:  </td>
                        <td>
                            {{isset($attributes['current_employment_position']) ? $attributes['current_employment_position'] : ''}}
                        </td>
                        <td class="row-heading">Business Name: </td>
                        <td>{{isset($attributes['current_employment_business_name']) ? $attributes['current_employment_business_name'] : ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Street Address: </td>
                        <td>{{isset($attributes['current_employment_street_address']) ? $attributes['current_employment_street_address'] : ''}} </td>
                        <td class="row-heading">Suburb: </td>
                        <td>{{isset($attributes['current_employment_suburb']) ? $attributes['current_employment_suburb'] : ''}} </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Post code: </td>
                        <td>{{isset($attributes['current_employment_post_code']) ? $attributes['current_employment_post_code'] : ''}} </td>
                        <td class="row-heading">Contact Name: </td>
                        <td>{{isset($attributes['current_employment_contact_name']) ? $attributes['current_employment_contact_name'] : ''}} </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Contact Phone: </td>
                        <td>{{isset($attributes['current_employment_contact_phone']) ? $attributes['current_employment_contact_phone'] : ''}} </td>
                        <td class="row-heading">Length of Employment: </td>
                        <td>{{isset($attributes['current_employee_length_of_employment_years']) ? $attributes['current_employee_length_of_employment_years'] : ''}}&nbsp;&nbsp;
                            {{isset($attributes['current_employee_length_of_employment_months']) ? $attributes['current_employee_length_of_employment_months'] : ''}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Previous Employment Details
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Position Held:  </td>
                        <td>
                            {{isset($attributes['previous_employee_position']) ? $attributes['previous_employee_position'] : ''}}
                        </td>
                        <td class="row-heading">Business Name: </td>
                        <td>{{isset($attributes['previous_employee_business_name']) ? $attributes['previous_employee_business_name'] : ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Street Address: </td>
                        <td>{{isset($attributes['previous_employee_street_address']) ? $attributes['previous_employee_street_address'] : ''}} </td>
                        <td class="row-heading">Suburb: </td>
                        <td>{{isset($attributes['previous_employee_suburb']) ? $attributes['previous_employee_suburb'] : ''}} </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Post code: </td>
                        <td>{{isset($attributes['previous_employee_post_code']) ? $attributes['previous_employee_post_code'] : ''}} </td>
                        <td class="row-heading">Contact Name: </td>
                        <td>{{isset($attributes['previous_employee_contact_name']) ? $attributes['previous_employee_contact_name'] : ''}} </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Contact Phone: </td>
                        <td>{{isset($attributes['previous_employee_contact_phone']) ? $attributes['previous_employee_contact_phone'] : ''}} </td>
                        <td class="row-heading">Length of Employment: </td>
                        <td>{{isset($attributes['previous_employee_length_of_employment_years']) ? $attributes['previous_employee_length_of_employment_years'] : ''}}&nbsp; Years &nbsp;
                            {{isset($attributes['previous_employee_length_of_employment_months']) ? $attributes['previous_employee_length_of_employment_months'] : ''}} &nbsp; Months
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Professional Reference
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Reference Name:  </td>
                        <td>
                            {{isset($attributes['professional_reference_name']) ? $attributes['professional_reference_name'] : ''}}
                        </td>
                        <td class="row-heading">Relationship: </td>
                        <td>{{isset($attributes['professional_reference_relationship']) ? $attributes['professional_reference_relationship'] : ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Phone: </td>
                        <td>{{isset($attributes['professional_reference_phone']) ? $attributes['professional_reference_phone'] : ''}} </td>
                        <td class="row-heading">Email: </td>
                        <td>{{isset($attributes['professional_reference_email']) ? $attributes['professional_reference_email'] : ''}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Professional Reference 2
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Reference Name:  </td>
                        <td>
                            {{isset($attributes['professional_reference_2_name']) ? $attributes['professional_reference_2_name'] : ''}}
                        </td>
                        <td class="row-heading">Relationship: </td>
                        <td>{{isset($attributes['professional_reference_2_relationship']) ? $attributes['professional_reference_2_relationship'] : ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Phone: </td>
                        <td>{{isset($attributes['professional_reference_2_phone']) ? $attributes['professional_reference_2_phone'] : ''}} </td>
                        <td class="row-heading">Email: </td>
                        <td>{{isset($attributes['professional_reference_2_email']) ? $attributes['professional_reference_2_email'] : ''}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Additional Information
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Pets:  </td>
                        <td>
                            {{isset($attributes['additional_info_pets']) ? $attributes['additional_info_pets'] : ''}}
                        </td>
                        <td class="row-heading">Pet Type: </td>
                        <td>{{isset($attributes['additional_info_pet_type']) ? $attributes['additional_info_pet_type'] : ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Breed: </td>
                        <td>{{isset($attributes['additional_info_breed']) ? $attributes['additional_info_breed'] : ''}} </td>
                        <td class="row-heading">Pet Age: </td>
                        <td>{{isset($attributes['additional_info_pet_age']) ? $attributes['additional_info_pet_age'] : ''}} </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Pet Kept Inside or Outside: </td>
                        <td>{{isset($attributes['additional_info_pet_inside_or_outside']) ? $attributes['additional_info_pet_inside_or_outside'] : ''}} </td>
                        <td class="row-heading">Council Registration: </td>
                        <td>{{isset($attributes['additional_info_council_registration']) ? $attributes['additional_info_council_registration'] : ''}} </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Other relevant information: </td>
                        <td>{{isset($attributes['additional_info_other_information']) ? $attributes['additional_info_other_information'] : ''}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card ">
    <div class="">
        <div class="card-header">
            Payment Declaration
        </div>
        <div class="card-body">
            <div class="col-xs-5">
                <table class="table table-sm">
                    <tr>
                        <td class="row-heading">Rent Amount $:  </td>
                        <td>
                            {{isset($attributes['payment_declaration_rent_amount']) ? $attributes['payment_declaration_rent_amount'] : ''}}
                        </td>
                        <td class="row-heading">Rental Bond (Four Weeks rent): </td>
                        <td>{{isset($attributes['payment_declaration_rental_bond']) ? $attributes['payment_declaration_rental_bond'] : ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="row-heading">Payment of two weeks rent: </td>
                        <td>{{isset($attributes['payment_declaration_two_weeks_rent']) ? $attributes['payment_declaration_two_weeks_rent'] : ''}} </td>
                        <td class="row-heading">Total amount of cleared funds: </td>
                        <td>{{isset($attributes['payment_declaration_cleared_funds']) ? $attributes['payment_declaration_cleared_funds'] : ''}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card ">
    <div class="">
        <div class="card-header">
            Terms and Conditions
        </div>
        <div class="body">
            <div class="col-xs-5">
                <img src="{{$attributes['image']}}" alt="" >
            </div>
            <div class="col-xs-5">
                Date: {{\Carbon\Carbon::now()->toDateString()}}
            </div>
        </div>
    </div>
</div>
</body>
</html>