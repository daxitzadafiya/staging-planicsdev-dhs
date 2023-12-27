Hello {{ env('MAIL_FROM_NAME') }}, <br><br>

The following user has sent an Enquiry. <br><br>

Name: {{ $user['name'] }}, <br><br>
Email: {{ $user['email'] }}, <br><br>
Contact: {{ $user['contact'] }}, <br><br>
Subject: {{ $user['subject'] }}, <br><br>
Message: {{ $user['message'] }}, <br><br>

Thanks