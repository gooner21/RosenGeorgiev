<div id="contact">
    <center> <h2>ContactUs</h2></center>
    <?php
    $this->load->helper("form");
    echo validation_errors();
    echo $message;
    echo form_open("site/send_email");

    echo form_label("Name ", "fullName");
    $data = array(
        "name" => "fullName",
        "id" => "fullName",
        "value" => set_value("fullName")
    );
    echo form_input($data);

    echo form_label("Email ", "email");
    $data = array(
        "name" => "email",
        "id" => "email",
        "value" => set_value("email")
    );
    echo form_input($data);
    echo form_label("Massage ", "massage");
    $data = array(
        "name" => "message",
        "id" => "message",
        "value" => set_value("message")
    );
    echo form_textarea($data);
    echo $math_captcha_question;
    echo form_input('math_captcha');
    echo form_submit("contactSubmit", "Submit");
    echo form_close();
    ?>
</div>