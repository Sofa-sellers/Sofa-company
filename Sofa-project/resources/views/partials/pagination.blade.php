<div class="paginatoin-area">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <ul class="pagination-box">
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="active"><a href="{{$paginator->url($i)}}">{{$i}}</a></li>
                @endfor
                <li>
                    <a class="Next" href="{{$paginator->url($i)}}">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>