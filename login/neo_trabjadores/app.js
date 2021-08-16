$(document).ready(function() {
    
    let edit = false;
    console.log('JQuery está funcionando ...');
    $('#task-result').hide();
    fetchTasks();

    //BUSCAR
    $('#search').keyup(function(e){
        if($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url: 'task-search.php',
                type: 'POST',
                data: {search},
                success: function(response){
                    let tasks = JSON.parse(response);
                    let template = '';
                    tasks.forEach(task =>{
                        template += `<li>
                            ${task.nombres}
                        </li>`
                    });

                    $('#container').html(template);
                    $('#task-result').show();
                }
            });
        }

    });

    //INSERTAR
    $('#task-form').submit(function(e){
        const postData = {
            dni: $('#dni').val(),
            nombres: $('#nombres').val(),
            apellidos: $('#apellidos').val(),
            cargo: $('#cargo').val(),
            plan: $('#plan').val(),
            equipo: $('#equipo').val(),
            numero_id: $('#numero_id').val(),
            cargador: $('#cargador').val(),
            audifono: $('#audifono').val(),
            caja: $('#caja').val(), 
            id: $('#taskId').val()
        };

        let url = edit === false ? 'task-add.php' : 'task-edit.php';
        console.log(url);
        $.post(url, postData, function(response){
            console.log(response);
            $('#task-form').trigger('reset');
            e.preventDefault();
        });
        
        
    });

    //LISTAR 
    function fetchTasks(){
        $.ajax({
            url: 'task-list.php',
            type: 'GET',
            success: function(response){
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                    template += `
                        <tr taskId="${task.id_t}" >
                            <td>${task.id_t}</td>
                            <td><a href="#" class="task-item">${task.dni}</a></td>
                            <td>${task.nombres}</td>
                            <td>${task.apellidos}</td>
                            <td>${task.cargo}</td>
                            <td>
                                <button class="task-delete btn btn-danger"> X </button>
                            </td>
                        </tr>
                    `
                });
                $('#tasks').html(template);
            }
    
        });
    }
    
    //ELIMINAR 
    $(document).on('click', '.task-delete', function(){
        if(confirm('Está seguro de querer eliminar ? ')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            $.post('task-delete.php', {id}, function(response) {
                console.log(response);
                fetchTasks();
            })
        }
    });


    //EDITAR 
    $(document).on('click', '.task-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        console.log(id);
        $.post('task-single.php', {id}, function(response){
            const task = JSON.parse(response);
            $('#dni').val(task.dni);
            $('#nombres').val(task.nombres);
            $('#apellidos').val(task.apellidos);
            $('#cargo').val(task.cargo);
            $('#plan').val(task.plan);
            $('#equipo').val(task.equipo);
            $('#numero_id').val(task.numero_id);
            $('#cargador').val(task.cargador);
            $('#audifono').val(task.audifono);
            $('#caja').val(task.caja);
            $('#taskId').val(task.id_t);
            edit = true;
            fetchTasks();
        })
    });







    

})