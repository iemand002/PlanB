<script>
    $('#del-milestone-modal').on('show.bs.modal', function (event) {
                {{--Button that triggered the modal--}}
        var button = $(event.relatedTarget);
                {{--Extract info from data-* attributes--}}
        var naam = button.data('milestonenaam');
        var idslug = button.data('milestoneslug');
                {{-- Update the modal's content. --}}
        var modal = $(this);
        modal.find('#naam').text(naam);
        var url = '{{route('admin.milestone.destroy',':var')}}'.replace(':var', idslug);
        modal.find('#delete-form').attr('action', url);
    });
    jQuery('#del-milestone-modal #really-delete').click(function () {
        jQuery('#del-milestone-modal form').submit();
    });
</script>