
{{-- page level styles --}}
@section('page_styles')
@stop

<!-- Our Skills Section Start -->
<div class="col-md-6">
    <h3 class="aboutus-ourskills">Em desenvolvimento:</h3>
    <div class="task-item">
        Pagina Home
        <div class="progress">
            <div class="progress-bar" role="progressbar" data-transitiongoal="01"></div>
        </div>
    </div>
    Planos
    <div class="progress">
        <div class="progress-bar progress-bar-green" role="progressbar" data-transitiongoal="1"></div>
    </div>
    Sobre Nos
    <div class="progress">
        <div class="progress-bar progress-bar-aqua" role="progressbar" data-transitiongoal="30"></div>
    </div>
    Ajuda
    <div class="progress">
        <div class="progress-bar  progress-bar-danger" role="progressbar" data-transitiongoal="01"></div>
    </div>
    Contato
    <div class="progress">
        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" data-transitiongoal="02"></div>
    </div>
</div>
<div class="col-md-6">
    <h3 class="aboutus-ourskills">Em desenvolvimento:</h3>
    <div class="task-item">
        Blog
        <div class="progress">
            <div class="progress-bar" role="progressbar" data-transitiongoal="03"></div>
        </div>
    </div>
    Banners
    <div class="progress">
        <div class="progress-bar progress-bar-warning" role="progressbar" data-transitiongoal="01"></div>
    </div>
    Depoimentos
    <div class="progress">
        <div class="progress-bar progress-bar-light-blue" role="progressbar" data-transitiongoal="04"></div>
    </div>
    Conteudo
    <div class="progress">
        <div class="progress-bar  progress-bar-yellow" role="progressbar" data-transitiongoal="01"></div>
    </div>
    Painel do cliente
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
