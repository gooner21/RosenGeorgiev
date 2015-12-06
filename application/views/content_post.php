<div id="contact">
    <center> <h2>CreatePost</h2></center>
    <?php
    $this->load->helper("form");
    echo validation_errors();
    echo $message;
    echo form_open_multipart("blog/send_post");

    echo form_label("Title ", "title");
    $data = array(
        "name" => "title",
        "id" => "title",
        "value" => set_value("title")
    );
    echo form_input($data);

    echo form_label("Author ", "author");
    $data = array(
        "name" => "author",
        "id" => "author",
        "value" => set_value("author")
    );
    echo form_input($data);
	
    echo form_label("PostMessage ", "postMessage");
    $data = array(
        "name" => "postMessage",
        "id" => "postMessage",
        "value" => set_value("postMessage")
    );
    echo form_textarea($data);
	
	echo form_label("Image:", "image");
    $data = array(
        "name" => "image",
        "id" => "image"
    );
    echo form_upload($data);

    echo form_submit("PostSubmit", "Submit");
    echo form_close();
    ?>
	</div>