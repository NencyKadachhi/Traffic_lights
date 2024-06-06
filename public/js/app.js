let first_inp = document.getElementById("first_inp");
let second_inp = document.getElementById("sec_inp");
let third_inp = document.getElementById("third_inp");
let fourth_inp = document.getElementById("four_inp");
let cleartimeoutid;
function eventListenerInputField() {
    [first_inp, second_inp, third_inp, fourth_inp].forEach(function (ele) {
        ele.addEventListener("input", function (e) {
            ele.parentElement.firstElementChild.id = "light_" + ele.value;
        });
    });
}

jQuery.validator.addMethod(
    "ContainsAtLeastOneDigit",
    function (value) {
        return /^[1-4]+$/.test(value);
    },
    "Input must between 1 to 4"
);

$(document).ready(function () {
    $("#myform").validate({
        rules: {
            first_inp: {
                required: true,
                digits: true,
                ContainsAtLeastOneDigit: true,
                maxlength: 1,
            },
            sec_inp: {
                required: true,
                digits: true,
                ContainsAtLeastOneDigit: true,
                maxlength: 1,
            },
            third_inp: {
                required: true,
                digits: true,
                ContainsAtLeastOneDigit: true,
                maxlength: 1,
            },
            four_inp: {
                required: true,
                digits: true,
                ContainsAtLeastOneDigit: true,
                maxlength: 1,
            },
            green_l_i: {
                required: true,
                digits: true,
            },
            yellow_l_i: {
                required: true,
                digits: true,
            },
        },
        message: {
            first_inp: {
                maxlength: "Input must between 1 to 4",
            },
            sec_inp: {
                maxlength: "Input must between 1 to 4",
            },
            third_inp: {
                maxlength: "Input must between 1 to 4",
            },
            four_inp: {
                maxlength: "Input must between 1 to 4",
            },
            green_l_i: {
                required: "Please enter green light interval time",
            },
            yellow_l_i: {
                required: "Please enter yellow light interval time",
            },
        },
        submitHandler: function () {
            $.ajax({
                url: storeData,
                type: "POST",
                data: $("#myform").serialize(),
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    if (data) {
                        changeLight(0);
                        $("#myform :input")
                            .not(":submit,#end")
                            .prop("disabled", true);
                    } else {
                        alert("Data is not saved!");
                    }
                },
            });
        },
    });
});

function changeLight(id) {
    let g_time = parseInt(document.getElementById("green_l_i").value);
    let y_time = parseInt(document.getElementById("yellow_l_i").value);
    let ele = document.getElementById("light_" + (id + 1));
    ele.style.background = "green";
    cleartimeoutid = setTimeout(() => {
        ele.style.background = "yellow";
        setTimeout(() => {
            ele.style.background = "red";
            changeLight((id + 1) % 4);
        }, y_time * 1000);
    }, g_time * 1000);
}

$(document).on("click", "#end", function () {
    $("#myform :input").prop("disabled", false);
    var lightElements = document.getElementsByClassName("light");

    for (var i = 0; i < lightElements.length; i++) {
        lightElements[i].style.background = "red"; // Change background color
    }
    clearTimeout(cleartimeoutid);
});

$(document).ready(function () {
    // Perform AJAX request
    $.ajax({
        url: getData,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response) {
                $("#first_inp").val(response.light_a).parent().children('.light').attr('id','light_'+response.light_a);
                $("#sec_inp").val(response.light_b).parent().children('.light').attr('id','light_'+response.light_b);
                $("#third_inp").val(response.light_c).parent().children('.light').attr('id','light_'+response.light_c);
                $("#four_inp").val(response.light_d).parent().children('.light').attr('id','light_'+response.light_d);
                $("#green_l_i").val(response.green_light_time);
                $("#yellow_l_i").val(response.yellow_light_time);
                eventListenerInputField();
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX request failed:", error);
        },
    });
});
