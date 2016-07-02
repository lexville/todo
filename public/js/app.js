$('#btn-add').on('click', function(){
    $('#myModal').modal('show');
    $('#btn-save').on('click', function() {
        var name = $('#name').val();
        var description = $('#description').val();
        var data = {name: name, description: description, _token: token };
        $.ajax({
            method: 'POST',
            url: url,
            data: data,
        })
        .done(function() {
            $('#myModal').modal('hide');
            location.reload();
        })
        .fail(function() {
            console.log("Failed to add. One or more fields missing");
        });
    });
});

$('.task-delete').on('click', function(e){
    e.preventDefault();
    var id = e.target.dataset.id;
    $.ajax({
        method: 'DELETE',
        url: url + '/' + id,
        data: {
            _token: token
        }
    })
    .done(function() {
        console.log('ok');
        location.reload();
    })
    .fail(function() {
        console.log("Failed to delete");
    });
});

$('.task-edit').on('click', function(e){
    e.preventDefault();
    var task = event.target.parentNode.parentNode.childNodes[1].textContent;
    var description = event.target.parentNode.parentNode.childNodes[3].textContent;
    var id = e.target.dataset.id;
    $('#name').val(task);
    $('#description').val(description);

    $('#myModal').modal('show');
    $('#btn-save').on('click', function() {
        var name = $('#name').val();
        var description = $('#description').val();
        var data = {name: name, description: description, _token: token };
        $.ajax({
            method: 'PUT',
            url: url + '/' + id,
            data: data,
        })
        .done(function() {
            $('#myModal').modal('hide');
            location.reload();
        })
        .fail(function() {
            console.log("Failed to add. One or more fields missing");
        });
    });
});
