<section class="container text-secton">
    @section('scripts')
        @include ('layout.editable')
    @endsection

    @admin
        @isset($resource)
            <textblock-editor class="text-block" resource="{{ $resource }}" resource-id="{{ $resourceId }}">
                {!! $text !!}
            </textblock-editor>
        @else
            <div class="text-block fr-view">
                {!! $text !!}
            </div>
        @endisset
    @else
        <div class="text-block fr-view">
            {!! $text !!}
        </div>
    @endadmin
</section>
