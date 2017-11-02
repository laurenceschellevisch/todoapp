$(document).ready(function () {

});
function addTask() {
    //appends all the needed fields to modal in the vieuw
    $('#submitmodal').prop('hidden', true);
    html = '<div id="removestuff"><input type="submit" form="removestuff" value="Add Todo item" class="btn btn-success"></div>';
    $(html).appendTo('#appenddelete');

    $.ajax({
        url:"/getuser",
        type:"post",
        dataType:"text",
        data:'',
        contentType:'application/json',
        success: function (response) {
            options = '';
            $.each(JSON.parse(response),function (i,result) {
                //foreaches the results of the ajax request wich is getuser(); function that sends all users back
                options += '<option value="'+result.id+'">'+result.name+'</option>'
            });
            message= '<form method="post" class="form-control" action="/addtask" id="removestuff"><br>' +
                '<select  class="form-control" name="assigned">'+options+'</select><br>' +
                '<input type="text" value="" placeholder="Name of task" class="form-control" name="todoname"><br>' +
                '<input type="text" value="" placeholder="Status" class="form-control" name="todostatus"><br>' +
                '<input type="text" value="" placeholder="Description" class="form-control" name="tododesc"><br>' +
                '</form>';
            $(message).appendTo('#appendoptions');
        },
        error: function(xhr,desc,err){
            console.log(err,'error!!!');
        },
    });
}
function deleteitemmodal(id) {
    //makes simple modal to delete tasks by id
    html = '<div id="removestuff"><button type="button" class="btn btn-danger" onclick="deleteitem('+id+')">Delete</button></div>';
    message= '<h4 class="center" id="removetext">This will delete your task are you sure?</h4>';
    $(html).appendTo('#appenddelete');
    $(message).appendTo('#appendoptions');
    $('#submitmodal').prop('hidden', true);
}
function deleteitem(id) {
//this happens when you click the delete button in the modal
    $.ajax({
        url:"/deleteitem",
        type:"post",
        dataType:"text",
        data:{id : id},//gets the id that got send with it and makes it post var so i know what id to delete
        success: function (response) {

            location.reload();
        },
        error:function (xhr,desc,err) {
            console.log(err,'error!!!');
        }
    });
}
function callmodal(id) {
    //makes modal for editing the todoitem i know the name is weird
    $('#submitmodal').prop('hidden',false);
    $.ajax({
        url:"/getuser",
        type:"post",
        dataType:"text",
        data:'',
        contentType:'application/json',

        success: function (response) {
            var options = '';
            var html = '';
            $.each(JSON.parse(response),function (i,result) {
                //all users tgets foreached and put into options
                options += '<option value="'+result.id+'">'+result.name+'</option>'
            });

            html =
                '<form method="post" class="form-control" action="/updatetask" id="removestuff"><br>' +
                '<select  class="form-control" name="assigned">'+options+'</select><br>';
                $('#rowid'+id+'').children().each(function (i,result) {
                    //all childeren of rowid + id gets foreached wich is a tr with td in them so i can fill in the current values
                    if (i <4 && i >0) {
                        //i dont want the buttons for edit and delete in there so i dont want the last once
                        html += '<input type="text" value="'+$(result).html()+'" placeholder="name of task" class="form-control" name="'+$(result).attr('name')+'"><br>';
                    } else if (i < 1) {
                        //first one is always id so that can be hidden
                        html += '<input type="hidden" value="'+$(result).html()+'" name="idmodal">'
                    }
                });
                html+= '</form>';
//appends to modal
            $(html).appendTo('#appendoptions');
        },
        error: function(xhr,desc,err){
            console.log(err,'error!!!');
        },
    });
}
$('#closemodalbtn').on('click', function (e) {
    //removes everything form modal when closed
    $('#removestuff').remove();
    $('#removetext').remove();
});
$('#modal').on('hidden.bs.modal', function (e) {
    //removes everything form modal when closed
    $('#removestuff').remove();
    $('#removetext').remove();
});