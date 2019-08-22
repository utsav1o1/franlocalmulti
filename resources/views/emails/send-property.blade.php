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
                            <p>Dear <strong>Visitor,</strong> <br/>
                                <br/>
                                You are invited to visit following page.
                            </p>
                            <a href="{!! route('properties.show', $property->slug) !!}">{!! route('properties.show', $property->slug) !!}</a>
                        </td>
                </table>

                <p>Do not reply to this email.</p>

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
