/**
 * Created by Admin on 13.04.2017.
 */
$.fn.isValid = function(){
    var validate = true;

    this.find("input").each(function(){
        if(typeof this.checkValidity === "function" && this.checkValidity() === false){
            validate = false;
        }
    });

    return validate;
};

$(document).ready(function () {
    var
        $userForm = $("#user-form"),
        $userFormModal = $("#userDataFrom"),
        $formTitle = $("#form-title"),
        $username = $("#username"),
        $password = $("#password"),
        $type = $("#user-type"),
        id = null;

    $(".edit").click(function (event) {
        event.preventDefault();
        id = this.parentNode.parentNode.id;

        if(!id) {
            return;
        }

        $.ajax({
            url: "/index.php/users/get_user/" + id,
            dataType: "json"
        }).done(function (user) {
            $formTitle.text('Փոփոխել օգտվողին');
            $username.val(user.login);
            $password.val("");
            $type.find("option:selected").removeAttr("selected");
            $type.find("option[value='" + user.Admin + "']").attr("selected", "selected");

            $userFormModal.modal("show");
        });
    });

    $(".delete-button").click(function () {
        if(!confirm("Վստա՞հ եք, որ ցանկանում եք հեռացնել տվյալ օգտատիրոջը։")) {
            return;
        }

        var id = this.parentNode.parentNode.id;

        if(!id) {
            return;
        }

        $.ajax({
            url: "/index.php/users/delete_user/" + id
        }).done(function () {
            location.reload();
        }).fail(function () {
            alert("Fail");
        });
    });

    $("#add").click(function () {
        id = null;
        $formTitle.text('Նոր օգտատեր');
        $password.val("");
        $type.find("option:selected").removeAttr("selected");
        $type.find("option:first").attr("selected", "selected");

        $userFormModal.modal("show");
        $username.val("").focus();
    });

    $("#submit").click(function (event) {
        event.preventDefault();
        var target = id ? "edit_user/" + id : "add_user";

        if(!$userForm.isValid()) {
            alert("Խնդրում ենք լրացնել բոլոր դաշտերը");
            return;
        }

        $.ajax({
            url: "/index.php/users/" + target,
            method: "POST",
            data: {
                login: $username.val(),
                password: $password.val(),
                type: $type.val()
            }
        }).done(function () {
            location.reload();
        });
    });
});
