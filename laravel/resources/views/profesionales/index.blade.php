@extends('theme.app')
@section('titulo')
    PROFESIONALES
@endsection
@section('estilos')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endsection
@section('content')

<livewire:profesionales.profesionales />

@endsection




