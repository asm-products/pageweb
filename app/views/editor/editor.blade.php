@extends('layouts.editor')

@section ('head:end')
<script type="text/javascript">
    PageWeb.editor = {
        'id': '{{ $site->getId() }}',
        'is_preview': <?php echo $site->inPreviewMode() ? 'true' : 'false'; ?>,
        'site': <?php echo json_encode(array_merge($site->site->toArray(), [
                    'domain' => $site->site->getCustomDomain()
                ])) ?>
    };
</script>
@stop

@section ('content')
<section class="editor-horizontal-box editor-stretch">
    @include ('editor/partials/sidebar')
    @include ('editor/partials/content')
</section>
@overwrite