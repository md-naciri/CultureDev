
$(document).ready(function () {
    if (session.serror) {
        $(".row-log").hide();
        $(".row-sign").show();
    } else {
        $(".row-sign").hide();
    }
    $("#go-sign").click(function () {
        $(".row-log").hide();
        $(".row-sign").fadeToggle(300);
    })
    $("#go-log").click(function () {
        $(".row-sign").hide();
        $(".row-log").fadeToggle(300);
    })
});

$(document).ready(function () {
    $('#dtables').DataTable();
    $('#dtables').parent().css("overflow-x", "scroll");
});

function getCdata(id, name) {
    document.getElementById('editedC').value = id;
    document.getElementById('nameC').value = name;
}

function dynamicForm(categories, author_id) {
    document.querySelector("#dynamicForm").innerHTML +=
        `
    <hr class="m-5 border border-mute border-2 opacity-100">
    <!-- title input -->
    <div class="form-outline mb-4">
        <input type="text" name="titledA[]" class="form-control" placeholder="Title" data-parsley-trigger="keyup" data-parsley-required data-parsley-minlength="3" data-parsley-maxlength="50" />
    </div>
    <!-- author input -->
    <input type="hidden" name="authorA[]" class="form-control" value="${author_id}" />
    <!-- category input -->
    <div class="form-outline mb-4">
        <select name="choice[]" class="form-select" aria-label="Default select example">
        ${categories}
        </select>
    </div>
    <!-- picture input -->
    <div class="form-outline mb-4">
        <input type="file" name="photoA[]" class="form-control" data-parsley-required accept=".jpg,.png,.jpeg" />
    </div>
    <!-- Submit button -->
    <!-- article input -->
    <div class="form-outline mb-4">
        <textarea class="form-control" name="textA[]" id="form4Example3" rows="9" placeholder="Write your article here." data-parsley-trigger="keyup" data-parsley-required></textarea>
        </div>
        <button class='btn btn-danger' onclick="deleteForm(this)">Delete</button>
    `
}


function hideDynamicForm() {
    document.querySelector("#dynamicForm").innerHTML = '';
}
$('.to-validate').parsley();


function deleteForm(element){
    element.parentNode.remove();

}