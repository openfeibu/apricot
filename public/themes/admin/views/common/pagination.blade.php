@if ($paginator->hasPages())
    <div class="page">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="page-item layui-inline"><a href="javascript:;">第一页</a></div>
        @else
            <div class="page-prev layui-inline"><a href="{{ $paginator->previousPageUrl() }}">上一页</a></div>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="page-item layui-inline active"><a href="javascript:;">{{ $element }}</a></div>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="page-item layui-inline active"><a href="javascript:;">{{ $page }}</a></div>
                    @else
                        <div class="page-item layui-inline "><a href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="page-next  layui-inline"><a href="{{ $paginator->nextPageUrl() }}">下一页</a></div>
        @else
            <div class="page-item  layui-inline"><a href="javascript:;">最后一页</a></div>
        @endif
    </div>
@endif

<!--
<div class="page">
    <div class="page-prev layui-inline"><a href="">上一页</a></div>
    <div class="page-item layui-inline active"><a href="">1</a></div>
    <div class="page-item layui-inline"><a href="">2</a></div>
    <div class="page-item layui-inline"><a href="">3</a></div>
    <div class="page-item layui-inline">...</div>
    <div class="page-item layui-inline"><a href="">16</a></div>
    <div class="page-next layui-inline"><a href="">下一页</a></div>
</div>
-->
