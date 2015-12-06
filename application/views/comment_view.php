<div id="contact">
    <center> <h2>CreateComment</h2></center>
    <?php
    $this->load->helper("form");
    echo validation_errors();
    echo $message;
    echo form_open_multipart("blog/send_comment");

    echo form_label("Name ", "name");
    $data = array(
        "name" => "name",
        "id" => "name",
        "value" => set_value("name")
    );

    echo form_input($data);
	
    echo form_label("LeaveComment ", "comments");
    $data = array(
        "name" => "comments",
        "id" => "comments",
        "value" => set_value("comments")
    );
    echo form_textarea($data);
	
	
  

    echo form_submit("PostSubmit", "Submit");
    echo form_close();
    ?>
	</div>

