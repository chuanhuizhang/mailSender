mailSender
==========
This is a simple mail sender.
- present an HTML form which contains a single field that will accept a valid email address and a submit button.
- Upon clicking the submit button, process the form and send an email to the submitted email address containing 
  the following text:
        Subject: "HTML Form Test". 
        Body: "Sent via HTML form using PHP to {submitted email address}"
（Assigned by Davide Torres)

In this project, I use a package form phpMailer which is better than the main() function of php.
This package contains a phpMailer class. The class contains the attributes and functions of sending Email.
So all I should do is to create an object of this class and configure the attributes of this object.
What's more, this class also need to configure the smtp to assign a server to send the email.
So I put the class.smtp.php file here. And PHPMailerAutoload.php is just called by the phpMailer class constructor.

In order to make sure the email address is a validate one, I use JavaScript to check the address input.
