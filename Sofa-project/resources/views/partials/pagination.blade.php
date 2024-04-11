@if($paginator->hasPages())
<div class="col-12 mb-5">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0)">
                        <span class="ion-android-arrow-dropleft"></span>
                    </a>
                </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{$paginator->previousPageUrl()}}">
                    <span class="ion-android-arrow-dropleft"></span>
                </a>
            </li>
            @endif

            @foreach ($elements as $element)
            @if (is_string($element))
            <li class="page-item"><a class="page-link" href="javascript:void(0)">{{$element}}</a></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page=>$url)
                    @if ($page==$paginator->currentPage())
                    <li class="page-item disabled"><a class="page-link" href="#">{{$page}}</a></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
                    @endif
                @endforeach
            @endif
            @endforeach

            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{$paginator->nextPageUrl()}}">
                    <span class="ion-android-arrow-dropright"></span>
                </a>
            </li>
            @else
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)">
                    <span class="ion-android-arrow-dropright"></span>
                </a>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endif