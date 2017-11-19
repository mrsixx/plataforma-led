<!--aqui vai o conteúdo da sidebar que abre e fecha-->            
<div class="list-group">
    <span href="#" class="list-group-item active">
        <span class="pull-right" id="slide-submenu">
            <i  class="glyphicon glyphicon-remove-circle"></i>
        </span>
        <?php 
        $CI =& get_instance();
        if(!empty($CI->uri->segment(2))): ?>
        <a class="list-group-item pull-left" href="/chat">
        <?php else: ?>
            <a class="list-group-item pull-left" href="/panel">
            <?php endif; ?>
            <i class="glyphicon glyphicon-chevron-left"></i> Página anterior
        </a><br/><br/>

        <hr/>
    </span>
    <ul class="media-list list-group-item">
        <li class="media list-group-item">
            <a>
                <a class="btn btn-warning btn-xs" href="#" data-toggle="collapse" data-target="#criaEvento"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Criar novo evento</a>
            </a>
        </li>
        <li class="media list-group-item">
            <a>
                <div class="media-left">
                    <div class="panel panel-calendario text-center date">
                        <div class="panel-heading month">
                            <span class="panel-title strong">
                                Mar
                            </span>
                        </div>
                        <div class="panel-body day text-calendario">
                            23
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <table>
                        <tr>
                            <td>
                                <h4 class="media-heading">
                                    Semana de Avaliação
                                </h4>
                                <p>
                                    Português | matemática
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span></a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>

                            </td>
                        </tr>
                    </table>
                </div>
            </a>
        </li>
    </ul>
    <div class="list-group-item active">
        <a href="#" class="btn btn-success btn-block" >Ver mais »</a>
    </div>
</div>
