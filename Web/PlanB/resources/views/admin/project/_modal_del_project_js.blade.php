<script>
    $('#del-project-modal').on('show.bs.modal', function (event) {
                {{--Button that triggered the modal--}}
        var button = $(event.relatedTarget);
                {{--Extract info from data-* attributes--}}
        var naam = button.data('projectnaam');
        var idslug = button.data('projectslug');
                {{-- Update the modal's content. --}}
        var modal = $(this);
        modal.find('#naam').text(naam)
        var url = '{{route('admin.project.destroy',':var')}}'.replace(':var', idslug);
        modal.find('#delete-form').attr('action', url);
    });
    jQuery('#del-project-modal #really-delete').click(function () {
        jQuery('#del-project-modal form').submit();
    });
</script>