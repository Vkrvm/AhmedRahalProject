@if ($paginator->hasPages())
    <nav class="pagination-nav" role="navigation" aria-label="Pagination Navigation">
        <div class="pagination-container">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="pagination-btn pagination-btn-disabled">
                    <span class="pagination-arrow">‹</span>
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn pagination-btn-prev">
                    <span class="pagination-arrow">‹</span>
                    Previous
                </a>
            @endif

            {{-- Pagination Numbers --}}
            <div class="pagination-numbers">
                @php
                    $current = $paginator->currentPage();
                    $last = $paginator->lastPage();
                    $start = max(1, $current - 2);
                    $end = min($last, $current + 2);
                @endphp

                @if($start > 1)
                    <a href="{{ $paginator->url(1) }}" class="pagination-number">1</a>
                    @if($start > 2)
                        <span class="pagination-dots">...</span>
                    @endif
                @endif

                @for($i = $start; $i <= $end; $i++)
                    @if ($i == $current)
                        <span class="pagination-number pagination-number-active">{{ $i }}</span>
                    @else
                        <a href="{{ $paginator->url($i) }}" class="pagination-number">{{ $i }}</a>
                    @endif
                @endfor

                @if($end < $last)
                    @if($end < $last - 1)
                        <span class="pagination-dots">...</span>
                    @endif
                    <a href="{{ $paginator->url($last) }}" class="pagination-number">{{ $last }}</a>
                @endif
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn pagination-btn-next">
                    Next
                    <span class="pagination-arrow">›</span>
                </a>
            @else
                <span class="pagination-btn pagination-btn-disabled">
                    Next
                    <span class="pagination-arrow">›</span>
                </span>
            @endif
        </div>
        
        <div class="pagination-info">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
        </div>
    </nav>

    <style>
        .pagination-nav {
            margin: 2rem 0;
            text-align: center;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .pagination-btn {
            display: inline-flex;
            align-items: baseline;
            gap: 0.5rem;
            padding: 0px 15px;
            background: #1a1a1a;
            color: #ccc;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid #333;
        }

        .pagination-btn:hover {
            background: #c9a65a;
            color: #111;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(201, 166, 90, 0.35);
        }

        .pagination-btn-disabled {
            background: #333;
            color: #666;
            cursor: not-allowed;
            border-color: #444;
        }

        .pagination-btn-disabled:hover {
            background: #333;
            color: #666;
            transform: none;
            box-shadow: none;
        }

        .pagination-numbers {
            display: flex;
            gap: 0.25rem;
        }

        .pagination-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            background: #1a1a1a;
            color: #ccc;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid #333;
        }

        .pagination-number:hover {
            background: #c9a65a;
            color: #111;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(201, 166, 90, 0.35);
        }

        .pagination-number-active {
            background: #c9a65a;
            color: #111;
            border-color: #c9a65a;
            box-shadow: 0 6px 20px rgba(201, 166, 90, 0.35);
        }

        .pagination-dots {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            color: #666;
            font-weight: 500;
        }

        .pagination-arrow {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .pagination-info {
            color: #ccc;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        @media (max-width: 640px) {
            .pagination-container {
                flex-wrap: wrap;
                gap: 0.25rem;
            }
            
            .pagination-btn {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
            }
            
            .pagination-number {
                width: 2rem;
                height: 2rem;
                font-size: 0.875rem;
            }
        }
    </style>
@endif
