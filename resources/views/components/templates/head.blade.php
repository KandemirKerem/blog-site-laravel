<!DOCTYPE html>
<html lang="tr">
<head>

  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NovaBlog | {{ $title }} </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('site.webmanifest') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <meta name="description" content="{{$desc ?? 'NovaBlog ile Modern Blog Deneyimi.'}}">
    @stack('meta')
    @livewireStyles
    @vite('resources/css/app.css')


</head>
<body class="bg-white text-base font-sans">
