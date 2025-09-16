@extends('layouts.public')

@section('title', 'Before & After Transformations | Rahal Designs')
@section('description', 'See the amazing before and after transformations of our interior design projects. Discover how we transform spaces into beautiful, functional environments.')

@section('content')
    <section class="page page-design-process">
        <h1>Before & After Transformation</h1>
        <div class="container">
            <div class="row">
                @forelse($comparisons as $comparison)
                    <div class="col-12 col-md-6 col-lg-4 comparison-row mb-4">
                        <div class="comparison-container">
                            <div class="comparison-wrapper">
                                <img src="{{ Storage::url($comparison->after_path) }}" alt="After" class="comparison-image" id="afterImage-{{ $comparison->id }}">
                                <img src="{{ Storage::url($comparison->before_path) }}" alt="Before" class="comparison-image" id="beforeImage-{{ $comparison->id }}">
                            </div>
                            <div class="button-group">
                                <button class="toggle-btn active" id="beforeBtn-{{ $comparison->id }}">Before</button>
                                <button class="toggle-btn" id="afterBtn-{{ $comparison->id }}">After</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No comparisons available.</p>
                    </div>
                @endforelse
            </div>

            @if($comparisons->hasPages())
                <div class="mt-4">
                    @include('custom-pagination', ['paginator' => $comparisons])
                </div>
            @endif
        </div>
    </section>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        function setupComparison(beforeBtnId, afterBtnId, beforeImgId, afterImgId) {
            const beforeBtn = document.getElementById(beforeBtnId);
            const afterBtn = document.getElementById(afterBtnId);
            const beforeImg = document.getElementById(beforeImgId);
            const afterImg = document.getElementById(afterImgId);

            if (!beforeBtn || !afterBtn || !beforeImg || !afterImg) {
                return; // Skip if any element is missing
            }

            function showBefore() {
                beforeBtn.classList.add('active');
                afterBtn.classList.remove('active');
                beforeImg.style.clipPath = 'inset(0 0 0 0)';
                afterImg.style.clipPath = 'inset(0 100% 0 0)';
            }

            function showAfter() {
                afterBtn.classList.add('active');
                beforeBtn.classList.remove('active');
                beforeImg.style.clipPath = 'inset(0 0 0 100%)';
                afterImg.style.clipPath = 'inset(0 0 0 0)';
            }

            beforeBtn.addEventListener('click', showBefore);
            afterBtn.addEventListener('click', showAfter);

            // Initialize
            showBefore();
        }

        // Setup comparisons for all items on the page
        const items = document.querySelectorAll('.comparison-row');
        items.forEach((el) => {
            const idSuffix = el.querySelector('.comparison-wrapper img').id.split('-')[1];
            setupComparison(`beforeBtn-${idSuffix}`, `afterBtn-${idSuffix}`, `beforeImage-${idSuffix}`, `afterImage-${idSuffix}`);
        });
    });
</script>
