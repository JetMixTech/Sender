# Sender for callbacks from sites

Work only for POST request, in otherwise you will get response:
```JSON
{"success": false, "code": 405, "message": "Only for POST request"}
```

For request required next fields:
* companyName - required
* companyMail - required
* companySite - required
* companyPhone - required
* payload.customer - required
* payload.phone - required
* payload.time - required

In otherwise you will get response:
```JSON
{"success": false, "code": 400, "errors": [{"companyName": "Field cannot be blank"}], "message": "Fields cannot be blank"}
```

When mail is sent, you will get response:
```JSON
{"success": true, "code": 200, "message": "Email sent successfully"}
```

In otherwise you will get response:
```JSON
{"success": false, "code": 500, "message": "Failure when sending email"}
```

## License
MIT - https://opensource.org/licenses/mit-license.php
