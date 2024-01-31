<html lang="en">
<head>
    <title>How To Validate International Phone Number Using jQuery - Techsolutionstuff</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
</head>
<style>

    .hide {
        display: none;
    }
    #valid-msg {
        color: #00c900;
    }
</style>
<body>
<div class="col-md-6 offset-md-2">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <strong>How To Validate International Phone Number Using jQuery - Techsolutionstuff</strong>
            </div>
            <div class="card-body">
                <h6 class="card-title">Phone Number:</h6>
                <input id="phone" type="tel">
                <span id="valid-msg" class="hide">✓ Valid</span>
                <span id="error-msg" class="hide"></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>


    const input = document.querySelector("#phone");
    const errorMsg = document.querySelector("#error-msg");
    const validMsg = document.querySelector("#valid-msg");

    // here, the index maps to the error code returned from getValidationError - see readme
    const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    // initialise plugin
    const iti = window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
    });

    const reset = () => {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };

    // on blur: validate
    input.addEventListener('blur', () => {
        reset();
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                validMsg.classList.remove("hide");
            } else {
                input.classList.add("error");
                const errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
            }
        }
    });

    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);

</script>
