@include('sections.head')

<body>
@include('sections.header')
<main class="main">
@include('sections.main-slider')
@include('sections.about')
    <section class="main-content">
        @include('sections.pinza')
        @include('sections.salads')
        @include('sections.soups')
        @include('sections.desserts')
    </section>
    @include('sections.contacts')
</main>

@include('sections.footer')

@include('sections.foot')
