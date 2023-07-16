<div class="page-navigation">
    <nav aria-label="Page navigation example">
        @if ($paginator->hasPages())
            <ul class="pagination mt40 justify-content-center">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1"><i
                                class="fa fa-angle-left" aria-hidden="true"></i></a> </li>
                @else
                    <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i
                                class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                @endif


                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item pagin-active">{{ $element }}</li>
                    @endif



                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item pagin-active disabled"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach


                {{-- <li class="page-item pagin-active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item"> <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i
                                class="fa fa-angle-right" aria-hidden="true"></i></a> </li>
                @else
                    <li class="page-item disabled"> <a class="page-link" href="#"><i class="fa fa-angle-right"
                                aria-hidden="true"></i></a> </li>
                @endif
            </ul>
        @endif
    </nav>
</div>
