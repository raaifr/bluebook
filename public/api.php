<form method="POST" action="" enctype="multipart/form-data">

    <div class="mb-4">
        <label for="f1">
            Name :
        </label>

        <input name="fullname" type="text" placeholder="Full Name" class="" autofocus>

    </div>
    <div class="mb-4">
        <label for="f1">
            NIC :
        </label>

        <input name="f1" type="text" placeholder="National ID card number" class="" autofocus>

    </div>
    <button name="btn_submit" type="submit" class="w-1/4 ml-3 select-none whitespace-no-wrap p-3 rounded-md text-base leading-normal no-underline text-gray-100 bg-primary hover:bg-primary-light sm:py-4">
        Create
    </button>


</form>


<?php
if (isset($_POST['btn_submit'])) {
    $name = $_POST['fullname'];
    echo $name;
}

?>