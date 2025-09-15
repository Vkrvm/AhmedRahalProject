@extends('layouts.public')

@section('content')
    <section class="page page-design-process">
        <h1>Design Process</h1>
        <p>Design Process page content.</p>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 comparison-row">
                    <div class="comparison-container">
                        <div class="comparison-wrapper">
                            <img src="{{ asset('images/11.jpg') }}" alt="After" class="comparison-image" id="afterImage">
                            <img src="{{ asset('images/12.jpg') }}" alt="Before" class="comparison-image"
                                id="beforeImage">
                        </div>
                        <div class="button-group">
                            <button class="toggle-btn active" id="beforeBtn">Before</button>
                            <button class="toggle-btn" id="afterBtn">After</button>
                        </div>
                    </div>
                </div>
            </div>
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

        // Setup comparisons (second set only binds if elements exist)
        setupComparison('beforeBtn', 'afterBtn', 'beforeImage', 'afterImage');
        setupComparison('beforeBtn2', 'afterBtn2', 'beforeImage2', 'afterImage2');
    });
</script>
