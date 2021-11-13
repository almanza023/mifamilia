
<div>



    @if (session()->has('message'))
        <script>
            mensaje("{{ session('message') }}")
        </script>
    @endif
    @include('livewire.profesionales.tabla')

    @include('livewire.profesionales.create')
    @include('livewire.profesionales.bloquear')
</div>
