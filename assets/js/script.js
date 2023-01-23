// $(document).ready(function () {
//     $(".row-sign").hide();
//     $("#go-sign").click(function () {
//         $(".row-log").hide();
//         $(".row-sign").fadeToggle(300);
//     })
//     $("#go-log").click(function () {
//         $(".row-sign").hide();
//         $(".row-log").fadeToggle(300);
//     })
// });

$(document).ready(function () {
    if (session.error) {
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
});

function getCdata(id, name) {
    document.getElementById('editedC').value = id;
    document.getElementById('nameC').value = name;
}

function dynamicForm(categories, author_id) {
    document.querySelector("#dynamicForm").innerHTML +=
    `                    
    <hr class="border border-mute border-3 opacity-75 m-5">
    <!-- title input -->
    <div class="form-outline mb-4">
        <input type="text" name="titledA[]" class="form-control" placeholder="Web development" />
    </div>
    <!-- author input -->
    <input type="hidden" name="authorA[]" class="form-control" value="${author_id}" />
    <!-- category input -->
    <div class="form-outline mb-4">
        <select name="choice[]" class="form-select" aria-label="Default select example">
            <option selected>Choose a category</option>
            ${categories}
        </select>
    </div>
    <!-- picture input -->
    <div class="form-outline mb-4">
        <input type="file" name="photoA[]" class="form-control" accept=".jpg,.png,.jpeg" />
    </div>
    <!-- Submit button -->
    <!-- article input -->
    <div class="form-outline mb-4">
        <textarea class="form-control" name="textA[]" id="form4Example3" rows="9" placeholder="Web development is the process of creating, building, and maintaining websites. It involves a combination of programming languages, frameworks, and tools that are used to build and optimize web applications."></textarea>
    </div>
    `
}

function hideDynamicForm(){
    document.querySelector("#dynamicForm").innerHTML='';
}