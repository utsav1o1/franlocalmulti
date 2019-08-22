<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90" style="margin: 20px">
        <tr bgcolor="#520101">
            <td align="left"><img src="{!! $message->embed($logoPath) !!}"></td>
        </tr>
    </table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="margin: 20px">
        <tr>
            <td align="left" valign="top" style="padding:10px;">

                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td>
                            <p>Dear <strong>Agent,</strong> <br/>
                                <br/>
                                A visitor have send an inquiry to your property with following details.
                            </p>
                        </td>
                </table>


                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td width="20%">Property</td>
                        <td>
                            <a href="{!! route('properties.show', $inquiry->property->slug) !!}">{!! $inquiry->property->name !!}</a>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">Name</td>
                        <td>{!! $inquiry->full_name !!}</td>
                    </tr>
                    <tr>
                        <td width="20%">Email Address</td>
                        <td>{!! $inquiry->email_address !!}</td>
                    </tr>
                    <tr>
                        <td width="20%">Phone Number</td>
                        <td>{!! $inquiry->phone_number !!}</td>
                    </tr>
                    <tr>
                        <td width="20%">Message</td>
                        <td>{!! $inquiry->message !!}</td>
                    </tr>
                </table>

                <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse;margin-top: 20px;">
                    <tr>
                        <td>
                            Kind Regards, <br/>
                            {!! env('APP_NAME') !!}
                        </td>
                </table>

            </td>
        </tr>
    </table>
</div>
</body>
</html>
