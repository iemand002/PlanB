<div class="modal fade" tabindex="-1" role="dialog" id="del-project-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ben je zeker?</h4>
            </div>
            <div class="modal-body">
                <p>Ben je zeker dat je project "<span id="naam"></span>" wilt verwijderen?</p>
                <p>Hiermee worden ook alle bijhorende milestones en vragen verwijderd</p>
                <p>Deze actie is onomkeerbaar!</p>
                {!! Form::open(['route'=>['admin.project.destroy',0],'method'=>'delete','id'=>'delete-form']) !!}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Annuleer</button>
                <button type="button" class="btn btn-danger" id="really-delete">Verwijder</button>
            </div>
        </div>
    </div>
</div>