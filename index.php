<form id="contactForm" data-toggle="validator">
	<div class="form-group">
        <input id="name" placeholder="Name" class="form-control" data-error="Name is required">
        <div class="help-block with-errors"></div>
	</div>

                            <div class="form-group">
                                <!-- Email Field -->
                                <input id="email" placeholder="Email" class="form-control" data-error="Email is required">
                                <div class="help-block with-errors"></div>
                            </div>

			    <div class="form-group">
                                <!-- Subject Field -->
                                <input id="subject" placeholder="Subject" class="form-control" data-error="Subject is required">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <!-- Message Field -->
                                <textarea class="form-control" id="body" placeholder="Email Body" required data-error="Message cannot be empty"></textarea>
                                <p class="subtle">* required field</p>
                                <div class="help-block with-errors"></div>
                                <!-- Submit Button -->
                                <button type="submit" onclick="sendEmail()" value="Send An Email" class="button">SEND MESSAGE</button>
                                <!-- Success Message -->
                                <div id="msgSubmit" class="text-center hidden"></div>
                            </div>
                        </form>
    
    <!-- //// JAVA SCRIPT //// -->
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");
            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        if (response.status == "success")
                            alert('Email Has Been Sent!');
                        else {
                            alert('Please Try Again!');
                            console.log(response);
                        }
                   }
                });
            }
        }
        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
