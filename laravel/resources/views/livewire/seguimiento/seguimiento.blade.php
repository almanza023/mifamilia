<div>

    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}");
    </script>
    @endif

    @if (session()->has('error'))
    <script>
        error("{{ session('error') }}");
    </script>
    @endif

    @if (session()->has('advertencia'))
    <script>
        advertencia("{{ session('advertencia') }}")
    </script>
    @endif

    @include('livewire.seguimiento.actualizar')
    @include('livewire.seguimiento.tabla')
</div>
