<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Quotation Request</title>
</head>

<body>
  <table cellpadding="0" cellspacing="0" width="100%" style="font-family: Arial, sans-serif;">
    <tr>
      <td>
        <table align="center" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
          <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
              <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td style="color: #333333; font-size: 24px; line-height: 28px; font-weight: bold;">
                    Quotation Request
                  </td>
                </tr>
                <tr>
                  <td style="padding: 20px 0 30px 0; color: #666666; font-size: 16px; line-height: 24px;">
                    <p>Dear Sir/Madam,</p>
                    <p>A client has requested a quotation. Please find the details below:</p>
                    <table cellpadding="5" cellspacing="0" width="100%" style="border: 1px solid #cccccc;">
                      <tr>
                        <td width="30%" style="font-weight: bold;">Client Name:</td>
                        <td>{{$quote->name}}</td>
                      </tr>
                      <tr>
                        <td width="30%" style="font-weight: bold;">Phone Number:</td>
                        <td>{{$quote->phone_number}}</td>
                      </tr>
                      <tr>
                        <td width="30%" style="font-weight: bold;">Email:</td>
                        <td>{{$quote->email}}</td>
                      </tr>
                      <tr>
                        <td width="30%" style="font-weight: bold;">Service:</td>
                        <td>{{$quote->services->service_title}}</td>
                      </tr>
                      <tr>
                        <td width="30%" style="font-weight: bold;">Message:</td>
                        <td>{{$quote->message}}</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="padding-top: 30px; color: #666666; font-size: 16px; line-height: 24px;">
                    <p>Thank you for your attention.</p>
                    <p>Sincerely,</p>
                    <p>Raion Digital</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td bgcolor="#f7f7f7" style="padding: 30px 30px 30px 30px;">
              <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    @php
                        $year = date("Y");
                    @endphp
                  <td align="center" style="color: #666666; font-size: 14px;">
                    <p>&copy; 2022 - {{$year}} Raion Digital. All rights reserved.</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>