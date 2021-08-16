$(document).ready(function (){

    let edit = false;
    console.log('JQUERY está funcionando ...');
    $('#task-result').hide();
    fetchTasks();

    //BUSCAR PLAN
    $('#search').keyup(function(){
        if ($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url : 'plan_search.php',
                type: 'POST',
                data: {search: search},
                success: function(response){
                    let planes = JSON.parse(response);
                    let template = '';
                    planes.forEach(plan =>{
                        template += `<li>
                        ${plan.tipo}
                    </li>`
                    });

                    $('#container').html(template);
                    $('#task-result').show();

                }
            });
        }
    });

    //REGISTRAR PLAN
    $('#task-form').submit(function(){
        const postData = {
            numero: $('#numero').val(),
            renta: $('#renta').val(),
            mdm2_5: $('#mdm2_5').val(),
            tipo: $('#tipo').val(),
            descripcion: $('#descripcion').val(),
            observacion: $('#observacion').val(),
            id: $('#taskId').val()
        };

        let url = edit === false ? 'plan_add.php' : 'plan_edit.php' ;
        console.log(url)

        $.post(url , postData, function(response){
            console.log(response);
            fetchTasks();
            $('#task-form').trigger('reset');
        });


    });

    //LISTAR PLANES
    function fetchTasks(){
        $.ajax({
            url: 'plan_list.php',
            type: 'GET',
            success: function (response) {
                let planes = JSON.parse(response);
                let template = '';

                planes.forEach(plan =>{
                    template += `
                        <tr taskId="${plan.id}">
                            <td>${plan.id}</td>
                            <td><a href="#" class="task-item">${plan.numero}</a></td>
                            <td>${plan.renta}</td>
                            <td>${plan.mdm2_5}</td>
                            <td>${plan.total}</td>
                            <td>${plan.tipo}</td>
                            <td>${plan.descripcion}</td>
                            <td>${plan.observacion}</td>
                            <td>
                                <button class="task-delete btn btn-danger">
                                    x
                                </button>
                            </td>
                        </tr>
                        `
                });
                $('#tasks').html(template);
            }
        });
    }

    //ELIMINAR PLAN
    $(document).on('click', '.task-delete', function(){
        if(confirm('Está seguro de querer eliminar ? ')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            $.post('plan_delete.php', {id}, function(response) {
                fetchTasks();
            })
        }
    });

    //EDITAR PLAN
    $(document).on('click', '.task-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        $.post('plan_single.php', {id}, function(response) {
            const plan = JSON.parse(response);
            $('#numero').val(plan.numero);
            $('#renta').val(plan.renta);
            $('#mdm2_5').val(plan.mdm2_5);
            $('#tipo').val(plan.tipo);
            $('#descripcion').val(plan.descripcion);
            $('#observacion').val(plan.observacion);
            $('#taskId').val(plan.id);
            edit = true;
        })
    });



});