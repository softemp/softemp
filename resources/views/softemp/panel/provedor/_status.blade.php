
{{-- page level styles --}}
@section('page_styles')
@stop

<!-- Our Skills Section Start -->
<div class="col-md-6">
    <h3 class="aboutus-ourskills">Em desenvolvimento:</h3>
    <div class="task-item">
        Suporte: ordem de serviço
        <div class="progress">
            <div class="progress-bar" role="progressbar" data-transitiongoal="01"></div>
        </div>
    </div>
    Listar Clientes
    <div class="progress">
        <div class="progress-bar progress-bar-green" role="progressbar" data-transitiongoal="90"></div>
    </div>
    Bloqueio de clietnes em massa
    <div class="progress">
        <div class="progress-bar progress-bar-aqua" role="progressbar" data-transitiongoal="78"></div>
    </div>
    Liberação de clietnes em massa
    <div class="progress">
        <div class="progress-bar  progress-bar-danger" role="progressbar" data-transitiongoal="80"></div>
    </div>
    Bloquear Clientes pelo login
    <div class="progress">
        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" data-transitiongoal="10"></div>
    </div>
</div>
<div class="col-md-6">
    <h3 class="aboutus-ourskills">&nbsp;</h3>
    <div class="task-item">
        Bloquear Clientes pelo login
        <div class="progress">
            <div class="progress-bar" role="progressbar" data-transitiongoal="10"></div>
        </div>
    </div>
    CTOs
    <div class="progress">
        <div class="progress-bar progress-bar-warning" role="progressbar" data-transitiongoal="49"></div>
    </div>
    Tabelas
    <div class="progress">
        <div class="progress-bar progress-bar-light-blue" role="progressbar" data-transitiongoal="20"></div>
    </div>
    Usuários
    <div class="progress">
        <div class="progress-bar  progress-bar-yellow" role="progressbar" data-transitiongoal="01"></div>
    </div>
    Pessoas
    <div class="progress">
        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" data-transitiongoal="01"></div>
    </div>
</div>
<!-- //Our Skills Section End -->

{{-- page level scripts --}}
@section('page_scripts')
    <script>
        $(document).ready(function () {
            $('.progress .progress-bar').progressbar({
                display_text: 'fill',
                transition_delay: 100,
                refresh_speed: 10,
                //display_text: 'none',
                use_percentage: true,
                percent_format: function(percent) { return percent + '%'; },
                amount_format: function(amount_part, amount_total) { return amount_part + ' / ' + amount_total; },
                update: $.noop,
                done: $.noop,
                fail: $.noop
            });
        });
    </script>
@stop
