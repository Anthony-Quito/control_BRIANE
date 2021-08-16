$(document).ready(function () {

    let edit = false;
    console.log('JQuery está funcionando ...');
    $('#task-result').hide();
    fetchTasks();

    //BUSCAR
    $('#search').keyup(function(e){
        if ($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url : 'equipo_search.php',
                type: 'POST',
                data: { search },
                success: function(response){
                    let equipos = JSON.parse(response);
                    let template = '';

                    equipos.forEach(equipo => {
                        template += `<li>
                            ${equipo.marca}
                        </li>`
                    });

                    $('#container').html(template);
                    $('#task-result').show();
                }
            });
        }
    });

    //INSERTAR EQUIPO
    $('#task-form').submit(function () {
        const postData = {
            sim : $('#sim').val(),
            imei : $('#imei').val(),
            serial : $('#serial').val(),
            color : $('#color').val(),
            modelo : $('#modelo').val(),
            marca : $('#marca').val(),
            condicion : $('#condicion').val(),
            recibo : $('#recibo').val(),
            m_contratados : $('#m_contratados').val(),
            m_restantes : $('#m_restantes').val(),
            c_18_meses : $('#c_18_meses').val(),
            f_entrega : $('#f_entrega').val(),
            penalidad : $('#penalidad').val(),
            f_inicio : $('#f_inicio').val(),
            f_fin : $('#f_fin').val(),
            cond_plan : $('#cond_plan').val(),
            observacion : $('#observacion').val(),
            id : $('#taskId').val()
        };

        let url = edit === false ? 'equipo_add.php' : 'equipo_edit.php';
        console.log(url);

        $.post(url, postData, function(response) {
            console.log(response);
            fetchTasks();
            $('#task-form').trigger('reset');

        });
       
    });

    //LISTAR EQUIPOS
    function fetchTasks(){
        $.ajax({
            url: 'equipo_list.php',
            type: 'GET',
            success: function(response){
                let equipos = JSON.parse(response);
                let template = '';
                equipos.forEach(equipo => {
                    template += `
                        <tr taskId="${equipo.id}" >
                            <td>${equipo.id}</td>
                            <td><a href="#" class="task-item">${equipo.modelo}</a></td>
                            <td>${equipo.marca}</td>
                            <td>${equipo.c_18_meses}</td>
                            <td>${equipo.cuota_mensual}</td>
                            <td>${equipo.cond_plan}</td>
                            <td>${equipo.observacion}</td>
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

    //ELIMINAR EQUIPO
    $(document).on('click', '.task-delete', function (){
        if(confirm('Está seguro de querer eliminar este equipo')){
            let element = $(this)[0].parentElement.parentElement;
            let id =$(element).attr('taskId');
            $.post('equipo_delete.php', {id}, function (response){
                fetchTasks();
                console.log(response);
            })
        }
    });


    //EDITAR EQUIPO
    $(document).on('click', '.task-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        $.post('equipo_single.php', {id}, function(response){
            const equipo = JSON.parse(response);
            $('#sim').val(equipo.sim);
            $('#imei').val(equipo.imei);
            $('#serial').val(equipo.serial);
            $('#color').val(equipo.color);
            $('#modelo').val(equipo.modelo);
            $('#marca').val(equipo.marca);
            $('#condicion').val(equipo.condicion);
            $('#recibo').val(equipo.recibo);
            $('#m_contratados').val(equipo.m_contratados);
            $('#m_restantes').val(equipo.m_restantes);
            $('#c_18_meses').val(equipo.c_18_meses);
            $('#f_entrega').val(equipo.f_entrega);
            $('#penalidad').val(equipo.penalidad);
            $('#f_inicio').val(equipo.f_inicio);
            $('#f_fin').val(equipo.f_fin);
            $('#cond_plan').val(equipo.cond_plan);
            $('#observacion').val(equipo.observacion);
            $('#taskId').val(equipo.id);
            edit = true;
            fetchTasks();
        })
    });

});