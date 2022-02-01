<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Send Email Using CodeIgniter</title>
    </head>
    <body>
        <?php form_open("/Email_controller/send_mail");?>
        <?php $this->session->flashdata('email_send')?>
        <input type="email" name="email" required="">
        <input type="submit" value="Send Mail">
        <?php form_close();?>
    </body>
    </html>