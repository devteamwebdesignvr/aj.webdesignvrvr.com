<title></title>
<meta http–equiv=“Content-Type” content=“text/html; charset=UTF-8” /><meta http–equiv=“X-UA-Compatible” content=“IE=edge” /><meta name=“viewport” content=“width=device-width, initial-scale=1.0 “ />
<style type="text/css">@media screen {
	@font-face {
		font-family: 'Lato';
		font-style: normal;
		font-weight: 400;
		src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
	}
	body {margin:0px !important; padding:0px !important; display:block !important; min-width:100% !important; width:100% !important; -webkit-text-size-adjust:none;font-family: 'Poppins', sans-serif;}
	table {border-spacing:0; mso-table-lspace:0pt; mso-table-rspace:0pt;}
	table td {border-collapse: collapse;}
	strong {font-weight: bold !important;}
	td img {-ms-interpolation-mode:bicubic; display:block; width:auto; max-width:auto; height:auto; margin:auto;display:block!important;border:0px!important;}
	td a {text-decoration:none !important;}
    b, strong{
        font-weight: bold;
    }
    td{
        border: 1px solid #62ade4; font-weight: bold; font-size: 15px;
    }
	@media only screen and (min-width:481px) and (max-width:699px) {


	}

	@media screen and (max-width: 480px) {



	}
</style>

		
						   
						<div class="accept" class="text-align:center"><span style="display: block; font-size: 30px; font-weight: 600; margin: 20px 0 10px 0; color: #62ade4; font-family: 'Poppins', sans-serif; text-align:center">Payment Request</span></div>
	       
						<h4 style="font-size: 17px; color: #000; font-weight: 600; margin-bottom: 0px; margin-top: 0px; font-family: 'Poppins', sans-serif;">Hey {{$data['name']}},</h4>

						<p style=" font-size: 15px; color: #000; line-height: 24px; font-weight: 400; margin: 0 0 15px 0; text-align: left; font-family: 'Poppins', sans-serif;">Your booking has been accepted. Please click on pay now button below to make the payment.</p>
						<div class="table-box">
						<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" >
							<tbody>
								<tr>
									<th colspan="2" align="center" style="padding: 10px; background: #62ade4; color: #fff; text-align: center; font-size: 15px;" valign="top"><strong>Property Detail </strong></th>
								</tr>

								<tr>
									<td align="left" style="padding: 10px; border: 1px solid #62ade4; font-weight: bold; font-size: 15px; font-family: 'Poppins', sans-serif; color:#000; border-right:0px solid #62ade4;" valign="top"><strong>Property Name :</strong></td>
									<td align="left" style="padding: 10px; border: 1px solid #62ade4; font-weight: bold; font-size: 15px; font-family: 'Poppins', sans-serif; color:#000;" valign="top">{{$property->name }}</td>
								</tr>
							</tbody>
						</table>
			            </div>
						@include("mail.booking-common-data")
						<div style="text-align: center;"><a href="{{ url('booking/rental-aggrement/'.$data['id']) }}" style="background: #00a9dd;
                         color: #fff;
                         border: 1px solid #00a9dd;
                         margin-top: 2rem;
                            cursor: pointer;
                            text-decoration: none;
                            position: relative;
                         padding: 1rem 3rem;
                         font-size: 1rem;
                         font-weight: 600;
                            box-sizing: border-box;">Pay Now</a></div>
		
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px;">
				<tbody>
					<tr>
						<td align="center" valign="top">
						<div><span style="display: block; font-size: 16px; font-weight: 600; margin: 0px 0 10px 0; color: #000;">Thanks for reading!</span></div>

						<p style=" font-size: 14px; color: #000; line-height: 24px; font-weight: 400; margin: 0 0 5px 0;">{!! ModelHelper::getDataFromSetting('mail_footer') !!}</p>
						</td>
					</tr>
				</tbody>
			</table>
			
